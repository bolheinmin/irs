<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\UniversitySupervisor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class UniversitySupervisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:university-supervisor-list|university-supervisor-create|university-supervisor-show|university-supervisor-edit|university-supervisor-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:university-supervisor-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:university-supervisor-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:university-supervisor-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()) {
            $universitySupervisors = UniversitySupervisor::query();
            return DataTables::of($universitySupervisors)->addIndexColumn()
                ->editColumn('university', function ($data) {
                    return $data->university ? $data->university->name : '-';
                })
                ->addColumn('action', 'backend.university-supervisors.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.university-supervisors.index');
    }

    public function create()
    {
        $universities = University::all();
        return view('backend.university-supervisors.create', compact('universities'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
            'phone' => ['required'],
            'position' => ['required'],
            'university_id' => ['required'],
            'address' => ['nullable']
        ],
            [
                'university_id.required' => 'The university field is required.'
            ]);

        DB::beginTransaction();

        try {
            // Hash the password before creating the user
            $hashedPassword = Hash::make($data['password']);
            $data['password'] = $hashedPassword;
            $universitySupervisor = UniversitySupervisor::create($data);

            // Create the user
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $hashedPassword,
                'university_supervisor_id' => $universitySupervisor->id
            ]);

            // Assign the 'university-supervisor' role to the user
            $role = Role::where('name', 'university-supervisor')->first();
            if ($role) {
                $user->assignRole($role);
            }

            // Commit the transaction
            DB::commit();

            return redirect()->route('university-supervisors.index')->with('success', 'Successfully Created!');
        } catch (\Exception $e) {
            // Rollback the transaction if anything fails
            DB::rollBack();
            Log::error('Failed to create university supervisor: ' . $e->getMessage());

            return redirect()->route('university-supervisors.index')->with('error', 'Failed to create university supervisor. Please try again.');
        }
    }

    public function show($id)
    {
        $universitySupervisor = UniversitySupervisor::find($id);

        return view('backend.university-supervisors.show', compact('universitySupervisor'));
    }

    public function edit($id)
    {
        $universitySupervisor = UniversitySupervisor::findOrFail($id);
        $universities = University::all();

        return view('backend.university-supervisors.edit', compact('universitySupervisor', 'universities'));
    }

    public function update(Request $request, $id)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Find the UniversitySupervisor by ID
            $universitySupervisor = UniversitySupervisor::findOrFail($id);

            // Find the associated User record
            $user = User::where('university_supervisor_id', $universitySupervisor->id)->firstOrFail();

            $data = $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email', 'unique:users,email,' . $user->id],
                'password' => ['nullable'],
                'phone' => ['required'],
                'position' => ['required'],
                'university_id' => ['required'],
                'address' => ['nullable']
            ],
                [
                    'university_id.required' => 'The university field is required.'
                ]);
            // Hash the password only if it's present in the request
            $data['password'] = $request->filled('password') ? Hash::make($request->password) : $universitySupervisor->password;

            // Update the UniversitySupervisor record
            $universitySupervisor->update($data);

            // Update the User record
            $userData = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'university_supervisor_id' => $universitySupervisor->id
            ];

            $user->update($userData);

            // Commit the transaction
            DB::commit();

            return redirect()->route('university-supervisors.index')->with('success', 'Successfully Updated!');
        } catch (\Exception $e) {
            // Rollback the transaction if anything fails
            Log::error('Failed to update university supervisor: ' . $e->getMessage());
            DB::rollBack();
            return redirect()->route('university-supervisors.index')->with('error', 'Failed to update university supervisor. Please try again.');
        }
    }

    public function destroy(Request $request)
    {
        $universitySupervisor = UniversitySupervisor::findOrFail($request->id);

        // Find the associated User record by university_supervisor_id and delete it
        $user = User::where('university_supervisor_id', $universitySupervisor->id)->first();
        if ($user) {
            $user->delete();
        }

        // Delete the UniversitySupervisor
        $universitySupervisor->delete();

        return response()->json($universitySupervisor);
    }
}

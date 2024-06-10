<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class InternController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:intern-list|intern-create|intern-show|intern-edit|intern-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:intern-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:intern-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:intern-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()) {
            $interns = Intern::query();
            return DataTables::of($interns)->addIndexColumn()
                ->editColumn('university', function ($data) {
                    return $data->university ? $data->university->name : '-';
                })
                ->addColumn('action', 'backend.interns.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.interns.index');
    }

    public function create()
    {
        $universities = University::all();
        return view('backend.interns.create', compact('universities'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
            'roll_no' => ['required'],
            'phone' => ['required'],
            'university_id' => ['required'],
            'date_of_birth' => ['required'],
            'gender' => ['required'],
            'nrc_no' => ['required'],
            'education' => ['required'],
            'specialization' => ['required'],
            'class_project' => ['required'],
            'activity' => ['required'],
            'skill' => ['required'],
            'qualification' => ['required'],
            'address' => ['nullable'],
            'profile' => ['nullable'],
        ],
        [
            'university_id.required' => 'The university field is required.'
        ]);

        DB::beginTransaction();

        try {
            if ($request->hasFile('profile')) {
                $profile = $request->file('profile');
                $profileName = 'intern-profile-'.uniqid().'.'.$profile->getClientOriginalName();
                Storage::disk('public')->put('interns/'.$profileName, file_get_contents($profile->getRealPath()));
                $data['profile'] = $profileName;
            }
            // Hash the password before creating the user
            $hashedPassword = Hash::make($data['password']);
            $data['password'] = $hashedPassword;
            $intern = Intern::create($data);

            // Create the user
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $hashedPassword,
                'intern_id' => $intern->id
            ]);

            // Assign the 'intern' role to the user
            $role = Role::where('name', 'intern')->first();
            if ($role) {
                $user->assignRole($role);
            }

            // Commit the transaction
            DB::commit();

            return redirect()->route('interns.index')->with('success', 'Successfully Created!');
        } catch (\Exception $e) {
            // Rollback the transaction if anything fails
            DB::rollBack();
            Log::error('Failed to create intern: ' . $e->getMessage());

            return redirect()->route('interns.index')->with('error', 'Failed to create intern. Please try again.');
        }
    }

    public function show($id)
    {
        $intern = Intern::find($id);

        return view('backend.interns.show', compact('intern'));
    }

    public function edit($id)
    {
        $intern = Intern::findOrFail($id);
        $universities = University::all();

        return view('backend.interns.edit', compact('intern', 'universities'));
    }

    public function update(Request $request, $id)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Find the Intern by ID
            $intern = Intern::findOrFail($id);

            // Find the associated User record
            $user = User::where('intern_id', $intern->id)->firstOrFail();

            $data = $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email', 'unique:users,email,' . $user->id],
                'password' => ['nullable'],
                'roll_no' => ['required'],
                'phone' => ['required'],
                'university_id' => ['required'],
                'date_of_birth' => ['required'],
                'gender' => ['required'],
                'nrc_no' => ['required'],
                'education' => ['required'],
                'specialization' => ['required'],
                'class_project' => ['required'],
                'activity' => ['required'],
                'skill' => ['required'],
                'qualification' => ['required'],
                'address' => ['nullable'],
                'profile' => ['nullable'],
            ],
            [
                'university_id.required' => 'The university field is required.'
            ]);

            if ($request->hasFile('profile')) {
                Storage::disk('public')->delete('employees/'.$intern->profile);
                $profile = $request->file('profile');
                $profileName = 'intern-profile-'.uniqid().'.'.$profile->getClientOriginalName();
                Storage::disk('public')->put('interns/'.$profileName, file_get_contents($profile->getRealPath()));
                $data['profile'] = $profileName;
            }
            // Hash the password only if it's present in the request
            $data['password'] = $request->filled('password') ? Hash::make($request->password) : $intern->password;

            // Update the Intern record
            $intern->update($data);

            // Update the User record
            $userData = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'intern_id' => $intern->id
            ];

            $user->update($userData);

            // Commit the transaction
            DB::commit();

            return redirect()->route('interns.index')->with('success', 'Successfully Updated!');
        } catch (\Exception $e) {
            // Rollback the transaction if anything fails
            Log::error('Failed to update intern: ' . $e->getMessage());
            DB::rollBack();
            return redirect()->route('interns.index')->with('error', 'Failed to update intern. Please try again.');
        }
    }

    public function destroy(Request $request)
    {
        $intern = Intern::findOrFail($request->id);

        // Find the associated User record by intern_id and delete it
        $user = User::where('intern_id', $intern->id)->first();
        if ($user) {
            $user->delete();
        }

        // Delete the Intern
        $intern->delete();

        return response()->json($intern);
    }
}

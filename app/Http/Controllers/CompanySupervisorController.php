<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanySupervisor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class CompanySupervisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:company-supervisor-list|company-supervisor-create|company-supervisor-show|company-supervisor-edit|company-supervisor-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:company-supervisor-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:company-supervisor-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:company-supervisor-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()) {
            $companySupervisors = CompanySupervisor::query();
            return DataTables::of($companySupervisors)->addIndexColumn()
                ->editColumn('company', function ($data) {
                    return $data->company ? $data->company->name : '-';
                })
                ->addColumn('action', 'backend.company-supervisors.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.company-supervisors.index');
    }

    public function create()
    {
        $companies = Company::all();
        return view('backend.company-supervisors.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
            'phone' => ['required'],
            'position' => ['required'],
            'company_id' => ['required'],
            'address' => ['nullable']
        ],
        [
            'company_id.required' => 'The company field is required.'
        ]);

        DB::beginTransaction();

        try {
            // Hash the password before creating the user
            $hashedPassword = Hash::make($data['password']);
            $data['password'] = $hashedPassword;
            $companySupervisor = CompanySupervisor::create($data);

            // Create the user
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $hashedPassword,
                'company_supervisor_id' => $companySupervisor->id
            ]);

            // Assign the 'company-supervisor' role to the user
            $role = Role::where('name', 'company-supervisor')->first();
            if ($role) {
                $user->assignRole($role);
            }

            // Commit the transaction
            DB::commit();

            return redirect()->route('company-supervisors.index')->with('success', 'Successfully Created!');
        } catch (\Exception $e) {
            // Rollback the transaction if anything fails
            DB::rollBack();
            Log::error('Failed to create company supervisor: ' . $e->getMessage());

            return redirect()->route('company-supervisors.index')->with('error', 'Failed to create company supervisor. Please try again.');
        }
    }

    public function show($id)
    {
        $companySupervisor = CompanySupervisor::find($id);

        return view('backend.company-supervisors.show', compact('companySupervisor'));
    }

    public function edit($id)
    {
        $companySupervisor = CompanySupervisor::findOrFail($id);
        $companies = Company::all();

        return view('backend.company-supervisors.edit', compact('companySupervisor', 'companies'));
    }

    public function update(Request $request, $id)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Find the CompanySupervisor by ID
            $companySupervisor = CompanySupervisor::findOrFail($id);

            // Find the associated User record
            $user = User::where('company_supervisor_id', $companySupervisor->id)->firstOrFail();

            $data = $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email', 'unique:users,email,' . $user->id],
                'password' => ['nullable'],
                'phone' => ['required'],
                'position' => ['required'],
                'company_id' => ['required'],
                'address' => ['nullable']
            ],
            [
                'company_id.required' => 'The company field is required.'
            ]);
            // Hash the password only if it's present in the request
            $data['password'] = $request->filled('password') ? Hash::make($request->password) : $companySupervisor->password;

            // Update the CompanySupervisor record
            $companySupervisor->update($data);

            // Update the User record
            $userData = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'company_supervisor_id' => $companySupervisor->id
            ];

            $user->update($userData);

            // Commit the transaction
            DB::commit();

            return redirect()->route('company-supervisors.index')->with('success', 'Successfully Updated!');
        } catch (\Exception $e) {
            // Rollback the transaction if anything fails
            Log::error('Failed to update company supervisor: ' . $e->getMessage());
            DB::rollBack();
            return redirect()->route('company-supervisors.index')->with('error', 'Failed to update company supervisor. Please try again.');
        }
    }

    public function destroy(Request $request)
    {
        $companySupervisor = CompanySupervisor::findOrFail($request->id);

        // Find the associated User record by company_supervisor_id and delete it
        $user = User::where('company_supervisor_id', $companySupervisor->id)->first();
        if ($user) {
            $user->delete();
        }

        // Delete the CompanySupervisor
        $companySupervisor->delete();

        return response()->json($companySupervisor);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:company-list|company-create|company-show|company-edit|company-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:company-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:company-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:company-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()) {
            $companies = Company::query();
            return DataTables::of($companies)->addIndexColumn()
                ->addColumn('action', 'backend.companies.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.companies.index');
    }

    public function create()
    {
        return view('backend.companies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'website' => ['nullable'],
            'address' => ['nullable']
        ]);
        Company::create($data);
        return redirect()->route('companies.index')->with('success', 'Successfully Created!');

    }

    public function show($id)
    {
        $company = Company::find($id);

        return view('backend.companies.show')->with('company', $company);
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('backend.companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {

        $company = Company::findOrFail($id);
        $data = $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'website' => ['nullable'],
            'address' => ['nullable']
        ]);

        $company->update($data);
        return redirect()->route('companies.index')->with('success', 'Successfully Updated!');
    }

    public function destroy(Request $request)
    {
        $company = Company::findOrFail($request->id)->delete();

        return response()->json($company);
    }
}

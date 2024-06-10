<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UniversityController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:university-list|university-create|university-show|university-edit|university-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:university-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:university-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:university-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()) {
            $universities = University::query();
            return DataTables::of($universities)->addIndexColumn()
                ->addColumn('action', 'backend.universities.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.universities.index');
    }

    public function create()
    {
        return view('backend.universities.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'website' => ['nullable'],
            'address' => ['nullable']
        ]);
        University::create($data);
        return redirect()->route('universities.index')->with('success', 'Successfully Created!');

    }

    public function show($id)
    {
        $university = University::find($id);

        return view('backend.universities.show')->with('university', $university);
    }

    public function edit($id)
    {
        $university = University::findOrFail($id);

        return view('backend.universities.edit', compact('university'));
    }

    public function update(Request $request, $id)
    {

        $university = University::findOrFail($id);
        $data = $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'website' => ['nullable'],
            'address' => ['nullable']
        ]);

        $university->update($data);
        return redirect()->route('universities.index')->with('success', 'Successfully Updated!');
    }

    public function destroy(Request $request)
    {
        $university = University::findOrFail($request->id)->delete();

        return response()->json($university);
    }
}

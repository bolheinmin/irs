<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\WeeklyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class WeeklyReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:weekly-report-list|weekly-report-create|weekly-report-show|weekly-report-edit|weekly-report-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:weekly-report-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:weekly-report-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:weekly-report-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        $intern = $user->intern;

        if($request->ajax()) {
            // Fetch all the weekly reports for only single intern
            $weeklyReports = WeeklyReport::with(['internship.intern'])
                ->whereHas('internship', function($query) use ($intern) {
                    $query->where('intern_id', $intern->id);
            });
            return DataTables::of($weeklyReports)->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return $data->internship->intern ? $data->internship->intern->name : '-';
                })
                ->addColumn('roll_no', function ($data) {
                    return $data->internship->intern ? $data->internship->intern->roll_no : '-';
                })
                ->editColumn('status', function ($data) {
                    if ($data->status == 'Pending') {
                        return '<span class="badge badge-warning">Pending</span>';
                    } else {
                        return '<span class="badge badge-success">Approved</span>';
                    }
                })
                ->addColumn('action', 'backend.weekly-reports.action')
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('backend.weekly-reports.index');
    }

    public function create()
    {
        return view('backend.weekly-reports.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'week_no' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['nullable'],
            'monday_report' => ['nullable'],
            'tuesday_report' => ['nullable'],
            'wednesday_report' => ['nullable'],
            'thursday_report' => ['nullable'],
            'friday_report' => ['nullable'],
            'reflection' => ['nullable'],
        ]);

        $user = Auth::user();
        $intern = $user->intern;

        $internship = Internship::with('intern')->where('intern_id', $intern->id)->first();
        if ($internship) {
            $data['internship_id'] = $internship->id;
        } else {
            return redirect()->route('weekly-reports.index')->with('error', 'Need to make internship first!');
        }

        $data['status'] = 'Pending';
        WeeklyReport::create($data);
        return redirect()->route('weekly-reports.index')->with('success', 'Successfully Created!');

    }

    public function show($id)
    {
        $weeklyReport = WeeklyReport::find($id);
        $user = Auth::user();
        $intern = $user->intern;
        $internship = Internship::with('intern')->where('intern_id', $intern->id)->first();
        if ($weeklyReport->internship_id != $internship->id) {
            abort(403);
        }

        return view('backend.weekly-reports.show')->with('weekly-report', $weeklyReport);
    }

    public function edit($id)
    {
        $weeklyReport = WeeklyReport::findOrFail($id);

        $user = Auth::user();
        $intern = $user->intern;
        $internship = Internship::with('intern')->where('intern_id', $intern->id)->first();
        if ($weeklyReport->internship_id != $internship->id) {
            abort(403);
        }

        return view('backend.weekly-reports.edit', compact('weeklyReport'));
    }

    public function update(Request $request, $id)
    {

        $weeklyReport = WeeklyReport::findOrFail($id);
        $data = $request->validate([
            'week_no' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['nullable'],
            'monday_report' => ['nullable'],
            'tuesday_report' => ['nullable'],
            'wednesday_report' => ['nullable'],
            'thursday_report' => ['nullable'],
            'friday_report' => ['nullable'],
            'reflection' => ['nullable'],
        ]);

        $weeklyReport->update($data);
        return redirect()->route('weekly-reports.index')->with('success', 'Successfully Updated!');
    }

    public function destroy(Request $request)
    {
        $weeklyReport = WeeklyReport::findOrFail($request->id)->delete();

        return response()->json($weeklyReport);
    }
}

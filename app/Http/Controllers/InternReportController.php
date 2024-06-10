<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use App\Models\Internship;
use App\Models\WeeklyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;

class InternReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:intern-report-list|intern-report-create|intern-report-show|intern-report-edit|intern-report-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:intern-report-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:intern-report-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:intern-report-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        $admin = $user->hasRole('admin');
        $companySupervisor = $user->companySupervisor;
        $universitySupervisor = $user->universitySupervisor;

        if($request->ajax()) {
            $internReports = WeeklyReport::with(['internship.intern']);

            if ($admin) {
                // Fetch all intern reports for admin
                // No additional filtering needed for admin
            } elseif ($companySupervisor) {
                // Fetch only the intern reports for the company supervisor's associated company
                $internReports->whereHas('internship', function($query) use ($companySupervisor) {
                    $query->where('company_id', $companySupervisor->company_id);
                });
            } elseif ($universitySupervisor) {
                // Fetch only the intern reports for the university supervisor's associated university
                $internReports->whereHas('internship.intern', function ($query) use ($universitySupervisor) {
                    $query->where('university_id', $universitySupervisor->university_id);
                })->where('status', 'Approved');
            }

            // Retrieve the intern reports
            $internReports = $internReports->get();

            return DataTables::of($internReports)->addIndexColumn()
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
                ->addColumn('action', 'backend.intern-reports.action')
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('backend.intern-reports.index');
    }

    public function show($id)
    {
        $internReport = WeeklyReport::findOrFail($id);
        $user = Auth::user();
        $companySupervisor = $user->companySupervisor;
        $internship = Internship::with('company')->where('company_id', $companySupervisor->company_id)->first();
        if ($internReport->internship_id != $internship->id) {
            abort(403);
        }

        return 'hello' . $id;
    }
    public function edit($id)
    {
        $internReport = WeeklyReport::findOrFail($id);
        $user = Auth::user();
        $companySupervisor = $user->companySupervisor;
        $internship = Internship::with('company')->where('company_id', $companySupervisor->company_id)->first();
        if ($internReport->internship_id != $internship->id) {
            abort(403);
        }

        return view('backend.intern-reports.edit', compact('internReport'));
    }

    public function update(Request $request, $id)
    {
        $internReport = WeeklyReport::findOrFail($id);
        $data = $request->validate([
            'supervisor_comment' => ['nullable'],
            'signature' => ['nullable'],
            'status' => ['required'],
            'approved_date' => ['required']
        ]);

        if ($request->hasFile('signature')) {
            $signature = $request->file('signature');
            $signatureName = 'supervisor-signature-'.uniqid().'.'.$signature->getClientOriginalName();
            Storage::disk('public')->put('supervisors/'.$signatureName, file_get_contents($signature->getRealPath()));
            $data['signature'] = $signatureName;
        }

        $user = Auth::user();
        $companySupervisor = $user->companySupervisor;

        $data['approved_by_company_supervisor'] = $companySupervisor->id;

        $internReport->update($data);
        return redirect()->route('intern-reports.index')->with('success', 'Successfully Updated!');
    }

    public function destroy(Request $request)
    {
        $internReport = WeeklyReport::findOrFail($request->id)->delete();

        return response()->json($internReport);
    }

    public function exportPdf($id)
    {
        $internReport = WeeklyReport::with([
            'internship.intern.university',
            'approvedByCompanySupervisor'
        ])->findOrFail($id);
        $universityName = optional($internReport->internship->intern->university)->name;
        $internName = optional($internReport->internship->intern)->name;
        $supervisor = $internReport->approvedByCompanySupervisor ? $internReport->approvedByCompanySupervisor->name : '--';

        // Load the view and pass the data
        $pdf = new Mpdf();
        $html = View::make('backend.exports.intern_report', compact('internReport', 'universityName', 'internName', 'supervisor'))->render();
        $pdf->WriteHTML($html);

        // Output the PDF as a download
        return $pdf->Output("Intern_Reports_{$internName}.pdf", 'D');
    }
}

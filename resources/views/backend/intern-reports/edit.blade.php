@extends('backend.layouts.app')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Report</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('intern-reports.update', $internReport->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label" for="week_no">Week No <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('week_no') is-invalid @enderror" id="week_no" value="{{ old('week_no', $internReport->week_no) }}" readonly>
                                        @error('week_no')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="startDate">Start Date <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('start_date') is-invalid @enderror" id="startDate" value="{{ old('start_date', $internReport->start_date) }}" readonly>
                                        @error('start_date')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="endDate">End Date <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('end_date') is-invalid @enderror" id="endDate" value="{{ old('end_date', $internReport->end_date) }}" readonly>
                                        @error('end_date')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1" class="table table-bordered table-striped" aria-describedby="example1_info">
                                                <thead>
                                                <tr>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Date</th>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">Description</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <tr class="odd">
                                                    <td><label for="monday_report">Monday</label></td>
                                                    <td class="col-sm-10 "><textarea class="form-control" id="monday_report" rows="3" readonly>{{ old('monday_report', $internReport->monday_report) }}</textarea></td>
                                                </tr>
                                                <tr class="odd">
                                                    <td ><label for="tuesday_report">Tuesday</label></td>
                                                    <td class="col-sm-10 "><textarea class="form-control" id="tuesday_report" rows="3" readonly>{{ old('tuesday_report', $internReport->tuesday_report) }}</textarea></td>
                                                </tr>
                                                <tr class="odd">
                                                    <td ><label for="wednesday_report">Wednesday</label></td>
                                                    <td class="col-sm-10 "><textarea class="form-control" id="wednesday_report" rows="3" readonly>{{ old('wednesday_report', $internReport->wednesday_report) }}</textarea></td>
                                                </tr>
                                                <tr class="odd">
                                                    <td ><label for="thursday_report">Thursday</label></td>
                                                    <td class="col-sm-10 "><textarea class="form-control" id="thursday_report" rows="3" readonly>{{ old('thursday_report', $internReport->thursday_report) }}</textarea></td>
                                                </tr>
                                                <tr class="odd">
                                                    <td ><label for="friday_report">Friday</label></td>
                                                    <td class="col-sm-10 "><textarea class="form-control" id="friday_report" rows="3" readonly>{{ old('friday_report', $internReport->friday_report) }}</textarea></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="reflection">Reflection</label>
                                        <textarea class="form-control" id="reflection" rows="3" readonly>{{ old('reflection', $internReport->reflection) }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="supervisor_comment">Supervisor Comment</label>
                                        <textarea class="form-control" name="supervisor_comment" id="supervisor_comment" rows="3">{{ old('supervisor_comment', $internReport->supervisor_comment) }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="Pending" {{ $internReport->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="Approved" {{ $internReport->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="approvedDate">Approved Date <span class="text-danger">*</span></label>
                                        <input type="text" name="approved_date" class="form-control @error('approved_date') is-invalid @enderror" id="approvedDate" value="{{ old('approved_date', $internReport->approved_date) }}">
                                        @error('approved_date')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="signature">Signature</label>
                                        <input type="file" name="signature" class="form-control @error('signature') is-invalid @enderror" id="signature">
                                        @error('signature')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function (){
            //  daterange picker
            $('#approvedDate').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "autoApply": true,
                "locale": {
                    "format": "YYYY-MM-DD",
                }
            });
        });
    </script>
@endsection


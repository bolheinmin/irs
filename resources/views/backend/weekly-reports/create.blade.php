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
                                    <h3 class="card-title">Create New Report</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('weekly-reports.store') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label" for="week_no">Week No <span class="text-danger">*</span></label>
                                            <input type="number" name="week_no" class="form-control @error('week_no') is-invalid @enderror" id="week_no" placeholder="Enter Name" value="{{ old('week_no') }}">
                                            @error('week_no')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="startDate">Start Date <span class="text-danger">*</span></label>
                                            <input type="text" name="start_date" class="form-control @error('start_date') is-invalid @enderror" id="startDate" value="{{ old('start_date') }}">
                                            @error('start_date')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="endDate">End Date <span class="text-danger">*</span></label>
                                            <input type="text" name="end_date" class="form-control @error('end_date') is-invalid @enderror" id="endDate" value="{{ old('end_date') }}">
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
                                                        <td class="col-sm-10 "><textarea class="form-control" name="monday_report" id="monday_report" rows="3">{{ old('monday_report') }}</textarea></td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td ><label for="tuesday_report">Tuesday</label></td>
                                                        <td class="col-sm-10 "><textarea class="form-control" name="tuesday_report" id="tuesday_report" rows="3">{{ old('tuesday_report') }}</textarea></td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td ><label for="wednesday_report">Wednesday</label></td>
                                                        <td class="col-sm-10 "><textarea class="form-control" name="wednesday_report" id="wednesday_report" rows="3">{{ old('wednesday_report') }}</textarea></td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td ><label for="thursday_report">Thursday</label></td>
                                                        <td class="col-sm-10 "><textarea class="form-control" name="thursday_report" id="thursday_report" rows="3">{{ old('thursday_report') }}</textarea></td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td ><label for="friday_report">Friday</label></td>
                                                        <td class="col-sm-10 "><textarea class="form-control" name="friday_report" id="friday_report" rows="3">{{ old('friday_report') }}</textarea></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="reflection">Reflection</label>
                                            <textarea class="form-control" name="reflection" id="reflection" rows="3">{{ old('reflection') }}</textarea>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>

            {{-- Form Start Here --}}
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function (){
            $('.select-two').select2({
                theme: 'bootstrap4'
            })

            //  daterange picker
            $('#startDate').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "autoApply": true,
                "locale": {
                    "format": "YYYY-MM-DD",
                }
            });

            $('#endDate').daterangepicker({
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


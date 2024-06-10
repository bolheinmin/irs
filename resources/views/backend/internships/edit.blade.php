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
                                <h3 class="card-title">Edit Internship</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('internships.update', $internship->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="intern_id">Intern <span class="text-danger">*</span></label>
                                        <select class="form-control select-two @error('intern_id') is-invalid @enderror" name="intern_id" id="intern_id">
                                            <option value="">---</option>
                                            @foreach($interns as $intern)
                                                <option value="{{ $intern->id }}" {{ $internship->intern_id == $intern->id ? 'selected' : '' }}>{{ $intern->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('intern_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="company_id">Company <span class="text-danger">*</span></label>
                                        <select class="form-control select-two @error('company_id') is-invalid @enderror" name="company_id" id="company_id">
                                            <option value="">---</option>
                                            @foreach($companies as $company)
                                                <option value="{{ $company->id }}" {{ $internship->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('company_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="startDate">Start Date <span class="text-danger">*</span></label>
                                        <input type="text" name="start_date" class="form-control @error('start_date') is-invalid @enderror" id="startDate" value="{{ old('start_date', $internship->start_date) }}">
                                        @error('start_date')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="endDate">End Date <span class="text-danger">*</span></label>
                                        <input type="text" name="end_date" class="form-control @error('end_date') is-invalid @enderror" id="endDate" value="{{ old('end_date', $internship->end_date) }}">
                                        @error('end_date')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $internship->description) }}</textarea>
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


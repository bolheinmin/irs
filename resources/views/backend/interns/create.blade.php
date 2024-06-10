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
                                <h3 class="card-title">Create New Intern</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('interns.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email" value="{{ old('email') }}">
                                            @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter Password">
                                            @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="roll_no">Roll No <span class="text-danger">*</span></label>
                                            <input type="text" name="roll_no" class="form-control @error('roll_no') is-invalid @enderror" id="roll_no" placeholder="Enter Roll No" value="{{ old('roll_no') }}">
                                            @error('roll_no')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="phone">Phone <span class="text-danger">*</span></label>
                                            <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter Phone" value="{{ old('phone') }}">
                                            @error('phone')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="university_id">University <span class="text-danger">*</span></label>
                                            <select class="form-control select-university @error('university_id') is-invalid @enderror" name="university_id" id="university_id">
                                                <option value="">---</option>
                                                @foreach($universities as $university)
                                                    <option value="{{ $university->id }}">{{ $university->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('university_id')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="profile">Profile</label>
                                            <input type="file" name="profile" class="form-control @error('profile') is-invalid @enderror" id="profile">
                                            @error('profile')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="dob">Date Of Birth <span class="text-danger">*</span></label>
                                            <input type="text" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" id="dob" value="{{ old('date_of_birth') }}">
                                            @error('date_of_birth')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Gender <span class="text-danger">*</span></label>
                                            <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender">
                                                <option value="">---</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            @error('gender')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="nrc_no">NRC No <span class="text-danger">*</span></label>
                                            <input type="text" name="nrc_no" class="form-control @error('nrc_no') is-invalid @enderror" id="nrc_no" placeholder="Enter NRC NO" value="{{ old('nrc_no') }}">
                                            @error('nrc_no')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="education">Education <span class="text-danger">*</span></label>
                                            <input type="text" name="education" class="form-control @error('education') is-invalid @enderror" id="education" placeholder="Enter Education" value="{{ old('education') }}">
                                            @error('education')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="specialization">Specialization <span class="text-danger">*</span></label>
                                            <select class="form-control @error('specialization') is-invalid @enderror" name="specialization" id="specialization">
                                                <option value="">---</option>
                                                <option value="ct">CT</option>
                                                <option value="cs">CS</option>
                                            </select>
                                            @error('specialization')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="class_project">Class Project</label>
                                            <textarea class="form-control" name="class_project" id="class_project" rows="3">{{ old('class_project') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="activity">Activity</label>
                                            <textarea class="form-control" name="activity" id="activity" rows="3">{{ old('activity') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="skill">Skill</label>
                                            <textarea class="form-control" name="skill" id="skill" rows="3">{{ old('skill') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="qualification">Qualification</label>
                                            <textarea class="form-control" name="qualification" id="qualification" rows="3">{{ old('qualification') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" name="address" id="address" rows="3">{{ old('address') }}</textarea>
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
            $('.select-university').select2({
                theme: 'bootstrap4'
            })

            //  daterange picker
            $('#dob').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "maxDate": moment(),
                "autoApply": true,
                "locale": {
                    "format": "YYYY-MM-DD",
                }
            });

        });
    </script>
@endsection


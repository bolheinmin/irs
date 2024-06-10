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
                                <h3 class="card-title">Create New Evaluation</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('evaluations.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label" for="intern_id">Intern Name</label>
                                        <select id="intern_id" name="intern_id" class="form-control">
                                            @foreach($interns as $intern)
                                                <option value="{{ $intern->id }}">{{ $intern->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="roll_no">Roll Number</label>
                                        <select name="roll_no" class="form-control" id="roll_no" placeholder="Enter Roll number" required>
                                            @foreach($interns as $intern)
                                                <option value="{{ $intern->roll_no }}"> {{ $intern->roll_no}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="company_id">Company Name</label>
                                        <select name="company_id" class="form-control" id="company_id" placeholder="Enter company name" required>
                                            @foreach($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="company_username">Username</label>
                                        <input type="text" name="company_username" class="form-control" id="company_username" placeholder="Enter username">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="period">Period</label>
                                        <input type="text" name="period" class="form-control" id="period" placeholder="Enter Period">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="leaves_day">Total leaves taken</label>
                                        <input type="text" name="leaves_day" class="form-control" id="leaves_day" placeholder="Enter leaves day">
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_supervisor">Maintained contact with supervisor</label>
                                        <select class="form_control" id="contact_supervisor" name="contact_supervisor">
                                            <option value="excellent">Excellent</option>
                                            <option value="aboveaverage">Above Average</option>
                                            <option value="average">Average</option>
                                            <option value="lessthanaverage">Less than average</option>
                                            <option value="poor">Poor</option>
                                            <option value="notobserved">Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="punctual">Punctual for works, appointments and attendance :</label>
                                        <select class="form_control" id="punctual" name="punctual">
                                            <option value="excellent">Excellent</option>
                                            <option value="aboveaverage">Above Average</option>
                                            <option value="average">Average</option>
                                            <option value="lessthanaverage">Less than average</option>
                                            <option value="poor">Poor</option>
                                            <option value="notobserved">Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="reliably_performed_assignments">Reliably performed all job assignments :</label>
                                        <select class="form_control" id="reliably_performed_assignments" name="reliably_performed_assignments">
                                            <option value="excellent">Excellent</option>
                                            <option value="aboveaverage">Above Average</option>
                                            <option value="average">Average</option>
                                            <option value="lessthanaverage">Less than average</option>
                                            <option value="poor">Poor</option>
                                            <option value="notobserved">Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ability_solve_problem">Ability to solve problem :</label>
                                        <select class="form_control" id="ability_solve_problem" name="ability_solve_problem">
                                            <option value="excellent">Excellent</option>
                                            <option value="aboveaverage">Above Average</option>
                                            <option value="average">Average</option>
                                            <option value="lessthanaverage">Less than average</option>
                                            <option value="poor">Poor</option>
                                            <option value="notobserved">Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="organization_skills">Organization skills :</label>
                                        <select class="form_control" id="organization_skills" name="organization_skills">
                                            <option value="excellent">Excellent</option>
                                            <option value="aboveaverage">Above Average</option>
                                            <option value="average">Average</option>
                                            <option value="lessthanaverage">Less than average</option>
                                            <option value="poor">Poor</option>
                                            <option value="notobserved">Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="communication_skills">Communication Skills :</label>
                                        <select class="form_control" id="communication_skills" name="communication_skills">
                                            <option value="excellent">Excellent</option>
                                            <option value="aboveaverage">Above Average</option>
                                            <option value="average">Average</option>
                                            <option value="lessthanaverage">Less than average</option>
                                            <option value="poor">Poor</option>
                                            <option value="notobserved">Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ability_work_independently">Ability to work independently :</label>
                                        <select class="form_control" id="ability_work_independently" name="ability_work_independently">
                                            <option value="excellent">Excellent</option>
                                            <option value="aboveaverage">Above Average</option>
                                            <option value="average">Average</option>
                                            <option value="lessthanaverage">Less than average</option>
                                            <option value="poor">Poor</option>
                                            <option value="notobserved">Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="willingness_learn_new_tasks">Willingness to learn new tasks :</label>
                                        <select class="form_control" id="willingness_learn_new_tasks" name="willingness_learn_new_tasks">
                                            <option value="excellent">Excellent</option>
                                            <option value="aboveaverage">Above Average</option>
                                            <option value="average">Average</option>
                                            <option value="lessthanaverage">Less than average</option>
                                            <option value="poor">Poor</option>
                                            <option value="notobserved">Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="eagerness_to_learn">Eagerness to learn :</label>
                                        <select class="form_control" id="eagerness_to_learn" name="eagerness_to_learn">
                                            <option value="excellent">Excellent</option>
                                            <option value="aboveaverage">Above Average</option>
                                            <option value="average">Average</option>
                                            <option value="lessthanaverage">Less than average</option>
                                            <option value="poor">Poor</option>
                                            <option value="notobserved">Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="basic_skill">Basic Skill :</label>
                                        <select class="form_control" id="basic_skill" name="basic_skill">
                                            <option value="excellent">Excellent</option>
                                            <option value="aboveaverage">Above Average</option>
                                            <option value="average">Average</option>
                                            <option value="lessthanaverage">Less than average</option>
                                            <option value="poor">Poor</option>
                                            <option value="notobserved">Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="professional_appearance">Professional appearance :</label>
                                        <select class="form_control" id="professional_appearance" name="professional_appearance">
                                            <option value="excellent">Excellent</option>
                                            <option value="aboveaverage">Above Average</option>
                                            <option value="average">Average</option>
                                            <option value="lessthanaverage">Less than average</option>
                                            <option value="poor">Poor</option>
                                            <option value="notobserved">Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="overall_assessment_work_quality">Overall assessment of work quality :</label>
                                        <select class="form_control" id="overall_assessment_work_quality" name="overall_assessment_work_quality">
                                            <option value="excellent">Excellent</option>
                                            <option value="aboveaverage">Above Average</option>
                                            <option value="average">Average</option>
                                            <option value="lessthanaverage">Less than average</option>
                                            <option value="poor">Poor</option>
                                            <option value="notobserved">Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="professional_viewpoint">Please describe the work / tasks that the student accomplished and how well did the student perform these tasks from a professional view point</label>
                                        <textarea class="form-control" name="professional_viewpoint" id="professional_viewpoint" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="comments_student">Any additional comments on the student eg. About the intern’s work characteristics, technical Knowledge and skills, ability to adapt to work environment / hardware / software etc.
                                        </label>
                                        <textarea class="form-control" name="comments_student" id="comments_student" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="comments_intership">Any Comments on the internship program. Eg. Technical   knowledge   and    skills, academic / curricular preparation, methodology, programming, networking etc., to include in our curriculum to best prepare  our students for the industry.
                                        </label>
                                        <textarea class="form-control" name="comments_intership" id="comments_intership" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="comments">Other Comments</label>
                                        <textarea class="form-control" name="comments" id="comments" rows="3"></textarea>
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
            $('.select-role').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
@endsection


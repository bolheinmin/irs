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
                                <h3 class="card-title">Edit Evaluation</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('evaluations.update', $evaluation->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label" for="intern_id">Intern Name</label>
                                        <select class="form-control" id="intern_id" name="intern_id">
                                            foreach($interns as $intern)
                                                <option value="{{ $intern->id}}" {{ $evaluation->intern_id == $intern_id ? 'selected' : '' }}> {{ $intern->id}} -{{ $intern->name }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="roll_no">Roll Number</label>
                                        <select class="form-control" id="roll_no" name="roll_no">
                                            foreach($interns as $intern)
                                                <option value="{{ $intern->roll_no}}" {{ $evaluation->roll_no == $intern->roll_no ? 'selected' : '' }}> {{ $intern->roll_no}} -{{ $intern->name }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="company_name">Company name</label>
                                        <select class="form-control" id="company_name" name="company_name">
                                            foreach($companies as $company)
                                                <option value="{{ $company->company_name}}" {{ $evaluation->company_name == $company_name ? 'selected' : '' }}> {{ $company->company_name}} -{{ $company->company_name }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="company_username">Username</label>
                                        <input type="text" name="company_username" class="form-control" id="company_username" placeholder="Enter username" value='{{ $evaluation->company_username }}'>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="period">Period</label>
                                        <input type="text" name="period" class="form-control" id="period" placeholder="Enter period" value='{{ $evaluation->period }}'>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="leaves_day">Total leaves taken</label>
                                        <input type="text" name="leaves_day" class="form-control" id="leaves_day" placeholder="Enter leaves day" value='{{ $evaluation->leaves_day }}'>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_supervisor">Maintained contact with supervisor :</label>
                                        <select class="form-control" id="contact_supervisor" name="contact_supervisor">
                                            <option value="excellent" {{ $evaluation->contact_supervisor == 'excellent' ? 'selected' : '' }}>Excellent</option>
                                            <option value="aboveaverage" {{ $evaluation->contact_supervisor == 'aboveaverage' ? 'selected' : '' }}>Above Average</option>
                                            <option value="average" {{ $evaluation->contact_supervisor == 'average' ? 'selected' : '' }}>Average</option>
                                            <option value="lessthanaverage" {{ $evaluation->contact_supervisor == 'lessthanaverage' ? 'selected' : '' }}>Less than average</option>
                                            <option value="poor" {{ $evaluation->contact_supervisor == 'poor' ? 'selected' : '' }}>Poor</option>
                                            <option value="notobserved" {{ $evaluation->contact_supervisor == 'notobserved' ? 'selected' : '' }}>Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="punctual">Punctual for works, appointments and attendance :</label>
                                            <select class="form-control" id="punctual" name="punctual">
                                                <option value="excellent" {{ $evaluation->punctual == 'excellent' ? 'selected' : '' }}>Excellent</option>
                                                <option value="aboveaverage" {{ $evaluation->punctual == 'aboveaverage' ? 'selected' : '' }}>Above Average</option>
                                                <option value="average" {{ $evaluation->punctual == 'average' ? 'selected' : '' }}>Average</option>
                                                <option value="lessthanaverage" {{ $evaluation->punctual == 'lessthanaverage' ? 'selected' : '' }}>Less than average</option>
                                                <option value="poor" {{ $evaluation->punctual == 'poor' ? 'selected' : '' }}>Poor</option>
                                                <option value="notobserved" {{ $evaluation->punctual == 'notobserved' ? 'selected' : '' }}>Not Observed</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="reliably_performed_assignments">Reliably performed all job assignments :</label>
                                            <select class="form-control" id="reliably_performed_assignments" name="reliably_performed_assignments">
                                                <option value="excellent" {{ $evaluation->reliably_performed_assignments == 'excellent' ? 'selected' : '' }}>Excellent</option>
                                                <option value="aboveaverage" {{ $evaluation->reliably_performed_assignments == 'aboveaverage' ? 'selected' : '' }}>Above Average</option>
                                                <option value="average" {{ $evaluation->reliably_performed_assignments == 'average' ? 'selected' : '' }}>Average</option>
                                                <option value="lessthanaverage" {{ $evaluation->reliably_performed_assignments == 'lessthanaverage' ? 'selected' : '' }}>Less than average</option>
                                                <option value="poor" {{ $evaluation->reliably_performed_assignments == 'poor' ? 'selected' : '' }}>Poor</option>
                                                <option value="notobserved" {{ $evaluation->reliably_performed_assignments == 'notobserved' ? 'selected' : '' }}>Not Observed</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ability_solve_problem">Ability to solve problem :</label>
                                        <select class="form-control" id="ability_solve_problem" name="ability_solve_problem">
                                            <option value="excellent" {{ $evaluation->ability_solve_problem == 'excellent' ? 'selected' : '' }}>Excellent</option>
                                            <option value="aboveaverage" {{ $evaluation->ability_solve_problem == 'aboveaverage' ? 'selected' : '' }}>Above Average</option>
                                            <option value="average" {{ $evaluation->ability_solve_problem == 'average' ? 'selected' : '' }}>Average</option>
                                            <option value="lessthanaverage" {{ $evaluation->ability_solve_problem == 'lessthanaverage' ? 'selected' : '' }}>Less than average</option>
                                            <option value="poor" {{ $evaluation->ability_solve_problem == 'poor' ? 'selected' : '' }}>Poor</option>
                                            <option value="notobserved" {{ $evaluation->ability_solve_problem == 'notobserved' ? 'selected' : '' }}>Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="organization_skills">Organization skills :</label>
                                        <select class="form-control" id="organization_skills" name="organization_skills">
                                            <option value="excellent" {{ $evaluation->organization_skills == 'excellent' ? 'selected' : '' }}>Excellent</option>
                                            <option value="aboveaverage" {{ $evaluation->organization_skills == 'aboveaverage' ? 'selected' : '' }}>Above Average</option>
                                            <option value="average" {{ $evaluation->organization_skills == 'average' ? 'selected' : '' }}>Average</option>
                                            <option value="lessthanaverage" {{ $evaluation->organization_skills == 'lessthanaverage' ? 'selected' : '' }}>Less than average</option>
                                            <option value="poor" {{ $evaluation->organization_skills == 'poor' ? 'selected' : '' }}>Poor</option>
                                            <option value="notobserved" {{ $evaluation->organization_skills == 'notobserved' ? 'selected' : '' }}>Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="communication_skills">Communication Skills :</label>
                                        <select class="form-control" id="communication_skills" name="communication_skills">
                                            <option value="excellent" {{ $evaluation->communication_skills == 'excellent' ? 'selected' : '' }}>Excellent</option>
                                            <option value="aboveaverage" {{ $evaluation->communication_skills == 'aboveaverage' ? 'selected' : '' }}>Above Average</option>
                                            <option value="average" {{ $evaluation->communication_skills == 'average' ? 'selected' : '' }}>Average</option>
                                            <option value="lessthanaverage" {{ $evaluation->communication_skills == 'lessthanaverage' ? 'selected' : '' }}>Less than average</option>
                                            <option value="poor" {{ $evaluation->communication_skills == 'poor' ? 'selected' : '' }}>Poor</option>
                                            <option value="notobserved" {{ $evaluation->communication_skills == 'notobserved' ? 'selected' : '' }}>Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ability_work_independently">Ability to work independently :</label>
                                        <select class="form-control" id="ability_work_independently" name="ability_work_independently">
                                            <option value="excellent" {{ $evaluation->ability_work_independently == 'excellent' ? 'selected' : '' }}>Excellent</option>
                                            <option value="aboveaverage" {{ $evaluation->ability_work_independently == 'aboveaverage' ? 'selected' : '' }}>Above Average</option>
                                            <option value="average" {{ $evaluation->ability_work_independently == 'average' ? 'selected' : '' }}>Average</option>
                                            <option value="lessthanaverage" {{ $evaluation->ability_work_independently == 'lessthanaverage' ? 'selected' : '' }}>Less than average</option>
                                            <option value="poor" {{ $evaluation->ability_work_independently == 'poor' ? 'selected' : '' }}>Poor</option>
                                            <option value="notobserved" {{ $evaluation->ability_work_independently == 'notobserved' ? 'selected' : '' }}>Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="willingness_learn_new_tasks">Willingness to learn new tasks :</label>
                                        <select class="form-control" id="willingness_learn_new_tasks" name="willingness_learn_new_tasks">
                                            <option value="excellent" {{ $evaluation->willingness_learn_new_tasks == 'excellent' ? 'selected' : '' }}>Excellent</option>
                                            <option value="aboveaverage" {{ $evaluation->willingness_learn_new_tasks == 'aboveaverage' ? 'selected' : '' }}>Above Average</option>
                                            <option value="average" {{ $evaluation->willingness_learn_new_tasks == 'average' ? 'selected' : '' }}>Average</option>
                                            <option value="lessthanaverage" {{ $evaluation->willingness_learn_new_tasks == 'lessthanaverage' ? 'selected' : '' }}>Less than average</option>
                                            <option value="poor" {{ $evaluation->willingness_learn_new_tasks == 'poor' ? 'selected' : '' }}>Poor</option>
                                            <option value="notobserved" {{ $evaluation->willingness_learn_new_tasks == 'notobserved' ? 'selected' : '' }}>Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="eagerness_to_learn">Eagerness to learn :</label>
                                        <select class="form-control" id="eagerness_to_learn" name="eagerness_to_learn">
                                            <option value="excellent" {{ $evaluation->eagerness_to_learn == 'excellent' ? 'selected' : '' }}>Excellent</option>
                                            <option value="aboveaverage" {{ $evaluation->eagerness_to_learn == 'aboveaverage' ? 'selected' : '' }}>Above Average</option>
                                            <option value="average" {{ $evaluation->eagerness_to_learn == 'average' ? 'selected' : '' }}>Average</option>
                                            <option value="lessthanaverage" {{ $evaluation->eagerness_to_learn == 'lessthanaverage' ? 'selected' : '' }}>Less than average</option>
                                            <option value="poor" {{ $evaluation->eagerness_to_learn == 'poor' ? 'selected' : '' }}>Poor</option>
                                            <option value="notobserved" {{ $evaluation->eagerness_to_learn == 'notobserved' ? 'selected' : '' }}>Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="basic_skill">Basic Skill :</label>
                                        <select class="form-control" id="basic_skill" name="basic_skill">
                                            <option value="excellent" {{ $evaluation->basic_skill == 'excellent' ? 'selected' : '' }}>Excellent</option>
                                            <option value="aboveaverage" {{ $evaluation->basic_skill == 'aboveaverage' ? 'selected' : '' }}>Above Average</option>
                                            <option value="average" {{ $evaluation->basic_skill == 'average' ? 'selected' : '' }}>Average</option>
                                            <option value="lessthanaverage" {{ $evaluation->basic_skill == 'lessthanaverage' ? 'selected' : '' }}>Less than average</option>
                                            <option value="poor" {{ $evaluation->basic_skill == 'poor' ? 'selected' : '' }}>Poor</option>
                                            <option value="notobserved" {{ $evaluation->basic_skill == 'notobserved' ? 'selected' : '' }}>Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="professional_appearance">Professional appearance :</label>
                                        <select class="form-control" id="professional_appearance" name="professional_appearance">
                                            <option value="excellent" {{ $evaluation->professional_appearance == 'excellent' ? 'selected' : '' }}>Excellent</option>
                                            <option value="aboveaverage" {{ $evaluation->professional_appearance == 'aboveaverage' ? 'selected' : '' }}>Above Average</option>
                                            <option value="average" {{ $evaluation->professional_appearance == 'average' ? 'selected' : '' }}>Average</option>
                                            <option value="lessthanaverage" {{ $evaluation->professional_appearance == 'lessthanaverage' ? 'selected' : '' }}>Less than average</option>
                                            <option value="poor" {{ $evaluation->professional_appearance == 'poor' ? 'selected' : '' }}>Poor</option>
                                            <option value="notobserved" {{ $evaluation->professional_appearance == 'notobserved' ? 'selected' : '' }}>Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="overall_assessment_work_quality">Overall assessment of work quality :</label>
                                        <select class="form-control" id="overall_assessment_work_quality" name="overall_assessment_work_quality">
                                            <option value="excellent" {{ $evaluation->overall_assessment_work_quality == 'excellent' ? 'selected' : '' }}>Excellent</option>
                                            <option value="aboveaverage" {{ $evaluation->overall_assessment_work_quality == 'aboveaverage' ? 'selected' : '' }}>Above Average</option>
                                            <option value="average" {{ $evaluation->overall_assessment_work_quality == 'average' ? 'selected' : '' }}>Average</option>
                                            <option value="lessthanaverage" {{ $evaluation->overall_assessment_work_quality == 'lessthanaverage' ? 'selected' : '' }}>Less than average</option>
                                            <option value="poor" {{ $evaluation->overall_assessment_work_quality == 'poor' ? 'selected' : '' }}>Poor</option>
                                            <option value="notobserved" {{ $evaluation->overall_assessment_work_quality == 'notobserved' ? 'selected' : '' }}>Not Observed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="professional_viewpoint">Please describe the work / tasks that the student accomplished and how well did the student perform these tasks from a professional view point</label>
                                        <textarea class="form-control" name="professional_viewpoint" id="professional_viewpoint" rows="3">{{ $evaluation->professional_viewpoint }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="comments_student">Any additional comments on the student eg. About the intern’s work characteristics, technical Knowledge and skills, ability to adapt to work environment / hardware / software etc.</label>
                                        <textarea class="form-control" name="comments_student" id="comments_student" rows="3">{{ $evaluation->comments_student }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="comments_intership">Any Comments on the internship program. Eg. Technical   knowledge   and    skills, academic / curricular preparation, methodology, programming, networking etc., to include in our curriculum to best prepare  our students for the industry.</label>
                                        <textarea class="form-control" name="comments_intership" id="comments_intership" rows="3">{{ $evaluation->comments_intership }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="comments">Other Comments</label>
                                        <textarea class="form-control" name="comments" id="comments" rows="3">{{ $evaluation->comments }}</textarea>
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


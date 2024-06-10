@extends('backend.layouts.app')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">Evaluation Page</div>
                        <div class="card-body">
                            <p class="card-text">Intern Name : {{ $evaluation->intern_id }}</p>
                            <p class="card-text">Roll Number : {{ $evaluation->roll_no }}</p>
                            <p class="card-text">Company Name : {{ $evaluation->company_id }}</p>
                            <p class="card-text">Username : {{ $evaluation->company_username }}</p>
                            <p class="card-text">Period : {{ $evaluation->period }}</p>
                            <p class="card-text">Total leaves taken : {{ $evaluation->leaves_day }}</p>
                            <p class="card-text">Maintained contact with supervisor : {{ $evaluation->contact_supervisor }}</p>
                            <p class="card-text">Punctual for works, appointments and attendance : {{ $evaluation->punctual }}</p>
                            <p class="card-text">Reliably performed all job assignments : {{ $evaluation->reliably_performed_assignments }}</p>
                            <p class="card-text">Ability to solve problem : {{ $evaluation->ability_solve_problem }}</p>
                            <p class="card-text">Organization skills : {{ $evaluation->organization_skills }}</p>
                            <p class="card-text">Communication Skills : {{ $evaluation->communication_skills }}</p>
                            <p class="card-text">Ability to work independently : {{ $evaluation->ability_work_independently }}</p>
                            <p class="card-text">Willingness to learn new tasks : {{ $evaluation->willingness_learn_new_tasks }}</p>
                            <p class="card-text">Eagerness to learn : {{ $evaluation->eagerness_to_learn }}</p>
                            <p class="card-text">Basic Skill : {{ $evaluation->basic_skill }}</p>
                            <p class="card-text">Professional appearance : {{ $evaluation->professional_appearance }}</p>
                            <p class="card-text">Overall assessment of work quality : {{ $evaluation->overall_assessment_work_quality }}</p>
                            <p class="card-text">Please describe the work / tasks that the student accomplished and how well did the student perform these tasks from a professional view point : {{ $evaluation->professional_viewpoint }}</p>
                            <p class="card-text">Any additional comments on the student eg. About the intern’s work characteristics, technical Knowledge and skills, ability to adapt to work environment / hardware / software etc. : {{ $evaluation->comments_student }}</p>
                            <p class="card-text">Any Comments on the internship program. Eg. Technical   knowledge   and    skills, academic / curricular preparation, methodology, programming, networking etc., to include in our curriculum to best prepare  our students for the industry. : {{ $evaluation->comments_intership }}</p>
                            <p class="card-text">Other Comments : {{ $evaluation->comments }}</p>

                        </div>
                        </hr>
                </div>
            </div>
    </div>
</div>
@endsection



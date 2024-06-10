@extends('backend.layouts.app')
@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">

<div class="card">
  <div class="card-header">Show Page</div>
  <div class="card-body">
   <div class="card-body">
        <p class="card-text">Intern Name: {{ $intern->name }}</p>
        <p class="card-text">Email: {{ $intern->email }}</p>
        <p class="card-text">Phone: {{ $intern->phone }}</p>
        <p class="card-text">University: {{ $intern->university->name }}</p>
        <p class="card-text">Birth Date: {{ $intern->date_of_birth }}</p>
        <p class="card-text">NRC: {{ $intern->nrc_no }}</p>
        <p class="card-text">Roll No: {{ $intern->roll_no }}</p>
        <p class="card-text">Degree: {{ $intern->education }}</p>
        <p class="card-text">Specialization: {{ $intern->specialization }}</p>
        <p class="card-text">Class Project: {{ $intern->class_project }}</p>
        <p class="card-text">Activity: {{ $intern->activity }}</p>
        <p class="card-text">Skill: {{ $intern->skill }}</p>
        <p class="card-text">Qualification: {{ $intern->qualification }}</p>
        <p class="card-text">Gender: {{ $intern->gender }}</p>
        <p class="card-text">Address: {{ $intern->address }}</p>
    </hr>
  </div>
</div>
</div>
</div>


</div>
</section>
</div>
</div>

@endsection

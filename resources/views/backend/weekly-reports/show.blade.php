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
    <h5 class="card-title">Intern Name: {{ $reports->intern_id }}</h5>
    <p class="card-text">Roll No: {{ $reports->roll_no }}</p>
    <p class="card-text">Month: {{ $reports->month }}</p>
    <p class="card-text">Week: {{ $reports->week }}</p>
    <p class="card-text">First Description: {{ $reports->first_description }}</p>
    <p class="card-text">Second Description: {{ $reports->second_description }}</p>
    <p class="card-text">Third Description: {{ $reports->third_description }}</p>
    <p class="card-text">Fourth Description: {{ $reports->fourth_description }}</p>
    <p class="card-text">Fifth Description: {{ $reports->fifth_description }}</p>
    <p class="card-text">Comment: {{ $reports->comment }}</p>
    <p class="card-text">Reflection: {{ $reports->reflection }}</p>
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
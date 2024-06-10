@extends('backend.layouts.app')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">University Page</div>
                        <div class="card-body">
                            <p class="card-text">Name : {{ $university->name }}</p>
                            <p class="card-text">Type : {{ $university->type }}</p>
                            <p class="card-text">Website : {{ $university->website }}</p>
                            <p class="card-text">Address : {{ $university->address }}</p>
                        </div>
                        </hr>
                </div>
            </div>
    </div>
</div>
@endsection



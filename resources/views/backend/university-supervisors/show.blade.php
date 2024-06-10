@extends('backend.layouts.app')
@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="card-header">
                    <div class="center">
                        <h4>University Supervisors Details</h4>
                    </div>
                    <div class="card-body">
                <div class="card-body">
                    <table class="table table-striped mb-1">
                        <tr>
                            <td><h4 class="card-title">Name : </h4></td>
                            <td> {{ $universitySupervisor->name }}</h4></td>
                        </tr>
                        <tr>
                            <td class="card-text">Email : </td>
                            <td>{{ $universitySupervisor->email }} </td>
                        </tr>
                        <tr>
                            <td class="card-text">Phone : </td>
                            <td> {{ $universitySupervisor->phone }}</td>
                        </tr>
                        <tr>
                            <td class="card-text">Position : </td>
                            <td>{{ $universitySupervisor->position }} </td>
                        </tr>
                        <tr>
                            <td class="card-text">University : </td>
                            <td>{{ $universitySupervisor->university->name }} </td>
                        </tr>
                        <tr>
                            <td class="card-text">Address : </td>
                            <td> {{ $universitySupervisor->address ?? '---' }}</td>
                        </tr>
                    </table>
                </div>
                <br>
            </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

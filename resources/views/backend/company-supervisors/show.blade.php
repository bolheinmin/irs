@extends('backend.layouts.app')
@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="card-header">
                    <div class="center">
                        <h4>Company Supervisors Details</h4>
                    </div>
                </div>
                <div class="card-body">
                <div class="card-body">
                    <table class="table table-striped mb-1">
                        <tr>
                            <td><h4 class="card-title">Name : </h4></td>
                            <td> {{ $companySupervisor->name }}</h4></td>
                        </tr>
                        <tr>
                            <td class="card-text">Email : </td>
                            <td>{{ $companySupervisor->email }} </td>
                        </tr>
                        <tr>
                            <td class="card-text">Phone : </td>
                            <td> {{ $companySupervisor->phone }}</td>
                        </tr>
                        <tr>
                            <td class="card-text">Position : </td>
                            <td>{{ $companySupervisor->position }} </td>
                        </tr>
                        <tr>
                            <td class="card-text">Company : </td>
                            <td>{{ $companySupervisor->company->name }} </td>
                        </tr>
                        <tr>
                            <td class="card-text">Address : </td>
                            <td> {{ $companySupervisor->address ?? '---' }}</td>
                        </tr>
                    </table>
                </div>
                <br>
            </div>
            </div>
        </section>
    </div>
</div>
@endsection

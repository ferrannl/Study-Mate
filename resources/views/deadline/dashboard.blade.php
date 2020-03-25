@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Deadlines
                        <a href="/deadline/create" class="btn btn-outline-success">Add</a>
                        <a href="/deadline-dashboard" class="btn btn-outline-warning">Reset filters</a>
                    </div>


                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th><a href="/deadline-dashboard/name"> Name</a></th>
                                <th><a href="/deadline-dashboard/module">Module</a></th>
                                <th><a href="/deadline-dashboard/teacher">Teacher</a></th>
                                <th><a href="/deadline-dashboard/deadline">Deadline</a></th>
                                <th><a href="/deadline-dashboard/category"> Category</a></th>
                                <th>Tags</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deadlines as $deadline)
                                <tr>
                                    <td>{{$deadline->name}}</td>
                                    <td>{{$deadline->module()->first()->name}}</td>
                                    <td>{{$deadline->teacher()->first()->name ?? 'None'}}</td>
                                    <td>{{$deadline->deadline}}</td>
                                    <td>{{$deadline->category()->first()->name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

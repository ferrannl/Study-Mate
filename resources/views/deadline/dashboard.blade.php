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
                                <th>Achieved</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deadlines as $deadline)
                                <tr>
                                    <td>{{$deadline->name}}</td>
                                    <td>{{$deadline->module()->first()->name ?? "None"}}</td>
                                    <td>{{$deadline->teacher()->first()->name ?? 'None'}}</td>
                                    <td>{{$deadline->deadline}}</td>
                                    <td>{{$deadline->category->name ?? "None"}}</td>
                                    <td>@foreach($deadline->tag as $tag)
                                            {{$tag->name}},
                                        @endforeach
                                    </td>
                                    <td>
                                    <input type="checkbox" {{$deadline->achieved ?? 'checked'}}  id="{{ $deadline->id }}" name="checked[]" value="{{ $deadline->id }}">

{{--                                        @foreach($teacher->module as $teacherModule)--}}
{{--                                            <input type="checkbox" checked id="{{ $teacherModule->name }}" name="modules[]" value="{{ $teacherModule->name }}">--}}
{{--                                            <label for="{{ $teacherModule->name }}">{{ $teacherModule->name }}</label><br>--}}
{{--                                        @endforeach--}}
{{--                                        @foreach($modules as $module)--}}
{{--                                            <input type="checkbox" id="{{ $module->name }}" name="modules[]" value="{{ $module->name }}">--}}
{{--                                            <label for="{{ $module->name }}">{{ $module->name }}</label><br>--}}
{{--                                        @endforeach--}}

                                    </td>
                                    <td><a href="/deadline/delete/{{$deadline->id}}" class="btn btn-outline-danger">Delete</a>
                                    </td>
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

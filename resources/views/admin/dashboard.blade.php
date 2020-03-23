@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Teachers <a href="/createTeacher" class="btn btn-primary">Add</a></div>

                    <div class="card-body">


                        @foreach($teachers as $teacher)
                            <h3>{{$teacher->name}}</h3>

                            <a href="/editTeacher/{{ $teacher->id }}" class="btn btn-primary">Edit</a>
                            <a href="/deleteTeacher/{{$teacher->id}}" class="btn btn-danger">Delete</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modules <a href="/createModule" class="btn btn-primary">Add</a></div>

                    <div class="card-body">
                        @foreach($modules as $module)
                            <h3>{{$module->name}}</h3>

                            <a href="/editModule/{{ $module->id }}" class="btn btn-primary">Edit</a>
                            <a href="/deleteModule/{{$module->id}}" class="btn btn-danger">Delete</a>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

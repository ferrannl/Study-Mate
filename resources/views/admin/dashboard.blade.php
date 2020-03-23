@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Teachers</div>

                    <div class="card-body">


                        @foreach($teachers as $teacher)
                            <h3>{{$teacher->name}}</h3>
                            @foreach($teacher->module as $module)
                                <h4>- {{ $module->name }}</h4>
                            @endforeach
                            <a href="#" class="btn btn-primary">Edit</a>
                            <a href="/deleteTeacher/{{$teacher->id}}" class="btn btn-danger">Delete</a>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

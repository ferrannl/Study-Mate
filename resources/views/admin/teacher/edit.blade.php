@extends('layouts.app')

@section('content')

    <div class="card uper">
        <div class="card-header">
            Edit Teacher
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif

            <form method="post" action="/teacher/update/{{$teacher->id}}">
                @csrf
                <div class="form-group">
                    <label for="name">Teacher Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $teacher->name }}" />
                </div>
                <div class="form-group">
                    <label for="name">Teacher modules:</label>
                    <br>
                    @foreach($teacher->module as $teacherModule)
                        <input type="checkbox" checked id="{{ $teacherModule->name }}" name="modules[]" value="{{ $teacherModule->name }}">
                        <label for="{{ $teacherModule->name }}">{{ $teacherModule->name }}</label><br>
                    @endforeach
                    @foreach($modules as $module)
                        <input type="checkbox" id="{{ $module->name }}" name="modules[]" value="{{ $module->name }}">
                        <label for="{{ $module->name }}">{{ $module->name }}</label><br>
                    @endforeach
                </div>
                <br>
                <button type="submit" class="btn btn-outline-success">Update</button>
            </form>

        </div>
    </div>
@endsection

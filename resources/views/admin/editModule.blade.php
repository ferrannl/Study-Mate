@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Module
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
            <form method="post" action="/updateModule/{{$module->id}}">
                @csrf
                <div class="form-group">
                    <label for="name">Module Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $module->name }}"/>
                </div>

                <div class="form-group">
                    <label for="name">Which teachers teach this module:</label>
                    <br>
                    @foreach($module->module as $teacherModule)
                        <input type="checkbox" checked id="{{ $teacherModule->name }}" name="modules[]" value="{{ $teacherModule->name }}">
                        <label for="{{ $teacherModule->name }}">{{ $teacherModule->name }}</label><br>
                    @endforeach
                    @foreach($modules as $module)
                        <input type="checkbox" id="{{ $module->name }}" name="modules[]" value="{{ $module->name }}">
                        <label for="{{ $module->name }}">{{ $module->name }}</label><br>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Who coordinates this module?</label>
                    <select class="form-control" id="selectTeacher" name="selectTeacher">
                        <option value="">Noone yet</option>
                        @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{ $teacher->name }}</option>
                        @endforeach


                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Who teaches this module to you?</label>
                    <select class="form-control" id="selectTeacher" name="selectTeacher">
                        <option value="">Noone yet</option>
                        @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{ $teacher->name }}</option>
                        @endforeach


                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Who teaches this module to you?</label>
                    <select class="form-control" id="selectTeacher" name="selectTeacher">
                        <option value="">Noone yet</option>
                        @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{ $teacher->name }}</option>
                        @endforeach


                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection

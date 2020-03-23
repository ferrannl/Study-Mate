@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
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
            <form method="post" action="/updateTeacher/{{$teacher->id}}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Teacher Name:</label>
                    <input type="text" class="form-control" name="share_name" value={{ $teacher->name }} />
                </div>
                <div class="form-group">
                    <label for="name">Teacher modules:</label>

                    @foreach($teacher->module as $module)
                        <p>- {{ $module->name }}</p>

                    @endforeach

                </div>
                <br>

                <button type="submit" class="btn btn-success">Save changes</button>
            </form>
        </div>
    </div>
@endsection

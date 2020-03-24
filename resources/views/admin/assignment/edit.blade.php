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
                <form method="post" action="/assignment/update/{{$assignment->id}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name"value="{{ $assignment->name }}"/>
                    </div>

                    <div class="form-group">
                        <label for="name">Description:</label>
                        <input type="text" class="form-control" name="description" value="{{ $assignment->description }}"/>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Module:</label>
                        <select class="form-control" id="selectedModule" name="selectedModule">
                            <option value="{{ $assignment->module_id ?? "" }}">{{ $assignment->module->find($assignment->module)->name ?? 'None'}}</option>

                        @foreach($modules as $module)
                                <option value="{{$module->id}}">{{ $module->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">File:</label>

                        <a href="/uploads/{{$assignment->file}}">{{$assignment->file}}</a>

                    </div>
                    <div class="form-group">
                        <p>If you upload another file the current file will be overwritten</p>
                        <input type="file" name="file" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>

                </form>
        </div>
    </div>
@endsection

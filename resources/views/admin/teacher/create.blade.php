@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Add Teacher</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="/teacher/store">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>

                    <div class="form-group">
                        @foreach($modules as $module)
                            <input type="checkbox" id="{{ $module->name }}" name="modules[]" value="{{ $module->name }}">
                            <label for="{{ $module->name }}">{{ $module->name }}</label><br>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-success">Add</button>

                </form>
            </div>
        </div>
    </div>
@endsection

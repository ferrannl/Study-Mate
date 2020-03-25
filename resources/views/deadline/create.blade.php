@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Add a Deadline</h1>
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
                <form method="post" action="/deadline/store">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Assignment: </label>
                        <select class="form-control" id="selectAssignment" name="selectAssignment">

                            @foreach($assignments as $assignment)
                                <option value="{{$assignment->id}}">{{ $assignment->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Deadline: </label>
                        <input name="deadline" type="datetime-local"/>
                    </div>




                    <button type="submit" class="btn btn-success">Add</button>

                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <div class="card uper">
        <div class="card-header">
            Edit Deadline
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
            <form method="post" action="/deadline/update/{{$assignment->id}}">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Tags: </label>
                    <br>
                    @foreach($tags as $tag)
                        <input type="checkbox" id="{{ $tag->name }}" name="tags[]" value="{{ $tag->name }}">
                        <label for="{{ $tag->name }}">{{ $tag->name }}</label><br>
                    @endforeach
                </div>


                <div class="form-group">
                    <label>Deadline: </label>
                    <div class="well">
                        <div id="datetimepicker1" class="input-append date">
                            <input name="deadline" value="{{$assignment->deadline}}" data-format="dd/MM/yyyy hh:mm:ss" type="text"/>
                            <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
                        </div>
                    </div>

                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker1').datetimepicker({
                                language: 'pt-BR'
                            });
                        });
                    </script>

                </div>

                <br>
                <button type="submit" class="btn btn-outline-success">Update</button>
            </form>
        </div>
    </div>

@endsection

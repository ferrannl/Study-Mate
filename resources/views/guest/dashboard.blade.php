@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modules:</div>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Grade</th>
                            <th>Achieved</th>
                            <th>Assignments</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($modules as $module)
                            <tr>
                                <td>{{$module->name}}</td>
                                <td>
                                    <label>{{$module->assignment->avg('grade')}}</label>
                                </td>
                                <td>@if($module->achieved == 1)
                                Yes
                                        @else
                                    Not yet
                                        @endif
                                </td>
                                <td>@foreach($module->assignment as $assignment)
                                 {{$assignment->name}}: {{$assignment->grade ?? "N/A"}} <br>
                                @endforeach
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

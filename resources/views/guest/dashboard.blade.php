@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modules:</div>

                    <div class="card-body">
                        @foreach($modules as $module)
                            <h3>{{$module->name}}</h3>

                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>

                    <div class="card-body">
                       
                            
                        @foreach($teachers as $teacher)
                            <h3>{{$teacher->name}}</h3>
                            

                        @endforeach

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

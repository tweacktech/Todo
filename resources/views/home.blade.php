@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __("WELCOME") }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        
                        <div class="col-md-6">
                        <a href="{{url('create')}}" class="btn btn-success"> Create + </a>
                    </div>

                    <div class="col-md-6">
                        <a href="{{url('index')}}" class="btn btn-primary"> Show List </a>
                    </div>
                </div>
                        <br>
                    <div class="row">
                        
                        <div class="col-md-4"> <a class="nav-link" href="{{ url('login') }}">{{ __('Total todo list ') }} </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

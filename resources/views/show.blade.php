@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
                    <div class="col-md-2">
                        <a href="{{url('create')}}" class="btn btn-success"> Create + </a>
                    </div>
                </div>
                <br>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __("WELCOME ") }}<a href="{{url('/home')}}">HOME</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  <center>
                    <div class="row">

                    <div class="col-md-4"> Title : </div>
                       
                        <div class="col-md-4"> {{$todo->title}}</div>
                       
                    </div><hr>
                    <div class="row">
                        <div class="col-md-4"> Description : </div>
                        <div class="col-md-4"> {{$todo->description}}</div>
                       
                    </div><br>
                    <div class="row">
                   <div class="card-footer"> 
<a href="{{url('edit',$todo->id)}}" class="btn btn-success"> Edit </a>

<a href="{{url('delete',$todo->id)}}" class="btn btn-danger"> Delete </a>
</div></div>

                </center>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

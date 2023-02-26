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

<div class="col-xl-8 col-lg-8 col-sm-12 col-12 m-auto">
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert">×</button>
{{ Session::get('success') }}
</div>
@elseif(Session::has('failed'))
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert">×</button>
{{ Session::get('failed') }}
</div>
@endif</div>
                    <div class="row">

                        <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>TITLE</th>
        <th>ACTIONS</th>
        
      </tr>
    </thead>
    <tbody>
        @foreach($todos as $da)
      <tr>       
        <td>#</td>
        <td>{{$da->title}}</td>
        <td ><a href="{{url('show',$da->id)}}"  class="btn btn-primary">Details</a>
            <a href="{{url('edit',$da->id)}}"  class="btn btn-success">Edit</a>
            <a href="{{url('delete',$da->id)}}"  class="btn btn-danger">Delete</a></td>
  @endforeach
      </tr>
    </tbody>
  </table>
  </div>

</div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

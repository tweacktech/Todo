@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __("WELCOME TO CREATE TODO ") }}<a href="{{url('/home')}}">HOME</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif                
                       
                       
 <form action="{{url('/store')}}" method="POST">
@csrf

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
@endif
<div class="card shadow">
<div class="card-header">
<h4 class="card-title">Using  CKEditor for Todo</h4>
</div>

    <div class="card-body">
<div class="form-group">
<label> Title </label>
<input type="text" class="form-control" name="title" placeholder="Enter the Title">
</div>
<div class="form-group">
<label> Body </label>
<textarea class="form-control"  id="body" placeholder="Enter the Description" name="description"
></textarea>
</div>
</div>
<div class="card-footer"> 
<button type="submit" class="btn btn-success"> Save </button>
</div>
</div>
</div>

</form>

                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
ClassicEditor
.create( document.querySelector( '#body' ) )
.catch( error => {
console.error( error );
} );
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
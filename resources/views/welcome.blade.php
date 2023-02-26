@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><center> <b>{{ __('TODO ') }}</b></center></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('') }}<wbr>
                    <center> <b>{{ __('Login to start  ') }}</b></center></wbr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

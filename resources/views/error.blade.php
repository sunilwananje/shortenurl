@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           @if(session()->has('error_message'))
                <div class="alert alert-danger" role="alert">
                  <i class="fa fa-exclamation-circle"></i>
                    {{ session()->get('error_message') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Generate Short URL</div>
                <div class="panel-body">
                   @if(session()->has('url_message'))
                        <div class="alert alert-success" role="alert">
                          <i class="fa fa-check"></i>
                            {!! session()->get('url_message') !!}
                        </div>
                    @endif
                     @if(session()->has('error_message'))
                        <div class="alert alert-danger" role="alert">
                          <i class="fa fa-exclamation-circle"></i>
                            {{ session()->get('error_message') }}
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/save_url') }}">
                        {{ csrf_field() }}
   
                        <div class="form-group{{ $errors->has('long_url') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">URL</label>

                            <div class="col-md-6">
                                <input id="long_url" type="text" class="form-control" name="long_url" value="{{ old('long_url') }}">

                                @if ($errors->has('long_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('long_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-save"></i> Generate Short URL
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
        @elseif( Session::has( 'warning' ))
                 <div class="alert alert-danger">
                    {{ Session::get( 'warning' ) }}
                    </div>
        @endif
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    {{ Form::open(array('route' => 'front.store','class' => 'form-horizontal', 'files'=>true)) }}


                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    {{ Form::label('image','Image',array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-10">
                            {{ Form::file('image',null,array('class' => 'form-control')) }}

                            @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span> 
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('alt') ? ' has-error' : '' }}">
                    {{ Form::label('alt','Alt',array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-10">
                            {{ Form::text('alt',null,array('class' => 'form-control')) }}
                            @if ($errors->has('alt'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alt') }}</strong>
                            </span> 
                            @endif                            
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                    {{ Form::label('title','Title',array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-10">
                            {{ Form::text('title',null,array('class' => 'form-control')) }}
                            @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span> 
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                    {{ Form::label('target','Target',array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-10">
                            {{ Form::checkbox('target',null,null,array('class' => 'form-control')) }}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('link') ? ' has-error' : '' }}">
                    {{ Form::label('link','Link',array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-10">
                            {{ Form::text('link',null,array('class' => 'form-control')) }}
                            @if ($errors->has('link'))
                            <span class="help-block">
                                <strong>{{ $errors->first('link') }}</strong>
                            </span> 
                            @endif                        
                        </div>
                    </div>

                    {{ Form::token() }}
                    {{ Form::submit(null, array('class' => 'btn btn-default center-block')) }} 
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
                <div class="panel-heading">{{ $data['name'] }}</div>

                <div class="panel-body">
                    {{ Form::model($data['arr'], array('route' => array($data['route'], $data['arr']->id),'class' => 'form-horizontal', 'method' => 'PUT')) }}

                    @foreach($data['form'] as $key)

                    @if($key['type']=='select')
                    <div class="form-group{{ $errors->has($key['name']) ? ' has-error' : '' }}">
                        {{ Form::label($key['name'],null,array('class' => ' col-md-2 control-label')) }}
                        <div class="col-md-10">
                            {{ Form::select($key['name'],$key['list'], null, array('class' => 'form-control')) }}
                        @if ($errors->has($key['name']))
                        <span class="help-block">
                                <strong>{{ $errors->first($key['name']) }}</strong>
                            </span> @endif
                            </div>                            
                    </div>
                    @endif
                    
                    @if($key['type']=='text')
                    <div class="form-group{{ $errors->has($key['name']) ? ' has-error' : '' }}">
                        {{ Form::label($key['name'],null,array('class' => ' col-md-2 control-label')) }}
                        <div class="col-md-10">
                            {{ Form::text($key['name'], null, array('class' => 'form-control')) }}
                        @if ($errors->has($key['name']))
                        <span class="help-block">
                                <strong>{{ $errors->first($key['name']) }}</strong>
                            </span> @endif
                            </div>                            
                    </div>
                    @endif

                    <!-- @if($key['type']=='hidden')
                    {{ Form::hidden($key['name'], null, array('class' => 'form-control')) }}
                    @endif -->

                    @if($key['type']=='file')
                    <div class="form-group{{ $errors->has($key['name']) ? ' has-error' : '' }}">
                        {{ Form::label($key['name'],null,array('class' => ' col-md-2 control-label')) }}
                        <div class="col-md-10">
                            {{ Form::file($key['name'], null, array('class' => 'form-control')) }}
                        @if ($errors->has($key['name']))
                        <span class="help-block">
                                <strong>{{ $errors->first($key['name']) }}</strong>
                            </span> @endif
                            </div>                            
                    </div>
                    @endif

                    @if($key['type']=='checkbox')
                    <div class="form-group{{ $errors->has($key['name']) ? ' has-error' : '' }}">
                        {{ Form::label($key['name'],null,array('class' => ' col-md-2 control-label')) }}
                        <div class="col-md-10">
                        {{ Form::checkbox($key['name'], 1, false) }}
                        
                        @if ($errors->has($key['name']))
                        <span class="help-block">
                                <strong>{{ $errors->first($key['name']) }}</strong>
                            </span> @endif
                            </div>                            
                    </div>
                    @endif

                    @if($key['type']=='textarea')
                    <div class="form-group{{ $errors->has($key['name']) ? ' has-error' : '' }}">
                        {{ Form::label($key['name'],null,array('class' => ' col-md-2 control-label')) }}
                        <div class="col-md-10">
                            {{ Form::textarea($key['name'], null, array('class' => 'form-control')) }}
                        @if ($errors->has($key['name']))
                        <span class="help-block">
                                <strong>{{ $errors->first($key['name']) }}</strong>
                            </span> @endif
                            </div>                            
                    </div>
                    @endif
                    
                    @endforeach

                    {{ Form::token() }}
                    {{ Form::submit(null, array('class' => 'btn btn-default center-block')) }} 
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
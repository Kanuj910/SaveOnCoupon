@extends('layouts.app') @section('content')
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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Network</div>
                <div class="panel-body">
                    {!! Form::model($network, array('route' => array('network.update', $network->id), 'method' => 'PUT')) !!}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {{ Form::label('name',null,array('class' => ' control-label')) }} {{ Form::text('name', null, array('class' => 'form-control')) }} @if ($errors->has('name'))
                        <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span> @endif
                    </div>
                    <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                        {{ Form::label('url',null,array('class' => ' control-label')) }} {{ Form::text('url', null, array('class' => 'form-control')) }} @if ($errors->has('url'))
                        <span class="help-block">
                                <strong>{{ $errors->first('url') }}</strong>
                            </span> @endif
                    </div>
                    <div class="form-group{{ $errors->has('tracking_id') ? ' has-error' : '' }}">
                        {{ Form::label('Trackingid',null,array('class' => ' control-label')) }} {{ Form::text('tracking_id', null, array('class' => 'form-control')) }} @if ($errors->has('tracking_id'))
                        <span class="help-block">
                                <strong>{{ $errors->first('tracking_id') }}</strong>
                            </span> @endif
                    </div>

                    {{ Form::token() }} {{ Form::submit(null, array('class' => 'btn btn-default')) }} {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

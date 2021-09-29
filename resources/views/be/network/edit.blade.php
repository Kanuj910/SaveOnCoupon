@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    {{ Form::model($network, array('route' => array('network.update', $network->id),'class' => 'form-horizontal', 'method' => 'PUT')) }}

                    @foreach($data['form'] as $key)

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

                    <div class="form-group">
                        <div class="col-md-2"></div>
                        <div class="col-md-5">Created by: {{ $network->created_by }}</div>
                        <div class="col-md-5">Updated by: {{ $network->updated_by }}</div>
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

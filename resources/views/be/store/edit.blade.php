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
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    {{ Form::model($store, array('route' => array('store.update', $store->id),'class' => 'form-horizontal','enctype'=> 'multipart/form-data', 'method' => 'PUT')) }}

                    @foreach($data['form'] as $key)

                    @if($key['type']=='select')
                    <div class="form-group{{ $errors->has($key['name']) ? ' has-error' : '' }}">
                        {{ Form::label($key['label'],null,array('class' => ' col-md-2 control-label')) }}
                        <div class="col-md-10">
                            {{ Form::select($key['name'],$key['list'],null, array('class' => 'form-control')) }}
                        @if ($errors->has($key['name']))
                        <span class="help-block">
                                <strong>{{ $errors->first($key['name']) }}</strong>
                            </span> @endif
                            </div>                            
                    </div>
                    @endif
                    
                    @if($key['type']=='text')
                    <div class="form-group{{ $errors->has($key['name']) ? ' has-error' : '' }}">
                        {{ Form::label($key['label'],null,array('class' => ' col-md-2 control-label')) }}
                        <div class="col-md-10">
                            {{ Form::text($key['name'], null, array('class' => 'form-control')) }}
                        @if ($errors->has($key['name']))
                        <span class="help-block">
                                <strong>{{ $errors->first($key['name']) }}</strong>
                            </span> @endif
                            </div>                            
                    </div>
                    @endif

                    @if($key['type']=='file')
                    <div class="form-group{{ $errors->has($key['name']) ? ' has-error' : '' }}">
                        {{ Form::label($key['label'],null,array('class' => ' col-md-2 control-label')) }}
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
                        {{ Form::label($key['label'],null,array('class' => ' col-md-2 control-label')) }}
                        <div class="col-md-10">
                        {{ Form::checkbox($key['name'], 1, $store->IsActive == 1 ? "checked" : "") }}
                        @if ($errors->has($key['name']))
                        <span class="help-block">
                                <strong>{{ $errors->first($key['name']) }}</strong>
                            </span> @endif
                            </div>                            
                    </div>
                    @endif

                    @if($key['type']=='textarea')
                    <div class="form-group{{ $errors->has($key['name']) ? ' has-error' : '' }}">
                        {{ Form::label($key['label'],null,array('class' => ' col-md-2 control-label')) }}
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
                    <div class="col-md-5">Created by: {{ $store->created_by }}</div>
                    <div class="col-md-5">Updated by: {{ $store->updated_by }}</div>
                    </div>

                    {{ Form::token() }}
                    {{ Form::submit(null, array('class' => 'btn btn-default center-block')) }} 
                    
                </div>
            </div>
        </div>
        <div class="col-mod-6">
           <h3>Categories</h3>
              <div class="box">
                {!! $tree !!}
              </div>
        </div>
        {{ Form::close() }}
    </div>
</div>


<style >
    .box {
    border-radius: 3px;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    padding: 10px 25px;
    text-align:left;
    display: block;
    height:500px;
    overflow: auto;

}

ul {
  list-style-type: none;
}
li{
    list-style-type: none;

}



</style>
@endsection
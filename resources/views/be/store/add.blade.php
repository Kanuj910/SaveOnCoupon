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
        <div class="col-md-6 ">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    {{ Form::open(array('route' => $data['route'],'class' => 'form-horizontal','files'=>true)) }}

                    @foreach($data['form'] as $key)

                    @if($key['type']=='select')
                    <div class="form-group{{ $errors->has($key['name']) ? ' has-error' : '' }}">
                        {{ Form::label($key['label'],null,array('class' => ' col-md-2 control-label')) }}
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

                    {{ Form::token() }}
                    {{ Form::submit(null, array('class' => 'btn btn-default center-block')) }} 
                    
                </div>
            </div>
        </div>
        <div class="col-md-6 {{ $errors->has('categoryID') ? ' has-error' : '' }} {{ $errors->has('category') ? ' has-error' : '' }}">

            <div class="panel panel-default">
                <div class="panel-heading">Categories</div>
                <div class="panel-body">
                    @if ($errors->has('categoryID'))
                    <span class="help-block">
                        <strong>{{ $errors->first('categoryID') }}</strong>
                    </span> @endif

                    @if ($errors->has('category'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category') }}</strong>
                    </span> 
                    @endif
                    <div class="box">
                        {!! $tree !!}
                    </div>
                </div>
        </div>
        </div>
        {{ Form::close() }}
    </div>
</div>


<style >
    .box {
    padding: 10px 25px;
    text-align:left;
    display: block;
    overflow: auto;
}

ul {
  list-style-type: none;
}
li{
    list-style-type: none;

}
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $('input[name="title"]').keyup(function(){
            var name = $(this).val();
            name = name.trim();
            name = name.replace(/[^a-zA-Z0-9\.]/g,"-");
            name = name.replace(/[^a-zA-Z0-9\.]/g,"-");
            name = name.replace( /-+/g, '-' );
            $('input[name="seo_url"]').val(name);
        });
    });
</script>
@endsection
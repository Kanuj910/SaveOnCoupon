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
        <div class="col-md-12">

            <div class="col-md-12">

            <div class="panel panel-default">
                    <div class="panel-heading">Premium Content</div>

                        <div class="panel-body">
                        {{ Form::model($data['content'], array('route' => array('seo.store.content.update', $data['content']->id),'class' => 'form-horizontal','enctype'=> 'multipart/form-data','method' => 'PUT')) }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            {{ Form::label('title',null,array('class' => ' col-md-2 control-label')) }}
                            <div class="col-md-10">
                                {{ Form::text('title', null, array('class' => 'form-control')) }}
                            @if ($errors->has('title'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span> @endif
                                </div>                            
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            {{ Form::label('content',null,array('class' => ' col-md-2 control-label')) }}
                            <div class="col-md-10">
                                {{ Form::textarea('description', null, array('class' => 'form-control editable')) }}
                            @if ($errors->has('description'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span> @endif
                                </div>                            
                        </div>

                        {{ Form::token() }}
                        {{ Form::submit('Update', array('class' => 'btn btn-default center-block')) }} 
                        {{ Form::close() }}
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>

<script type="text/javascript" src="{{ URL('/') }}/assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
selector: ".editable",
relative_urls: false,
remove_script_host: false,
theme_advanced_blockformats: 'p,address,pre,h1,h2,h3,h4,h5,h6',
plugins: [
      "textcolor code",
      "advlist autolink lists link image charmap print preview anchor",
      "searchreplace visualblocks code fullscreen",
      "insertdatetime media table contextmenu paste"
],
toolbar: "code | formatselect | bold italic | forecolor | alignleft aligncenter alignright alignjustify | bullist numlist | link image"
});
</script>
@endsection
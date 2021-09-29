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
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $data['name'] }}</div>

                        <div class="panel-body">
                        {{ Form::model($data['arr'], array('route' => array($data['route'], $data['arr']->id),'class' => 'form-horizontal','enctype'=> 'multipart/form-data','method' => 'PUT')) }}

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
                            @if($data['arr']['banner']!='')
                            <img src="{{ URL('/').'/images/banner/store/1350/'.$data['arr']['banner'] }}" class="img-responsive center-block" />
                            <br />
                            @endif
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

            <div class="col-md-6">

                <div class="panel panel-default">
                    <div class="panel-heading">Premium Content</div>

                        <div class="panel-body">
                        {{ Form::open(array('route' => 'seo.store.content.store','class' => 'form-horizontal')) }}

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

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            {{ Form::label('content',null,array('class' => ' col-md-2 control-label')) }}
                            <div class="col-md-10">
                                {{ Form::textarea('content', null, array('class' => 'form-control editable')) }}
                            @if ($errors->has('content'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span> @endif
                                </div>                            
                        </div>

                        {{ Form::hidden('sid', $data['arr']->id, array('class' => 'form-control')) }}

                        {{ Form::token() }}
                        {{ Form::submit('Add New', array('class' => 'btn btn-default center-block')) }} 
                        {{ Form::close() }}
                    </div>

                    <table class="table">
                        <tr>
                            <th>Title</th>
                            <th>Edit</th>
                        </tr>
                        @foreach($data['premium_content'] as $content)
                        <tr>
                            <td>{{ $content->title }}</td>
                            <td>
                                <a href="{{ route('seo.store.content.edit',$content->id) }}" target="_blank" class="btn btn-sm btn-default">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                    <hr>

                    <div class="content container-fluid">
                    
                    <h4>
                        Drag &amp; Drop Content  
                        <div class="btn-group pull-right">
                            <button class="btn btn-success btn-xs sort-content">Save</button>
                        </div>
                    </h4>

                    <div class="col-md-4 text-center">Main</div>
                    <div class="col-md-4 text-center">Sidebar</div>
                    <div class="col-md-4 text-center">Source</div>
                        

                    <div class="col-md-4">
                        <ul id="sortable1" class="droptrue">
                        @if(isset($data['content_sort']['main']))
                        @foreach($data['content_sort']['main'] as $content)
                            <li class="ui-state-highlight" data-sort="{{ $content['id'] }}">{{ $content['title'] }}</li>
                        @endforeach
                        @endif
                        </ul>
                    </div>

                    <div class="col-md-4">
                        <ul id="sortable2" class="droptrue">
                        @if(isset($data['content_sort']['side']))
                        @foreach($data['content_sort']['side'] as $content)
                            <li class="ui-state-highlight" data-sort="{{ $content['id'] }}">{{ $content['title'] }}</li>
                            @endforeach                            
                        @endif
                        </ul>
                    </div>
                       
                    <div class="col-md-4">
                        <ul id="sortable3" class="droptrue">
                        @if(isset($data['content_sort']['delete']))
                        @foreach($data['content_sort']['delete'] as $content)
                            <li class="ui-state-highlight" data-sort="{{ $content['id'] }}">{{ $content['title'] }}</li>
                        @endforeach
                        @endif
                        </ul>
                    </div>

                    <style>
                    #sortable1, #sortable2, #sortable3 { list-style-type: none; margin: 0; float: left; margin-right: 10px; background: #eee; padding: 5px; width: 143px;}
                    #sortable1 li, #sortable2 li, #sortable3 li { margin: 5px; padding: 5px; font-size: 1.2em; width: 120px; }
                    </style>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $( "ul.droptrue" ).sortable({
          connectWith: "ul"
        });
        $( "ul.dropfalse" ).sortable({
          connectWith: "ul",
          dropOnEmpty: false
        });
        $( "#sortable1, #sortable2, #sortable3" ).disableSelection();
      });


    $('.sort-content').click(function(){
        var main_content = [];
        var sidebar_content = [];
        var delete_content = [];

        $('#sortable1>li').each(function(){main_content.push(($(this).attr("data-sort")))});
        $('#sortable2>li').each(function(){sidebar_content.push(($(this).attr("data-sort")))});
        $('#sortable3>li').each(function(){delete_content.push(($(this).attr("data-sort")))});

        var json_main_content = JSON.stringify(main_content);
        var json_sidebar_content = JSON.stringify(sidebar_content);
        var json_delete_content = JSON.stringify(delete_content);

        $.ajax({
            url: '{{route('store.content.sort')}}',
            headers: {
                'X-CSRF-TOKEN': $('input[name=_token]').val()
            },
            data: {
                main: json_main_content,
                side: json_sidebar_content,
                delete: json_delete_content
            },
            type: 'POST',
            success: function(resp) {
            }
        });

    });
</script>

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
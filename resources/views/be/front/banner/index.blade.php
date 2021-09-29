@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <a href="{{ route('front.create') }}" class="btn btn-success btn-lg">Create Banner</a>
            <br /><br />

            <div class="panel panel-default">

                <div class="panel-heading">Welcome</div>

                <div class="panel-body">

                <table class="table">
                    <tr>
                        <th>Image</th>
                        <th>alt</th>
                        <th>title</th>
                        <th>target</th>
                        <th>link</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($data['table'] as $key)
                    <tr>
                        <td><img src="{{ url('/') }}/images/banner/home/172/{{ $key->image }}" height="32" class="img-responsive" /></td>
                        <td>{{ $key->alt }}</td>
                        <td>{{ $key->title }}</td>
                        <td>{{ ($key->target==1 ? 'new tab' : '') }}</td>
                        <td>{{ $key->link }}</td>

                        <td><a href="{{ route('front.edit', $key->id) }}" class="btn btn-default">Edit</a>
                        </td>
                        <td>
                            {{Form::open(['route'=>array('front.destroy',$key->id),'method'=>'delete'])}}
                          <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span>
                            Delete
                          </button>
                        {{Form::close()}}
                        </td>
                    </tr>
                    @endforeach
                </table>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
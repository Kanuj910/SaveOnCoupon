@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
                    @endif
            <a href="{{ route('users.create') }}">
                <div class="btn btn-success"> Create New User</div>
            </a>
            <div class="panel panel-default">
                <div class="panel-heading">All Users</div>
                <div class="panel-body">
                    <table class=" table ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if(!empty($user->roles))
                                            @foreach($user->roles as $v)
                                                <label class="label label-success">{{ $v->display_name }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-center">
                    {{$data->links()}}
                </div>
    </div>
</div>
@endsection

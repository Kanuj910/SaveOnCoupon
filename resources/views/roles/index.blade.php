@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
                    @endif
            <a href="{{ route('roles.create') }}">
                <div class="btn btn-success"> Create New Role</div>
            </a>
            <div class="panel panel-default">
                <div class="panel-heading">Role Management</div>
                <div class="panel-body">
                    <table class=" table ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $role->display_name }}</td>
                                            <td>{{ $role->description }}</td>
                                            <td>
                                                @permission('role-edit')
                                                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                                @endpermission
                                                @permission('role-delete')
                                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                                @endpermission
                                            </td>
                                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-center">
                    {{$roles->links()}}
                </div>
    </div>
</div>
@endsection

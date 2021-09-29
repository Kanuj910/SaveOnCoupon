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
        <div class="col-md-12">
            <a href="network/create">
                <div class="btn btn-success">Add Network</div>
            </a>   
            <h4 class="pull-right">Total : {{$networks->total()}}</h4>
            <div class="clearfix"></div>
            <div class="panel panel-default">
                <div class="panel-heading">All Networks</div>
                <div class="panel-body">
                    <table class=" table ">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Url</th>
                                <th>trackingid</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($networks as $key)
                            <tr>
                                <td>{{$key->name}}</td>
                                <td>{{$key->url}}</td>
                                <td>{{$key->tracking_id}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
            {{$networks->links()}}
        </div>
</div>
@endsection

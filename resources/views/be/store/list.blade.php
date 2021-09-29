@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="{{ route($data['route']) }}">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-plus"></i> Add {{ $data['page'] }}
                </button>
            </a>
            

            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    @include('admin.templates.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
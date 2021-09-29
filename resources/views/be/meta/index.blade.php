@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Meta</div>
                <div class="panel-body">
                    <div class="col-md-3">
                        <a href="{{ route('meta.category') }}" class="btn btn-primary btn-lg">Category</a>
                    </div> 
                    <div class="col-md-3">
                        <a href="{{ route('meta.store') }}" class="btn btn-primary btn-lg">Store</a></div>
					<div class="col-md-3">
                        <a href="{{ route('meta.event') }}" class="btn btn-primary btn-lg">Event</a></br>
                    </div> 
                    <div class="col-md-3">
                        <a href="{{ route('meta.all') }}" class="btn btn-primary btn-lg">Page</a></br>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

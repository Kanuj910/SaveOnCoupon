@extends('layouts.master')

@section('content')

<div class="container">
    <div class="error-404 text-center col">
        <h1>404 <i class="glyphicon glyphicon-warning-sign"></i></h1>
        <h2 class="font-bold">Oh no! We couldn't find the page you were looking for.</h2>
        <div class="text-center error-desc">
            <div>
                <br/>
                <p>Go back to <a href="{{ route('page.home') }}">vouchertopay.co.uk</a> or contact us about a problem.</p>
            </div>
        </div>
    </div>
</div>

@endsection
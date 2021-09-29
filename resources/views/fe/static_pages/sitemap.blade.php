@extends('layouts.master') 

@section('meta_title') {{ $data['meta']->meta_title }} @endsection
@section('meta_description') {{ $data['meta']->meta_description }} @endsection
@section('meta_keywords') {{ $data['meta']->meta_keywords }} @endsection
@section("robots")
	@if($data['meta']->robots==1)
		<meta name="robots" content="index, follow">
	@else
		<meta name="robots" content="noindex, nofollow">
	@endif
@endsection


@section('content')
<div class="container-fluid">
    <h1 class="text-center">Sitemap</h1>
    <div class="col-md-10 col-md-offset-1">
        <h2 class="text-center">Site Info</h2>
            <ul class="list-unstyled">                
                <li class="col-sm-3 list-group-item">
                    <a href="{{ route('page.about') }}"><h5>About Us</h5></a>
                </li>
                <li class="col-sm-3 list-group-item">
                    <a href="{{ route('page.privacy') }}"><h5>Privacy Policy</h5></a>
                </li>
                <li class="col-sm-3 list-group-item">
                    <a href="{{ route('page.terms') }}"><h5>Terms &amp; Conditions</h5></a>
                </li>
                <li class="col-sm-3 list-group-item">
                    <a href="{{ route('page.faq') }}"><h5>FAQ</h5></a>
                </li>
                <li class="col-sm-3 list-group-item">
                    <a href="{{ route('page.contact') }}"><h5>Contact Us</h5></a>
                </li>
            </ul>

            <div class="clearfix"></div>

            <h2 class="text-center">Categories</h2>
            <ul class="list-unstyled">
                @foreach($data['categories'] as $key)
                <li class="col-sm-3 list-group-item">
                    <a href="{{ route('page.category',$key->seo_url) }}">
                        <h5>{{ $key->name }}</h5>
                    </a>
                </li>
                @endforeach
            </ul>

            <div class="clearfix"></div>

            <h2 class="text-center">Stores</h2>
            <ul class="list-unstyled">
                @foreach($data['stores'] as $key)
                <li class="col-sm-3 list-group-item">
                    <a href="{{ route('page.store',$key->seo_url) }}">
                        <h5>{{ $key->title }}</h5>
                    </a>
                </li>
                @endforeach
            </ul>
    </div>
</div>
@endsection

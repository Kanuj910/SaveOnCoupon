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

<h1 class="text-center">{{ $data['meta']->h1 }}</h1>
<div class="container stores">

    <ul class="list-unstyled">
	@foreach($data['stores'] as $store)
	<li class="col-sm-3 list-group-item">
		<a href="{{ route('page.store',$store->seo_url) }}">
			<h5>{{ $store->title }}</h5>
		</a>
	</li>
	@endforeach
	</ul>
</div>
@endsection
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

<div class="container events">
@foreach($data['events'] as $event)
<!-- <div class="row col-md-4 center-block text-center well"> -->
<div class="col-6 col-sm-4 text-center">
	<article class="thumbnail">
		<a href="{{ route('page.event',$event->seo_url) }}">
				<img src="{{ route('page.home')."/images/event/".$event->image_url }}" class="img-responsive center-block">		

			<h4>{{ $event->event }}</h4>
		</a>
	</article>
</div>
@endforeach
</div>

<style type="text/css">
	.categories a{
		text-decoration: none;
	}
	/*.categories>div{margin: auto 1px}*/
</style>

@endsection
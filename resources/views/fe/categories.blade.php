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

@section('h1') {{ $data['meta']->h1 }} @endsection

@section('content')
<h1 class="text-center">{{ $data['meta']->h1 }}</h1>
<div class="container categories">
@foreach($data['categories'] as $category)
<div class="col-6 col-sm-4 text-center">
	<article class="thumbnail">
		<a href="{{ route('page.category',$category->seo_url) }}">
			<span class="btn-lg icon icon-{{ $category->image_url }}"></span>
			<h4>{{ $category->name }}</h4>
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
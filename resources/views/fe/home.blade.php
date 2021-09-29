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

@if(isset($data['banner'][0]))

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        @foreach($data['banner'] as $key => $value)
        <div class="item {{ ($key==0 ? 'active' : '' ) }}">
            <a href="{{ $value->link }}" target="{{ ($value->target == 1) ? '_blank' : '' }}">
                <img src="{{ route('page.home') }}/images/banner/home/1350/{{ $value->image }}" alt="{{ $value->alt }}" title="{{ $value->title }}" width="1350" height="250">
            </a>
        </div>
        @endforeach
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
@endif


<h1 class="text-center">{{ $data['meta']->h1 }}</h1>


@foreach(array_chunk($data['coupons'],3)  as $chunk)

<div class="col-sm-12">
    @foreach($chunk as $coupon)
    <div class="col-sm-4" data-couponid="{{ $coupon['cid'] }}">
        <div class="well text-center">
            <a href="{{ route('page.store', $coupon['seo_url']) }}">
            <img src="{{ route('page.home') }}/images/store/220/{{ $coupon['image'] }}" class="img-responsive center-block">
            </a>

                <a href="{{ route('usecoupon',$coupon['cid']) }}" rel="nofollow" class="coupon-title">
                <h4>{{ $coupon['title'] }}</h4>
                </a>

            @if($coupon['code']!='')
            <span class="label label-success">CODE</span>&nbsp;
            @else
            <span class="label label-danger">SALE</span>&nbsp;
            @endif

            <div class="clearfix"></div>
            <br />

            @if($coupon['expire_date'] > date('Y-m-d',strtotime(time())))
            <span class="glyphicon glyphicon-time"></span> {{ date('M d, Y',strtotime($coupon['expire_date'])) }}.
            @endif

        </div>
    </div>
    @endforeach
    </div>
@endforeach

@if(1==2)
<div class="row well">
    <div class="col-sm-4">
        <img src="images/spl-web-1485906923426.jpg" class="img-responsive" style="width:100%" alt="Image">
        <h4>Upto Rs 500 CB + Rs 100 Mobi Cash - <br><br><span style="font-weight: bolder;color: #6fc0d1">Grofers</span></h4>
    </div>
    <div class="col-sm-4">
        <img src="images/spl-web-1485878544895.jpg" class="img-responsive" style="width:100%" alt="Image">
        <h4>Save Flat 30% OFF On First Order - <br><br><span style="font-weight: bolder;color: #6fc0d1">Medlife</span></h4>
    </div>
    <div class="col-sm-4">
        <img src="images/spl-web-1485912344910.jpg" class="img-responsive" style="width:100%" alt="Image">
        <h4>Flat 20% Off on Self Drive Car Rentals - <br><br><span style="font-weight: bolder;color: #6fc0d1">Zoomcar</span></h4>
    </div>
</div>
@endif

    <h2 class="text-center">{{ $data['meta']->h2 }}</h2>
    <br> 


@foreach(array_chunk($data['new_coupons'],4)  as $chunk)

<div class="col-sm-12">
    @foreach($chunk as $coupon)
    <div class="col-sm-3" data-couponid="{{ $coupon['cid'] }}">
        <div class="well text-center">
            <a href="{{ route('page.store', $coupon['seo_url']) }}">
            <img src="{{ route('page.home') }}/images/store/220/{{ $coupon['image'] }}" class="img-responsive center-block">
            </a>

                <a href="{{ route('usecoupon',$coupon['cid']) }}" rel="nofollow" class="coupon-title">
                <h4>{{ $coupon['title'] }}</h4>
                </a>

            @if($coupon['code']!='')
            <span class="label label-success">CODE</span>&nbsp;
            @else
            <span class="label label-danger">SALE</span>&nbsp;
            @endif

            <div class="clearfix"></div>
            <br />

            @if($coupon['expire_date'] > date('Y-m-d',strtotime(time())))
            <span class="glyphicon glyphicon-time"></span> {{ date('M d, Y',strtotime($coupon['expire_date'])) }}.
            @endif

        </div>
    </div>
    @endforeach
    </div>
@endforeach


<div class="container text-center stores">
    <h2>Online Coupons From New Stores</h2>
    <ul class="list-unstyled">
	    @foreach($data['newStores'] as $store)
	        <li class="col-sm-3 list-group-item"><a href="{{ route('page.store',$store->seo_url) }}">{{ $store->title }}</a></li>
	    @endforeach    
    </ul>
</div>

@endsection
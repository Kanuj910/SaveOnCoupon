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
	@if($data['page']->banner!='')
    	<img src="{{ URL('/').'/images/banner/store/1350/'.$data['page']->banner }}" class="img-responsive center-block">
    @endif
    <div class="content container-fluid">
        <div class="col-sm-9 pull-right">
			<h1>{{ $data['meta']->h1 }}</h1>
            <hr>

			<div class="coupons">
				@foreach($data['coupons'] as $coupon)
					<div class="row" data-couponid="{{ $coupon->cid }}">
					    <div class="col-md-2">
					    	@if($coupon->discount_value[0]=='sale')
					    		<h3 class="text-center offer-size">SALE</h3>
			                @elseif($coupon->discount_value[0]=='%')
			                	<span class="label label-danger">SAVE</span>
				                <h3 class="text-center offer-size">{{ $coupon->discount_value[1].$coupon->discount_value[0] }}</h3>
				            @elseif($coupon->discount_value[0]=='&pound;')
			                	<span class="label label-danger">SAVE</span>
				                <h3 class="text-center offer-size">£{{ $coupon->discount_value[1] }}</h3>
				            @elseif($coupon->discount_value[0]=='Free shipping')
				            	<span class="label label-danger">SHIPPING</span>
				            	<h3 class="text-center offer-size">Free</h3>
			                @endif
			            </div>
			            <div class="col-md-7">
						    <a href="{{ route('usecoupon',$coupon->cid) }}" rel="nofollow" class="coupon-title">
						    	<h3>{{ $coupon->title }}</h3>
						    </a>

					    	<h5>
			                @if($coupon->expire_date > date('Y-m-d',strtotime(time())))
			                <span class="glyphicon glyphicon-time"></span> {{ date('M d, Y',strtotime($coupon->expire_date)) }}.
			                @endif

			                </h5>

					        <p>{!! $coupon->description !!}</p>
					    </div>
					    <div class="col-sm-3">
					    @if($coupon->code!='')
				            <a href="{{ route('usecoupon',$coupon->cid) }}" rel="nofollow" class="coupon-title"><button type="button" class="btn btn-info">SHOW CODE</button>
				            </a>
			            @else
				            <a href="{{ route('usecoupon',$coupon->cid) }}" rel="nofollow" class="coupon-title"><button type="button" class="btn btn-default">GET OFFER</button>
				            </a>
			            @endif
				            
					    </div>
					</div>
					<hr>
				@endforeach
			</div>

			@if(isset($data['premium_content']['main'][0]))
			@foreach($data['premium_content']['main'] as $key)
				<h3>{{ $key['title'] }}</h3>
            	<hr>
				{!! $key['description'] !!}
			@endforeach
			@endif

			@if(isset($data['coupons_exp'][0]))

			<h2>Recently expired {{ $data['meta']->h2 }}</h2>
			<hr>
			<div class="coupons">
				@foreach($data['coupons_exp'] as $coupon)
					<div class="row" data-couponid="{{ $coupon->cid }}">
					    <div class="col-sm-9">
						    <a href="{{ route('usecoupon',$coupon->cid) }}" rel="nofollow" class="coupon-title">
						    	<h3>{{ $coupon->title }}</h3>
						    </a>

					    	<h5>
			                @if($coupon->code!='')
			                <span class="label label-default">CODE</span>&nbsp;
			                @else
			                <span class="label label-default">SALE</span>&nbsp;
			                @endif
			                
			                </h5>

					        <p>{!! $coupon->description !!}</p>
					    </div>
					    <div class="col-sm-3">
					    @if($coupon->code!='')
				            <a href="{{ route('usecoupon',$coupon->cid) }}" rel="nofollow" class="coupon-title"><button type="button" class="btn btn-info">SHOW CODE</button>
				            </a>
			            @else
				            <a href="{{ route('usecoupon',$coupon->cid) }}" rel="nofollow" class="coupon-title"><button type="button" class="btn btn-default">GET OFFER</button>
				            </a>
			            @endif
				            
					    </div>
					</div>
					<hr>
				@endforeach
			</div>
			@endif


        </div>
        <div class="col-sm-3 sidenav pull-left">

			<div class="text-center btn-lg">
				@if(1==2)<span class="glyphicon glyphicon-heart pull-right"></span>@endif

				<img src="{{ route('page.home')."/images/store/220/".$data['page']->image_url }}" alt="{{ $data['page']->title }} coupons" class="img-responsive center-block">
			</div>

			@if($data['page']->description!='')
			<div class="about-store">
				<h3>About {{ $data['page']->title }}</h3>
				{!! $data['page']->description !!}
			</div>
			@endif

			@if(isset($data['page']->video_url) && $data['page']->video_url!='')
			<h3>{{ $data['page']->title }} Video</h3>
			<div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src="{{ $data['page']->video_url }}"></iframe>
			</div>
			@endif

			@if(isset($data['premium_content']['side'][0]))
			@foreach($data['premium_content']['side'] as $key)
				<h3>{{ $key['title'] }}</h3>
				{!! $key['description'] !!}
			@endforeach
			@endif
			
            @if(1==2)
            <div class="well text-center">
                <img src="{{ route('page.home') }}/images/amazon-offer.jpg" class="img-responsive center-block" />
            </div>
            @endif

            @if(isset($data['relStores'][0]))
			<div>
				<h3>Related Stores</h3>
				<ul class="list list-unstyled stores">
					@foreach($data['relStores'] as $store)
						<li>
							<a href="{{ route('page.store',$store->seo_url) }}">{{ $store->title }}</a>
						</li>
					@endforeach
				</ul>
			</div>
			@endif

			@if(1==2)
			<div class="well">
				<ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="#">Home</a></li>
				    <li class="breadcrumb-item"><a href="#">Library</a></li>
				    <li class="breadcrumb-item active">Data</li>
				</ol>
			</div>
			@endif

        </div>
    </div>
@endsection
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
        <div class="row content">
            <div class="col-sm-9 pull-right">
    			<h1>{{ $data['meta']->h1 }}</h1>
                <hr>

				<div class="col-sm-12">
					@foreach($data['coupons'] as $coupon)
						<div class="row">
						    <div class="col-sm-3">
					            <img src="{{ route('page.home')."/images/store/".$coupon->image }}" class="img-responsive center-block">		            
						    </div>
						    <div class="col-sm-6">
						    	<a href="{{ route('usecoupon',$coupon->cid) }}" rel="nofollow" class="coupon-title">
							    	<h3>{{ $coupon->title }}</h3>
							    </a>
						    	
						    	<h5>
				                @if($coupon->code!='')
				                <span class="label label-success">CODE</span>&nbsp;
				                @else
				                <span class="label label-danger">SALE</span>&nbsp;
				                @endif

				                @if($coupon->expire_date > date('Y-m-d',strtotime(time())))
				                <span class="glyphicon glyphicon-time"></span> {{ date('M d, Y',strtotime($coupon->expire_date)) }}.
				                @endif
				                </h5>

						        <p>{{ $coupon->description }}</p>
						    </div>
						    <div class="col-sm-3">
					            
						    @if($coupon->code!='')
					            <a href="{{ route('usecoupon',$coupon->cid) }}" rel="nofollow" class="coupon-title"><button type="button" class="btn btn-success">SHOW CODE</button>
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
            </div>
            <div class="col-sm-3 sidenav pull-left">

				<div class="well text-center btn-lg">
				<img src="{{ route('page.home')."/images/event/".$data['page']->image_url }}" class="img-responsive center-block">		
				</div>
				


				@if(1==2)
	            <div class="well text-center">
	                <img src="{{ route('page.home') }}/images/amazon-offer.jpg" class="img-responsive center-block" />
	            </div>
	            @endif

				@if(1==2)
				<div class="well">
					<h3>About {{ $data['page']->event }}</h3>
					<p>{{ $data['page']->description }}</p>
				</div>

				<div class="well">
					<ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="#">Home</a></li>
					    <li class="breadcrumb-item"><a href="{{ route('page.category',$data['page']->url) }}">{{ $data['page']->name }}</a></li>
					    <li class="breadcrumb-item active">Data</li>
					</ol>
				</div>
				@endif

            </div>
        </div>
    </div>
@endsection
@extends('layouts.master')

@section('content')

<div class="container">
    <div class="text-center col">
        <h1>{!! $data['h1'] !!}</h1>
    </div>
    <hr>
</div>

<div class="container text-center">
    <h2>Browse our top coupons</h2>
    <br> @foreach($data['coupons'] as $coupon)
    <div class="col-sm-4" data-couponid="{{ $coupon['cid'] }}">
        <div class="well text-center">
            <img src="{{ route('page.home') }}/images/store/125/{{ $coupon['image'] }}" class="img-responsive center-block">

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

@endsection
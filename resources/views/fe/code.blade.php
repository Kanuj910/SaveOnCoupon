@extends('layouts.master')

@section('meta_title') {{ $data['store']->title." - ".$data['coupon']->title }} @endsection
@section('meta_description') {{ $data['store']->title." - ".$data['coupon']->description }} @endsection
@section('meta_keywords') {{ $data['store']->title." coupons, ".$data['store']->title." discounts,  " }} @endsection

@section('content')

<nav class="navbar2" style="background-color: #442a74">
  <div class="container-fluid">
    <ul class="nav pull-left">
      <li>
          <a href="{{ route('page.home') }}">
            <span class="icon icon-back"></span>
            Go Back
          </a>
      </li>
    </ul>

    <ul class="nav pull-right">
        <li>
            <a href="{{ route('page.store',$data['store']->seo_url) }}">Close
                <span class="icon icon-close"></span>
            </a>
        </li>
    </ul>
  </div>
</nav>

<style type="text/css">
    .navbar2,.navbar2 a,.navbar2 span{color: #fff;font-size: 20px}

    .navbar2 a:focus, .navbar2 a:hover{
        background-color: #383838 !important;
    }
</style>

<div class="col-md-8 col-md-offset-2 coupon-popup-block well">
    <div class="col-md-12 text-center">
    @if($data['coupon']->code!='')
        <h3>Copy this code and use at <a href="{{ route('usecoupon',$data['coupon']->id) }}">{{ $data['store']->domain }}</a></h3>
        @else
        <h3>No coupon code needed, Visit the merchant {{ $data['store']->domain }} and save directly</h3>
        @endif
        
        <div class="col-md-12">
                <div class="well btn-group btn-group-lg" role="group" aria-label="Large button group">

                    <form class="form-inline navbar-form">
                        <div class="input-group input-group-lg">

                            @if($data['coupon']->code!='')
                            <input id="coupon-code" class="form-control btn btn-default coupon-code" type="text" value="{{ $data['coupon']->code }}">
                            <div class="input-group-btn">
                            <button type="button" class="btn btn-success copybtn" data-clipboard-action="copy" data-clipboard-target="#coupon-code">COPY</button>
                            </div>

                            @else
                            <div class="input-group-btn">
                            <button type="button" class="btn btn-default coupon-code">
                                OFFER ACTIVATED
                            </button>
                            </div>
                            @endif

                        </div>
                    </form>
                </div>

                <div class="col-md-12 text-center">
                    <a href="{{ route('usecoupon',$data['coupon']->id) }}" rel="nofollow" target="_blank" class="btn btn-success coupon-code">
                        Visit Store
                    </a>
                </div>


            @if(1==2)
            <div class="col-md-8 col-md-offset-2 well-sm">
                <div class="col-md-6 pull-left">
                    <div class="btn-group" role="group" aria-label="Large button group">
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-thumbs-up"></span>
                        </button>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-thumbs-down"></span>
                        </button>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </button>
                    </div>
                </div>


                <div class="col-md-12 text-center row">
                    <a href="{{ route('usecoupon',$data['coupon']->id) }}">
                        <button type="button" class="btn btn-warning">GO TO STORE</button>
                    </a>
                </div>
                
            </div>
            @endif

        </div>
    </div>

    <div class="col-md-12">
        <div class="row">        
            <div class="col-sm-3">
                <img src="{{ route('page.home') }}/images/store/220/{{ $data['store']->image_url }}" class="img-responsive center-block">                    
            </div>
            <div class="col-sm-9">
                <h4>{{ $data['coupon']->title }}</h4>
                <h5>
                @if($data['coupon']->code!='')
                <span class="label label-success">CODE</span>&nbsp;
                @else
                <span class="label label-danger">SALE</span>&nbsp;
                @endif

                @if($data['coupon']->expire_date > date('Y-m-d',strtotime(time())))
                <span class="glyphicon glyphicon-time"></span> {{ date('M d, Y',strtotime($data['coupon']->expire_date)) }}.
                @endif

                </h5>
                <p>{!! $data['coupon']->description !!}</p>
            </div>
        </div>
    </div>

    @if(1==2)
    <div class="col-md-12 text-center">
        <strong>Feedback</strong> <span class="glyphicon glyphicon-chevron-down"></span>
    </div>    
    @endif

    <div class="col-md-12">
        <h3>Never miss a deal from {{ $data['store']->title }}</h3>
        {{ Form::open(array('route' => 'email.store','class' => 'form-inline')) }}
            <div class="input-group input-group-lg">
                <input type="text" class="form-control email" name="email" size="50" placeholder="Email Address" required="">
                <div class="input-group-btn">
                    <input class="form-control" name="sid" type="hidden" value="{{ $data['store']->id }}">
                    {{ Form::submit('Subscribe', array('class' => 'btn btn-success')) }} 
                </div>
            </div>
        {{ Form::token() }}
        {{ Form::close() }}
        <h5>Your data will not be shared with others and you can unsubscribe any time</h5>
    </div>

</div>
<div class="clearfix"></div>

<style type="text/css">
    .coupon-popup-block>div:nth-child(1){
        border-bottom: 1px solid #cecece;
        padding-bottom: 30px;
    }
    .coupon-popup-block>div:nth-child(2){
        margin: 20px auto;
    }
    .coupon-popup-block>div:nth-child(3){
        border-top: 1px solid #cecece;
        padding: 15px 0;
    }
    .coupon-popup-block>div:nth-child(4){
        background-color: #fff
    }
    .coupon-popup-block .well{
        box-shadow: none;
        border: none;
    }
    body{background-color: #e7e7e7}
</style>

    <!-- 2. Include library -->
    <script src="{{ route('page.home') }}/assets/js/clipboard.min.js"></script>

    <!-- 3. Instantiate clipboard -->

    <script>
    var clipboard = new Clipboard('.copybtn');

    clipboard.on('success', function(e) {        
        $('.copybtn').html("COPIED");
        $('.copybtn').focus();
        setTimeout(function(){
          $('.copybtn').html("COPY");
        }, 2000);

    });

    clipboard.on('error', function(e) {
        console.log(e);
    });
    </script>

@endsection
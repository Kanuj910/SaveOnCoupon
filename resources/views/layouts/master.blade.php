<html lang="en">
<head>
    <title>@yield('meta_title')</title>
    <meta name="description" content="@yield('meta_description')" />
    <meta name="keywords" content="@yield('meta_keywords')"/>
    @yield('robots')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ URL('/') }}/favicon.ico" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="{{ URL('/') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL('/') }}/assets/style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=PT+Sans:400,700%7CMontserrat:400,700%7CPlayfair+Display:400,400i,700,700i,900,900i">
    <link href="{{ URL('/') }}/assets/css/jquery.ui.autocomplete.css" rel="stylesheet">
    <script async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script src="{{ URL('/') }}/assets/js/jquery.min.js"></script>
    <script src="{{ URL('/') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ URL('/') }}/assets/js/jquery-1.12.4.js"></script>
    <script src="{{ URL('/') }}/assets/js/jquery-ui.js"></script>
    

</head>

<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ URL('/') }}">
                    <img src="{{ URL('/') }}/images/logo1.svg" width="220" />
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="{{ URL('/') }}">Go to .com</a></li>
                    <li><a href="{{ route('page.stores') }}">Stores</a></li>
                    <li><a href="{{ route('page.categories') }}">Categories</a></li>
                    <li><a href="{{ URL('/') }}">Blog</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        {{ Form::open(array('route' => 'search.domain','class' => 'form-inline navbar-form')) }}
                            <div class="input-group">
                                <input type="text" id="idtitle" name="search_string" class="form-control ui-autocomplete-input" size="50" placeholder="Store Search" required="" autocomplete="off">
                                <div class="input-group-btn">
                                    {{ Form::submit('Search', array('class' => 'btn btn-info')) }}
                                </div>
                            </div>
                        {{ Form::token() }} {{ Form::close() }}
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('banner') @yield('popup')
    
        @yield('content')


         @if(isset($errors) && $errors->has('email'))
    <div class="well-sm pull-right notify notify-danger">
    <div>
        <h3 class="text-center text-danger">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </h3>
    </div>
    <div>
        <button type="button" class="close" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <strong>Erm... something went wrong</strong>
        <p>{{ $errors->first('email') }}</p>
    </div>
    </div>

    @elseif(Session::has('success'))
    <div class="well-sm pull-right notify notify-success">
    <div>
        <h3 class="text-center text-success">
            <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
        </h3>
    </div>
    <div>
        <button type="button" class="close" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <strong>Thank you for Subscribing</strong>
        <p>{{ Session::get('success') }}</p>
    </div>
    </div>
    
    @elseif(Session::has('warning'))
    <div class="well-sm pull-right notify notify-warning">
    <div>
        <h3 class="text-center text-warning">
            <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
        </h3>
    </div>
    <div>
        <button type="button" class="close" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <strong>Oops... something went wrong</strong>
        <p>{{ Session::get('warning') }}</p>
    </div>
    </div>
    @else

    @endif

    <footer>
        <div class="col-md-12 text-left">
            <div class="col-md-4 center-block text-responsive">
                <br />
                <p>VoucherToPay.co.uk is the subsidiary of CouponToPay.com based in the U.S. With its headquarters in Georgia, USA, VoucherToPay extends eCommerce services to shopaholics helping them enjoy the many benefits of shopping with awesome vouchers, discount codes, and deals.</p>
                <a href="{{ URL('/') }}">
                    <img src="{{ URL('/') }}/images/logo1.svg" width="300">
                </a>
            </div>
            <div class="col-md-2">
                <h4>VoucherToPay</h4>
                <ul class="list list-unstyled">
                    <li><a href="{{ route('page.about') }}">About Us</a></li>
                    <li><a href="{{ route('page.privacy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('page.terms') }}">Terms &amp; Conditions</a></li>
                    <li><a href="{{ route('page.faq') }}">FAQ</a></li>
                    <li><a href="{{ route('page.sitemap') }}">Sitemap</a></li>
                    <li><a href="{{ route('page.contact') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h4>We are Social</h4>
                <ul class="list list-unstyled">
                    <li><a href="" rel="nofollow" target="_blank">Facebook</a></li>
                    <li><a href="" rel="nofollow" target="_blank">Twitter</a></li>
                    <li><a href="" rel="nofollow" target="_blank">Google</a></li>
                    <li><a href="" rel="nofollow" target="_blank">Pinterest</a></li>
                    <li><a href="" rel="nofollow" target="_blank">Instagram</a></li>
                    <li><a href="" rel="nofollow" target="_blank">Youtube</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                {{ Form::open(array('route' => 'email.sitewide','class' => 'form-inline navbar-form')) }}
                <h4>Subscribe our Newsletters</h4>
                <div class="input-group input-group-lg">
                    <input type="text" name="email" class="form-control" size="50" placeholder="Enter your e-mail" required="">
                    <input class="form-control" name="did" type="hidden" value="4">
                    <div class="input-group-btn">
                        {{ Form::submit('Subscribe', array('class' => 'btn btn-info')) }}
                    </div>
                </div>
                <p>Your data will not be shared with others and you can unsubscribe any time</p>
                {{ Form::token() }} {{ Form::close() }}
            </div>
        </div>
        <div class="clearfix"></div>
        <br>
        <br>
        <p class="text-center">&copy; 2017 All Rights Reserved</p>
        <br>
        <br>
    </footer>
    <style type="text/css">
    footer {
        background-color: #2a2a30;
    }
    .navbar-default .navbar-nav>li>a{
        color: #fff;
    }
    
    .navbar-static-top {
        background: #764ebe;
        box-shadow: 0 3px 11px 5px rgba(0, 0, 0, 0.05);
        border-color: transparent;
    }
    
    .navbar-brand {}
    
    .list > li + li {
        margin-top: 10px;
    }
    
    .list-marked {
        position: relative;
    }
    
    .list-marked li:before {
        content: '\e080';
        display: inline-block;
        top: 0;
        left: -4px;
        font: 400 16px/24px 'Glyphicons Halflings';
        color: #fff;
    }
    
    footer h4 {
        font-weight: 600;
        color: #fff;
        margin: 25px 0
    }
    
    footer p {
        color: #b6b6b6;
    }
    
    body {
        max-width: 1350px;
        margin: auto
    }
    
    footer {
        margin-top: 50px;
    }
    
    .navbar {
        margin-bottom: 0
    }
    .offer-size{
        font-size: 3em !important;
    }
    .about-store p{text-align: justify;}
    .coupons h3 {
        color: #764ebe;
        line-height: 1.09091;
        font-size: 22px;
        margin-top: 0;
    }

    .coupons a {
        color: #764ebe;
    }

    .coupons h3:hover {
        color: #764ebe;
    }

    .label-info {
        background-color: #79d5ca;
        border-color: #79d5ca;
    }
    .ui-corner-all
        {
            -moz-border-radius: 4px 4px 4px 4px;
        }
       
        .ui-widget
        {
            font-family: Verdana,Arial,sans-serif;
            font-size: 15px;
        }
        .ui-menu
        {
            display: block;
            float: left;
            list-style: none outside none;
            margin: 0;
            padding: 2px;
        }
        .ui-autocomplete
        {
             overflow-x: hidden;
              max-height: 200px;
              width:1px;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            float: left;
            display: none;
            min-width: 160px;
            _width: 160px;
            padding: 4px 0;
            margin: 2px 0 0 0;
            list-style: none;
            background-color: #fff;
            border-color: #ccc;
            border-color: rgba(0, 0, 0, 0.2);
            border-style: solid;
            border-width: 1px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -webkit-background-clip: padding-box;
            -moz-background-clip: padding;
            background-clip: padding-box;
            *border-right-width: 2px;
            *border-bottom-width: 2px;
        }
        .ui-menu .ui-menu-item
        {
            clear: left;
            float: left;
            margin: 0;
            padding: 0;
            width: 100%;
        }
        .ui-menu .ui-menu-item a
        {
            display: block;
            padding: 3px 3px 3px 3px;
            text-decoration: none;
            cursor: pointer;
            background-color: #ffffff;
        }
        .ui-menu .ui-menu-item a:hover
        {
            display: block;
            padding: 3px 3px 3px 3px;
            text-decoration: none;
            color: White;
            cursor: pointer;
            background-color: #006699;
        }
        .ui-widget-content a
        {
            color: #222222;
        }
        footer a{
            color: #79d5ca !important;
        }


        .notify>div{float: left;}
    .notify>div:nth-child(1){width: 64px;height: 64px}

    .notify{
        box-shadow: 0 1.5px 4px rgba(0, 0, 0, 0.24), 0 1.5px 6px rgba(0, 0, 0, 0.12);
        border-left: 5px solid #4caf50;
        padding: 0;
        max-width: 350px;
    }
    .notify>div:nth-child(2){
        border-left: 1px solid #ddd;
        padding: 7px;
        position: relative;
    }
    .notify>div:nth-child(2)>span{
        position: absolute;
        top: 2px;right: 2px;
    }
    .notify p{
        margin: 0;
    }
    .notify h3{
        /*color: #4caf50;*/
        font-size: 26px;
    }

    .notify-danger{border-left: 5px solid #d9534f;}
    .notify-success{border-left: 5px solid #4caf50;}
    .notify-warning{border-left: 5px solid #8a6d3b;}

/*    body>div{position: relative;}*/

    .notify{display:block;position: fixed;top: 0;right: 0;background:white;margin-top:5px;margin-right: 5px;z-index: 9999}
    </style>

    <script type="text/javascript">
    $(document).ready(function() {
    $( ".notify" ).effect( 'slide', {direction:'right'}, 300, callback );
    $( ".notify .close" ).click(function(){$( ".notify" ).removeAttr( "style" )});

    function callback() {
        setTimeout(function() {
            $( ".notify" ).removeAttr( "style" ).hide().fadeIn();
            $( ".notify" ).hide();
        }, 7000 );
    };

    src = "{{ route('search.store.json') }}";
    $("#idtitle").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: src,
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        min_length: 3,
        select: function(event, ui) {
            $('#idtitle').val(ui.item.value);            
            location.href = "{{ route('page.home') }}/get/"+ui.item.url;
        },
        messages: {
            noResults: '',
            results: function() {}
        }
    }); 
});

$('.coupon-title').click(function(){
    var b = $(this).parent().parent().attr('data-couponid');
    window.open('{{ url('/coupon-code/') }}/'+b);
});
</script>

</body>

</html>
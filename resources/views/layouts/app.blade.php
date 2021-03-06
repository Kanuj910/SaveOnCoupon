<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VoucherToPay UK - Admin Panel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
         .navbar-static-top
        {
          background-color: #764ebe;  
        }
        
        .footerWrap {
        width: 100%;
        position: auto;
        bottom: 0px;
    }
    
    .footer {
        position: fixed;
        width: 400px;
        margin: auto;
    }
    
    .footerContent {
        float: left;
        width: 100%;
        background-color: #764ebe;
        padding: 20px 0;
    }
    
    .footer p {
        float: left;
        width: 100%;
        text-align: center;
    }
         ul li a.active {
            border-bottom: 3px solid #FFFFFF;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a style="color:#FFFFFF" class="navbar-brand" href="{{ url('/') }}">
                    VTP
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if(Auth::check())
                <ul class="nav navbar-nav">
                    <li><a class="{{ Request::segment(1) ==  'network' ? 'active' : ''  }}" style="color:#FFFFFF" href="{{ url('/network') }}">Network</a></li>
                    <li><a class="{{ Request::segment(1) ==  'category' ? 'active' : ''  }}" style="color:#FFFFFF" href="{{ url('/category') }}">Category</a></li>
                    <li><a class="{{ Request::segment(1) ==  'event' ? 'active' : ''  }}" style="color:#FFFFFF" href="{{ url('/event') }}">Event</a></li>
                    <li><a class="{{ Request::segment(1) ==  'store' ? 'active' : ''  }}" style="color:#FFFFFF" href="{{ url('/store') }}">Store</a></li>
                    <li><a class="{{ Request::segment(1) ==  'coupon' ? 'active' : ''  }}" style="color:#FFFFFF" href="{{ url('/coupon') }}">Coupon</a></li>
                    <li><a class="{{ Request::segment(1) ==  'seo' ? 'active' : ''  }}" style="color:#FFFFFF" href="{{ url('/seo') }}">SEO</a></li>
                    <li><a class="{{ Request::segment(1) ==  'front' ? 'active' : ''  }}" style="color:#FFFFFF" href="{{ url('/front') }}">Front</a></li>
                </ul>
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}" style="color:#FFFFFF">Login</a></li>
                        <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
                    @else
                        <li class="dropdown">
                            <a href="#" style="color:#FFFFFF" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>
   {{--  <script src="http://code.angularjs.org/1.4.8/angular.js"></script>
    <script src="http://code.angularjs.org/1.4.8/angular-resource.js"></script>
    <script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.11.0.js"></script> --}}
   {{--  <script src="https://code.angularjs.org/1.5.9/angular.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
     <div class="footerWrap">
        <div class="footerContent">
            <footer class="container-fluid text-center ">
                <p style="color:#FFFFFF">Copyright &copy; VoucherToPay</p>
            </footer>
        </div>
    </div>
</body>
</html>

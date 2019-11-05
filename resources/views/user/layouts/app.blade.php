<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <!-- Font awesome -->
    <link href="{{asset('/user/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('/user/css/bootstrap.css')}}" rel="stylesheet">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('/user/css/slick.css')}}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('/user/css/nouislider.css')}}">
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="{{asset('/user/css/jquery.fancybox.css')}}" type="text/css" media="screen" />
    <!-- Theme color -->
    <link id="switcher" href="{{asset('/user/css/theme-color/default-theme.css')}}" rel="stylesheet">

    <!-- Main style sheet -->
    <link href="{{asset('/user/css/style.css')}}" rel="stylesheet">


    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body class="aa-price-range">
      <!-- Start header section -->
      @include('user.partials.header')
      <!-- End header section -->
      <a class="scrollToTop" href="#"><i class="fa fa-angle-double-up"></i></a>
      <!-- END SCROLL TOP BUTTON -->


      <!-- Start menu section -->
      <section id="aa-menu-area">
        <nav class="navbar navbar-default main-navbar" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- LOGO -->
              <!-- Text based logo -->
              <a class="navbar-brand aa-logo" href="{{url('/')}}"> Rent <span>House</span></a>
              <!-- Image based logo -->
              <!-- <a class="navbar-brand aa-logo-img" href="index.html"><img src="img/logo.png" alt="logo"></a> -->
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul id="top-menu" class="nav navbar-nav navbar-right aa-main-nav">
                <li class="active"><a href="{{route('home')}}">HOME</a></li>
                <li><a href="contact.html">CONTACT</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
      </section>
      <!-- End menu section -->
    @yield('content')

  <!-- Footer -->
  <footer id="aa-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="aa-footer-area">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="aa-footer-left">
               <p>Copyright &copy; Rent House 2019</p>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="aa-footer-middle">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
              </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="aa-footer-right">
                <a href="{{url('/')}}">Home</a>
                <a href="#">Support</a>
                <a href="#">License</a>
                <a href="#">FAQ</a>
                <a href="#">Privacy & Term</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / Footer -->



  <!-- jQuery library -->
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" crossorigin="anonymous"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{asset('user/js/bootstrap.js')}}"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="{{asset('user/js/slick.js')}}"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{asset('user/js/nouislider.js')}}"></script>
   <!-- mixit slider -->
  <script type="text/javascript" src="{{asset('user/js/jquery.mixitup.js')}}"></script>
  <!-- Add fancyBox -->
  <script type="text/javascript" src="{{asset('user/js/jquery.fancybox.pack.js')}}"></script>
  <!-- Custom js -->
  <script src="{{asset('user/js/custom.js')}}"></script>
  @yield('script')

  </body>
</html>

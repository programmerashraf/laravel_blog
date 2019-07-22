<!doctype html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">

    <link rel="stylesheet" href="/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="/css/style.css">
    <style>
      pre {
    background: #333;
    padding: 1em;
    font-size: 90%;
    font-family: monospace;
    overflow-x: auto;
    clear: both;
    color: #dfdfdf;
    margin: 0 0 1em;
    border-radius: 2px;

}
.pre_text {
    background: #f3f3f3;
    color: #5f1111;
    padding: 1em 1.5em;
    clear: both;
    overflow: auto;
    margin: 2em 0;
    border-left: 2px solid #888;
    font-size: 95%;
    tab-size: 4;
    -moz-tab-size: 4;
    -o-tab-size: 4;
    border-radius: 0;
}
    </style>

  </head>
  <body>
    

    <div class="wrap">

      @include('layouts.header')
      <br>
      <!-- END header -->

      <!-- END section -->

      <section class="site-section py-sm">
        <div class="container">
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
                @yield("content")
            </div>

            <!-- END main-content -->

            @include("layouts.sidebar")
            <!-- END sidebar -->

          </div>
        </div>
      </section>
    
      @include('layouts.footer')
      <!-- END footer -->

    </div>
    
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/jquery-migrate-3.0.0.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/jquery.waypoints.min.js"></script>
    <script src="/js/jquery.stellar.min.js"></script>

    
    <script src="/js/main.js"></script>
  </body>
</html>
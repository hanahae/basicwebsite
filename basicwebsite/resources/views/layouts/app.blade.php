<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ICan</title>
    <link rel="stylesheet" href="/css/app.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.bundle.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
    <!--<script src="node_modules/chart.js/dist/Chart.bundle.min.js"></script>-->
  </head>
  <body>
    @include('inc.navbar')
    <br>
    <div class="container">
      <!--showcase just for home page-->
      @if(Request::is('/'))
        @include('inc.showcase')
      @endif
      @yield('content')
      <div class="row">
        <div class="col-md-8 col-lg-8">
          <!--message from input message at contact-->
          @include('inc.messages')
          <!--area where content can be set each page-->

        </div>
        <div class="col-md-4 col-lg-4">
        <!--  @include('inc.sidebar')-->
        </div>
      </div>
    </div>

    <footer id="footer" class="text-center">
      <p>Copyright 2017 &copy; Rainbow</p>
    </footer>
  </body>
</html>

<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Foundation | Welcome</title>
        <!--<link rel="stylesheet" href="{{ asset('css/foundation.css') }}" />-->

        <link media="all" type="text/css" rel="stylesheet" href="{{ asset ("assets/css/foundation.css")}}">
        <script src="{{ asset ("assets/js/vendor/modernizr.js")}}"></script>

    </head>

<body>

       <!-- Header and Nav -->

 
    <nav class="top-bar" data-topbar>
        <ul class="title-area">
            <li class="name">
                <h1><a href="/home"><< Back to Home</a></h1>
            </li>
        </ul>
    </nav>
 
    <!-- End Header and Nav -->

    @if (Session::has('message'))
        <div class="alert-box success">
        {{{Session::get('message')}}}
        </div>
    @endif 

    <div class="row">
        <div class="large-12">
            @yield('content')
        </div>
    </div>
 
 
    <!-- Footer -->
 
    <footer class="row">
        <div class="large-12 columns">
            <hr />
            <div class="row">
                <div class="large-6 columns">
                    <p>© Mad Labs Sdn Bhd</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset ("assets/js/vendor/jquery.js")}}"></script>
    <script src="{{ asset ("assets/js/foundation.min.js")}}"></script>
    <script src="{{ asset ("assets/js/app.js")}}"></script>

     
    <script>
      $(document).foundation();
    </script>
    </body>
</html>
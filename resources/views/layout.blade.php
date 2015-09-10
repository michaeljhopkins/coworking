<html>
    <head>
        @yield('head')

        <!-- Latest compiled and minified Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <div id="header-container" class="container">
          @include('inc/navbar')
          @yield('header')
        </div>

        <div id="main_container" class="container">
            @yield('content')
        </div>

        <div id="header-container" class="container">
          @include('inc/footer')
          @yield('footer')
        </div>

        <!-- Latest compiled and minified jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Latest compiled and minified Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        @yield('scripts')

    </body>
</html>


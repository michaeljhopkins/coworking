<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Dick Admin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('AdminLTE/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('AdminLTE/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('AdminLTE/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/main.css') }}" rel="stylesheet" type="text/css" />
    <!-- Pines Notify -->
    <link href="{{ asset('admin/js/vendor/pnotify/pnotify.custom.css') }}" rel="stylesheet" type="text/css" />

    @yield('head')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue layout-top-nav">

	@if (Auth::guest())
		{{-- <li><a href="{{ url('/auth/login') }}">Login</a></li>
		<li><a href="{{ url('/auth/register') }}">Register</a></li> --}}
	@else
		{{-- <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
			</ul>
		</li> --}}
	@endif



    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container-fluid">
          <div class="navbar-header">
            <a href="{{ url('') }}" class="navbar-brand"><b>Dick</b>Admin</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          @include('admin/inc/top_menu')

          </div><!-- /.container-fluid -->
        </nav>
      </header>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @yield('content-header')

        <!-- Main content -->
        <section class="content">

          @yield('content')

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
        {{-- TODO: populate this with the package version --}}
          <b>Version</b> 2.0
        </div>
        © 2014-2015. All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    @yield('footer')

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset('AdminLTE/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('AdminLTE/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('AdminLTE/plugins/slimScroll/jquery.slimScroll.min.js') }}" type="text/javascript"></script>
    <!-- Pines Notify -->
    <script src="{{ asset('admin/js/vendor/pnotify/pnotify.custom.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('AdminLTE/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE/dist/js/app.min.js') }}" type="text/javascript"></script>

    {{-- Bootstrap Notifications using Prologue Alerts --}}
    <script type="text/javascript">
    @foreach (Alert::getMessages() as $type => $messages)
        @foreach ($messages as $message)

            $(function(){
              new PNotify({
                // title: 'Regular Notice',
                text: "{{ $message }}",
                type: "{{ $type }}"
              });
            });

        @endforeach
    @endforeach
    </script>

    @yield('scripts')

  </body>
</html>

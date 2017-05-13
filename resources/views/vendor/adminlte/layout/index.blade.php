<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('ely.base.title') }} | @yield('title')</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="description" content="{{ config('ely.base.description') }}"> 

  @yield('before_styles')
  {!! Html::style('vendor/adminlte/bootstrap/css/bootstrap.min.css') !!}
  {!! Html::style('vendor/clinica/font-awesome/css/font-awesome.min.css') !!}
  {!! Html::style('vendor/adminlte/dist/css/AdminLTE.min.css') !!}
  {!! Html::style('vendor/adminlte/dist/css/skins/_all-skins.min.css') !!}
  @yield('after_styles')

</head>
<body class="hold-transition {{ config('ely.base.theme') }} sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">{{ config('ely.base.title') }}</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{ config('ely.base.app_title') }}</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
           @section('messages')
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{ asset('vendor/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          @show
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('vendor/adminlte/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->username }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('vendor/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->username }}
                  <small>{{ Auth::user()->created_at }}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!--li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                </.>
              </li-->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('/perfil') }}" class="btn btn-default btn-flat">MI PERFIL</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('logout') }}" class="btn btn-default btn-flat">SALIR</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('vendor/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Usuario</p> 
          <a><i class="fa fa-circle text-success"></i> Nivel</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        @include('adminlte::layout.menu')
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title-page', 'pagina en blanco')
        <small>@yield('description-page', 'sin descripcion')</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> {{ config('ely.base.version')}}
    </div>
    <strong>Copyright &copy; 2016 <a href="{{ config('ely.base.developer_link') }}"></a>{{ config('ely.base.developer_name') }}.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

@yield('before_scripts')
{!! Html::script('vendor/adminlte/plugins/jQuery/jquery-2.2.3.min.js')!!}
{!! Html::script('vendor/adminlte/bootstrap/js/bootstrap.min.js')!!}
{!! Html::script('vendor/adminlte/plugins/slimScroll/jquery.slimscroll.min.js')!!}
{!! Html::script('vendor/adminlte/plugins/fastclick/fastclick.js')!!}
{!! Html::script('vendor/adminlte/dist/js/app.min.js')!!}
{!! Html::script('vendor/adminlte/dist/js/demo.js')!!}
@yield('after_scripts')
</body>
</html>

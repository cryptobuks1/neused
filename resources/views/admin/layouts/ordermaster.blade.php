<!DOCTYPE html>
@php
$g = App\Genral::first();
@endphp
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') {{ $title }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicon -->
  <link rel="icon" href="{{url('images/genral/'.$fevicon)}}" type="image/gif" sizes="16x16">
  <!-- Google fonts -->
  <link rel="stylesheet"
    href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Animation CSS -->
  <link rel="stylesheet" type="text/css" href="{{ url('css/vendor/animate.min.css') }}">
  <!-- Select2 CSS -->
  <link rel="stylesheet" href="{{ url('css/vendor/select2.min.css') }}">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{url('admin/vendor/dist/css/adminboot3.css')}}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('admin/vendor/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{ url('admin/vendor/icon-font/icon-font.min.css') }}">
  <!-- Custom alert -->
  <link rel="stylesheet" href="{{ url('css/vendor/alert.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('admin/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('admin/vendor/dist/css/adminlte.min.css')}}">
  <!-- AdminLTE Skins-->
  <link rel="stylesheet" href="{{url('admin/vendor/dist/css/skins/_all-skins.min.css')}}">
  <!--Datepicker-->
  <link rel="stylesheet" href="{{ url('css/vendor/datepicker.css') }}">
  <!-- Preloadrer Pace -->
  <link rel="stylesheet" href="{{ url('css/vendor/pace.min.css') }}">
  <!-- Fontawesome-->
  <link rel="stylesheet" href="{{ url('css/vendor/fontawesome-iconpicker.min.css') }}">
  <!-- Toggle CSS-->
  <link rel="stylesheet" href="{{ url('css/vendor/toggle.css') }}">
  <!-- Default Stylesheet -->
  <link rel="stylesheet" href="{{ url('admin/css/style.css') }}">
  <!-- TinyMCE Editor -->
  <script src="{{ url('admin/plugins/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
  @yield('stylesheet')
  <!-- jQuery v3.5.4 -->
  <script src="{{ url('js/jquery.js') }}"></script>
  <!-- PNotify -->
  <script src="{{ url('front/vendor/js/PNotify.js') }}"></script>
  <script src="{{url('front/vendor/js/PNotifyAnimate.js')}}"></script>
  <script src="{{url('front/vendor/js/PNotifyCallbacks.js')}}"></script>
  <script src="{{url('front/vendor/js/PNotifyButtons.js')}}"></script>
  <script src="{{url('front/vendor/js/PNotifyNonBlock.js')}}"></script>
  <script src="{{url('front/vendor/js/PNotifyMobile.js')}}"></script>
  <script src="{{url('front/vendor/js/PNotifyHistory.js')}}"></script>
  <script src="{{url('front/vendor/js/PNotifyDesktop.js')}}"></script>
  <script src="{{url('front/vendor/js/PNotifyConfirm.js')}}"></script>
  <script src="{{url('front/vendor/js/PNotifyStyleMaterial.js')}}"></script>
  <script src="{{url('front/vendor/js/PNotifyReference.js')}}"></script>
  <!-- Sweetalert -->
  <script src="{{ url('front/vendor/js/sweetalert.min.js') }}"></script>
  <script>
    var addedmsg = "<?=Session::get('added')?>";
    var updatedmsg = "<?=Session::get('updated')?>";
    var deletedmsg = "<?=Session::get('deleted')?>";
    var warningmsg = "<?=Session::get('warning')?>";
  </script>
  <!-- Custom alert -->
  <script src="{{ url('js/alert.js') }}"></script>

</head>

<body class="hold-transition fixed skin-blue sidebar-mini pace-done">

  <div class="pace  pace-inactive">
    <div class="transform-custom pace-progress" data-progress-text="100%" data-progress="99">
      <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div>
  </div>

  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
          <img title="{{ config('app.name') }}" width="20px"
            src="{{ url('images/genral/'.$genrals_settings->fevicon) }}" alt="" />
        </span>

        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"> <img title="{{ config('app.name') }}" width="20px"
            src="{{ url('images/genral/'.$genrals_settings->fevicon) }}" alt="" />
          {{$genrals_settings->project_name}}</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="m-15">

              <select class="langdropdown2 form-control" onchange="changeLang()" id="changed_lng">
                @foreach(\DB::table('locales')->where('status','=',1)->get() as $lang)
                <option {{ Session::get('changed_language') == $lang->lang_code ? "selected" : ""}}
                  value="{{ $lang->lang_code }}">{{ $lang->name }}</option>
                @endforeach
              </select>
            </li>

            @php
            $userimage = @file_get_contents('images/user/'.Auth::user()->image);
            @endphp

            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img
                  src="@auth @if($userimage){{url('images/user/'.Auth::user()->image)}} @else {{ Avatar::create(Auth::user()->name)->toBase64() }} @endif"
                  class="img-circle" alt="User Image" width="22px"> <span class="hidden-xs">Hi !
                  {{ Auth::user()->name }} @endauth</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  @if($userimage)
                  <img src="{{url('images/user/'.Auth::user()->image)}}" class="img-circle" alt="User Image">
                  @else
                  <img class="img-circle" title="{{ Auth::user()->name }}"
                    src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
                  @endif
                  <p>
                    @auth {{ Auth::user()->name }} @endauth
                    <small>Member Since: {{ date('M jS Y',strtotime(Auth::user()->created_at)) }}</small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="{{ route('get.profile') }}" class="btn btn-default btn-flat">Edit Profile</a>
                  </div>
                  <div class="pull-right">
                    <a class="btn btn-default btn-flat" onclick="sellerlogout()" role="button">
                      {{ __('Sign out') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      class="sellerlogout display-none">
                      {{ csrf_field() }}
                    </form>
                  </div>
                </li>
              </ul>
            </li>
            <li><a class="pointer dropdown-item" onclick="sellerlogout()">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="sellerlogout display-none">
                {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            @if($userimage)
            <img src="{{url('images/user/'.$Uimage->image)}}" class="img-circle" alt="User Image">
            @else
            <img class="img-circle" title="{{ Auth::user()->name }}"
              src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
            @endif
          </div>
          <div class="pull-left info">
            <p>@auth {{ Auth::user()->name }} @endauth</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

              <li class="{{ Nav::isResource('order') }}">
                <a href="{{url('seller/orders')}} "><i class="fa fa-circle-o" aria-hidden="true"></i>
                  <span>Orders</span> </a>
              </li>

              <li class="{{ Nav::isRoute('seller.canceled.orders') }}">
                <a href="{{ route('seller.canceled.orders') }}"><i class="fa fa-circle-o"></i> Cancelled Orders</a>
              </li>

              <li class="{{ Nav::isRoute('seller.return.orders') }}">
                <a href="{{ route('seller.return.orders') }}"><i class="fa fa-circle-o"></i> Returned Orders</a>
              </li>

          <li class="{{ Nav::isRoute('seller.shipping.info') }}"><a href="{{ route('seller.shipping.info') }}"><i
                class="fa fa-cubes" aria-hidden="true"></i> <span>Shipping Information</span></a></li>

        </ul>
        @php $vender = App\Genral::first(); @endphp
        @if($vender->cod=='vendor' || $vender->cod=='both')
        <li><a href="{{url('vender/cod')}} "><i class="fa fa-circle"></i> Cod Payment Setting </a></li>
        @endif
        </ul>
        </li>
      </section> <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="row tile_count">
              @if($errors->any())
              <div class="alert alert-danger">
                <ul>

                  @foreach($errors->all() as $error)

                  <li>
                    <h5>{{$error}}</h5>
                  </li>

                  @endforeach
                </ul>
              </div>


              @endif

              @if (Session::has('added'))
              <script>
                success();
              </script>
              @elseif (Session::has('updated'))
              <script>
                update();
              </script>
              @elseif (Session::has('deleted'))
              <script>
                deleted();
              </script>

              @elseif (Session::has('warning'))
              <script>
                warning();
              </script>

              @endif


              @yield('body')


              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">

      </div>
      <strong>&copy; {{ date('Y') }} | {{ config('app.name') }} | {{$Copyright}}</strong>
      <span class="pull-right"><b>v {{ config('app.version') }}</b></span>
    </footer>

    <div class="control-sidebar-bg">

    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="{{url('admin/vendor/dist/js/adminboot3.js')}}"></script>
  <!-- Colorpicker JS -->
  <script src="{{ url('admin/vendor/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
  <!-- jQuery UI JS -->
  <script src="{{ url('admin/vendor/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- plUpload JS -->
  <script src="{{ url('front/vendor/js/plupload.full.min.js') }}"></script>
  <script src="{{ url('front/vendor/js/jquery.ui.plupload.js') }}"></script>

  <!-- Fontawesome iconpicker -->
  <script src="{{ url('front/vendor/js/fontawesome-iconpicker.js') }}"></script>
  <!-- Select2 JS -->
  <script src="{{ url('front/vendor/js/select2.min.js') }}"></script>
  <!-- Moment JS -->
  <script src="{{ url('front/vendor/js/moment-with-locales.js') }}"></script>
  <!-- Datepicker JS -->
  <script src="{{ url('front/vendor/js/datepicker.js') }}"></script>
  <!-- DataTables -->
  <script src="{{asset('front/vendor/js/datatables.min.js')}}" type="text/javascript"></script>
  <!-- SlimScroll -->
  <script src="{{url('admin/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{url('admin/vendor/fastclick/lib/fastclick.js')}}"></script>
  <!-- AdminLTE JS -->
  <script src="{{url('admin/vendor/dist/js/adminlte.min.js')}}"></script>

  <script src="{{ url('admin/plugins/pace/pace.min.js') }}"></script>
  <script>
    var brandindexurl = "<?= route('brand.index') ?>";
    var cityindex = "<?= route('city.index') ?>";
    var countyindex = "<?= route('country.index') ?>";
    var baseUrl = "<?= url('/') ?>";
  </script>
  <!-- Default Seller js -->
  <script src="{{ url('js/seller.js') }}"></script>
  @yield('custom-script')
</body>

</html>
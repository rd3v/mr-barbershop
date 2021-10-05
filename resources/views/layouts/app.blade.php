<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
  <meta name="description" content="{{ config('app.name', 'Laravel') }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">  

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="{{ asset('themes/dashboard/v1/assets/images/logo.png')}}">
  <meta name="apple-mobile-web-app-title" content="{{ config('app.name', 'Laravel') }}">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="{{ asset('themes/dashboard/v1/assets/images/logo.png')}}">
  
  @yield('css')

  @yield('style')
</head>
<body>
  <div class="app" id="app">

<!-- ############ LAYOUT START-->

  <!-- aside -->
  <div id="aside" class="app-aside modal fade md nav-expand">
    <div class="left navside indigo-900 dk" layout="column">
      <div class="navbar navbar-md no-radius">
        <!-- brand -->
        <a class="navbar-brand">
            <div ui-include="{{ asset('themes/dashboard/v1/assets/images/logo.svg') }}"></div>
            <img src="{{ asset('themes/dashboard/v1/assets/images/logo.png') }}" alt="." class="hide">
            <span class="hidden-folded inline">{{ config('app.name', 'Laravel') }}</span>
        </a>
        <!-- / brand -->
      </div>
      <div flex class="hide-scroll">
        <nav class="scroll nav-active-primary">
          
            <ul class="nav" ui-nav>
              <li class="nav-header hidden-folded">
                <small class="text-muted">Main</small>
              </li>
              
              <li id="dashboard">
                <a href="{{ url('/dashboard') }}">
                  <span class="nav-icon">
                    <i class="material-icons">&#xe3fc;
                      <span ui-include="{{ asset('themes/dashboard/v1/assets/images/i_0.svg') }}"></span>
                    </i>
                  </span>
                  <span class="nav-text">Dashboard</span>
                </a>
              </li>

              <li id="data-kapster">
                <a href="{{ url('/data-kapster') }}" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe7ef;
                      <span ui-include="{{ asset('themes/dashboard/v1/assets/images/i_0.svg') }}"></span>
                    </i>
                  </span>
                  <span class="nav-text">Data Kapster</span>
                </a>
              </li>              
          
              <li id="data-pelanggan">
                <a href="{{ url('/data-pelanggan') }}">
                  <span class="nav-icon">
                    <i class="material-icons">&#xe7ef;
                      <span ui-include="{{ asset('themes/dashboard/v1/assets/images/i_0.svg') }}"></span>
                    </i>
                  </span>
                  <span class="nav-text">Data Pelanggan</span>
                </a>
              </li>
          
              <li id="data-layanan">
                <a href="{{ url('/data-layanan') }}" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe14e;
                      <span ui-include="{{ asset('themes/dashboard/v1/assets/images/i_0.svg') }}"></span>
                    </i>
                  </span>
                  <span class="nav-text">Data Layanan</span>
                </a>
              </li>
          
              <li id="data-booking">
                <a href="{{ url('/data-booking') }}" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe636;
                      <span ui-include="{{ asset('themes/dashboard/v1/assets/images/i_0.svg') }}"></span>
                    </i>
                  </span>
                  <span class="nav-text">Data Booking</span>
                </a>
              </li>
          
              <li id="data-informasi">
                <a href="{{ url('/data-informasi') }}" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe88f;
                      <span ui-include="{{ asset('themes/dashboard/v1/assets/images/i_0.svg') }}"></span>
                    </i>
                  </span>
                  <span class="nav-text">Data Informasi</span>
                </a>
              </li>
          
              <li id="data-laporan">
                <a href="{{ url('/data-laporan') }}" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe85d;
                      <span ui-include="{{ asset('themes/dashboard/v1/assets/images/i_0.svg') }}"></span>
                    </i>
                  </span>
                  <span class="nav-text">Laporan</span>
                </a>
              </li>
                    
            </ul>
        </nav>
      </div>
      <div flex-no-shrink>
        <div ui-include="{{ asset('themes/dashboard/v1/views/blocks/aside.bottom.0.html') }}"></div>
      </div>
    </div>
  </div>
  <!-- / aside -->
  
  <!-- content -->
  <div id="content" class="app-content box-shadow-z0" role="main">
    <div class="app-header white box-shadow navbar-md">
        <div class="navbar">
            <!-- Open side - Naviation on mobile -->
            <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up">
              <i class="material-icons">&#xe5d2;</i>
            </a>
            <!-- / -->
        
            <!-- Page title - Bind to $state's title -->
            <div class="navbar-item pull-left h5" ng-bind="$state.current.data.title" id="pageTitle"></div>
        
            <!-- navbar right -->

            <ul class="nav navbar-nav pull-right">
              <li class="nav-item dropdown pos-stc-xs">
                <a class="nav-link" href="" data-toggle="dropdown">
                  <i class="material-icons"></i>
                  <span class="label label-sm up warn">3</span>
                </a>
                <div class="dropdown-menu pull-right w-xl animated fadeInUp no-bg no-border no-shadow"><div class="scrollable" style="max-height: 220px">
                  <ul class="list-group list-group-gap m-a-0">
                    
                    <li class="list-group-item black lt box-shadow-z0 b"><span class="pull-left m-r"><img src="{{ asset('themes/dashboard/v1/assets/images/a0.jpg') }}" alt="..." class="w-40 img-circle"></span> <span class="clear block">Use awesome <a href="" class="text-primary">animate.css</a><br><small class="text-muted">10 minutes ago</small></span></li>
                    
                    <li class="list-group-item black lt box-shadow-z0 b"><span class="pull-left m-r"><img src="{{ asset('themes/dashboard/v1/assets/images/a1.jpg') }}" alt="..." class="w-40 img-circle"></span> <span class="clear block"><a href="" class="text-primary">Joe</a> Added you as friend<br><small class="text-muted">2 hours ago</small></span></li>
                    
                    <li class="list-group-item dark-white text-color box-shadow-z0 b"><span class="pull-left m-r"><img src="{{ asset('themes/dashboard/v1/assets/images/a2.jpg') }}" alt="..." class="w-40 img-circle"></span> <span class="clear block"><a href="" class="text-primary">Danie</a> sent you a message<br><small class="text-muted">1 day ago</small></span>
                    </li>

                  </ul>
                </div>
              </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link clear" href="" data-toggle="dropdown" aria-expanded="false">
                  <span class="avatar w-32">
                    <img src="{{ asset('themes/dashboard/v1/assets/images/a0.jpg') }}" alt="...">
                    <i class="on b-white bottom"></i>
                  </span>
                </a>
                <div class="dropdown-menu pull-right dropdown-menu-scale"><a class="dropdown-item" ui-sref="app.inbox.list"><span>Inbox</span> <span class="label warn m-l-xs">3</span></a> <a class="dropdown-item" ui-sref="app.page.profile"><span>Profile</span></a> <a class="dropdown-item" ui-sref="app.page.setting"><span>Settings</span> <span class="label primary m-l-xs">3/9</span></a><div class="dropdown-divider"></div><a class="dropdown-item" ui-sref="app.docs">Need help?</a> 
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>                
              </div>
              </li>

              <li class="nav-item hidden-md-up">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
                  <i class="material-icons"></i>
                </a>
              </li>
            </ul>

            <!-- / navbar right -->
        
            <!-- navbar collapse -->
            <div class="collapse navbar-toggleable-sm" id="collapse">
              <div ui-include="'../views/blocks/navbar.form.right.html'"></div>
              <!-- link and dropdown -->
              <ul class="nav navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link" href data-toggle="dropdown">
                    <i class="fa fa-fw fa-plus text-muted"></i>
                    <span>Tambah Antrian</span>
                  </a>
                  <div ui-include="'../views/blocks/dropdown.new.html'"></div>
                </li>
              </ul>
              <!-- / -->
            </div>
            <!-- / navbar collapse -->
        </div>
    </div>

    <div class="app-footer">
      <div class="p-a text-xs">
        <div class="pull-right text-muted">
          &copy; Copyright <strong>Flatkit</strong> <span class="hidden-xs-down">- Built with Love v1.1.3</span>
          <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
        </div>
        <div class="nav">
          <a class="nav-link" href="#"></a>
          <span class="text-muted">-</span>
        </div>
      </div>
    </div>
    <div ui-view class="app-body" id="view">

    @yield('content')

    </div>
  </div>
  <!-- / -->

<!-- ############ LAYOUT END-->

  </div>
@yield('js')

@yield('script')
</body>
</html>
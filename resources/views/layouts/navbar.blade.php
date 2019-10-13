<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link href="{!! asset('theme/assets/img/brand/favicon.png') !!}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{!! asset('theme/assets/vendor/nucleo/css/nucleo.css')!!}" rel="stylesheet">
    <link href="{!! asset('theme/assets/vendor/font-awesome/css/font-awesome.min.css')!!}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{!! asset('theme/assets/css/argon.css')!!}" rel="stylesheet">
    <!-- Docs CSS -->
    <link type="text/css" href="{!! asset('theme/assets/css/docs.min.css')!!}" rel="stylesheet">
</head>

<body>
    {{-- NAVBAR --}}
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
      <div class="container">
      <a class="navbar-brand mr-lg-5" href="{{route('home')}}">
            {{-- Logo --}}
          <img src="{!! asset('theme/assets/img/brand/white.png')!!}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                  {{-- Need ATTENTION --}}
                <a href="../index.html">
                    {{-- Ganti --}}
                  <img src="{!! asset('theme/assets/img/brand/blue.png')!!}">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
            <li class="nav-item dropdown">
              <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                <i class="ni ni-ui-04 d-lg-none"></i>
                <span class="nav-link-inner--text">Components</span>
              </a>
              <div class="dropdown-menu dropdown-menu-xl">
                <div class="dropdown-menu-inner">
                  <a href="https://demos.creative-tim.com/argon-design-system/docs/getting-started/overview.html" class="media d-flex align-items-center">
                    <div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
                      <i class="ni ni-spaceship"></i>
                    </div>
                    <div class="media-body ml-3">
                      <h6 class="heading text-primary mb-md-1">Getting started</h6>
                      <p class="description d-none d-md-inline-block mb-0">Learn how to use Argon compiling Scss, change brand colors and more.</p>
                    </div>
                  </a>
                  <a href="https://demos.creative-tim.com/argon-design-system/docs/foundation/colors.html" class="media d-flex align-items-center">
                    <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                      <i class="ni ni-palette"></i>
                    </div>
                    <div class="media-body ml-3">
                      <h6 class="heading text-primary mb-md-1">Foundation</h6>
                      <p class="description d-none d-md-inline-block mb-0">Learn more about colors, typography, icons and the grid system we used for Argon.</p>
                    </div>
                  </a>
                  <a href="https://demos.creative-tim.com/argon-design-system/docs/components/alerts.html" class="media d-flex align-items-center">
                    <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                      <i class="ni ni-ui-04"></i>
                    </div>
                    <div class="media-body ml-3">
                      <h5 class="heading text-warning mb-md-1">Components</h5>
                      <p class="description d-none d-md-inline-block mb-0">Browse our 50 beautiful handcrafted components offered in the Free version.</p>
                    </div>
                  </a>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown" href="{{ route('login')}}" role="button">
                <i class="ni ni-collection d-lg-none"></i>
                <span class="nav-link-inner--text">Beranda</span>
              </a>
              <div class="dropdown-menu">
                <a href="{{ route('sprint')}}" class="dropdown-item">Lihat Daftar Sprint</a>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="https://www.facebook.com/creativetim" target="_blank" data-toggle="tooltip" title="Like us on Facebook">
                <i class="fa fa-facebook-square"></i>
                <span class="nav-link-inner--text d-lg-none">Facebook</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="https://www.instagram.com/creativetimofficial" target="_blank" data-toggle="tooltip" title="Follow us on Instagram">
                <i class="fa fa-instagram"></i>
                <span class="nav-link-inner--text d-lg-none">Instagram</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="https://twitter.com/creativetim" target="_blank" data-toggle="tooltip" title="Follow us on Twitter">
                <i class="fa fa-twitter-square"></i>
                <span class="nav-link-inner--text d-lg-none">Twitter</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="https://github.com/creativetimofficial/argon-design-system" target="_blank" data-toggle="tooltip" title="Star us on Github">
                <i class="fa fa-github"></i>
                <span class="nav-link-inner--text d-lg-none">Github</span>
              </a>
            </li>

            @guest
            <li class="nav-item d-none d-lg-block ml-lg-4">
            <a href="{{route('register')}}" class="btn btn-primary btn-icon">
                <span class="btn-inner--icon">
                </span>
                <span class="nav-link-inner--text">Register</span>
              </a>
            <a href="{{route('login')}}" class="btn btn-primary btn-icon">
                <span class="btn-inner--icon">
                </span>
                <span class="nav-link-inner--text">Login</span>
              </a>
            </li>
            @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
          @endguest
          </ul>
        </div>
      </div>
    </nav>

    <section>
            @yield('content')
    </section>

    <script src="{!! asset('theme/assets/vendor/jquery/jquery.min.js')!!}"></script>
    <script src="{!! asset('theme/assets/vendor/popper/popper.min.js')!!}"></script>
    <script src="{!! asset('theme/assets/vendor/bootstrap/bootstrap.min.js')!!}"></script>
    <script src="{!! asset('theme/assets/vendor/headroom/headroom.min.js')!!}"></script>
    <script src="{!! asset('theme/assets/js/argon.js')!!}"></script>
</body>
</html>
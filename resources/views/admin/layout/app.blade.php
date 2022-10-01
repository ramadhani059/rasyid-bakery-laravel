<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ $pageTitle }}</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('img/logo/Favicon.png') }}" type="image/png">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('css/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('css/argon.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
</head>

<body>
    @php
        $route = Route::currentRouteName();
    @endphp
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{ asset('img/logo/logo.png' )}}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link @if($route == 'product.index') active @endif" href="{{ route('product.index') }}">
                <i class="ni ni-cart text-brown @if($route == 'product.index') active @endif"></i>
                <span class="nav-link-text text-brown @if($route == 'product.index') active @endif">Product</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if($route == 'category.index') active @endif" href="{{ route('category.index') }}">
                <i class="ni ni-tag text-brown @if($route == 'category.index') active @endif"></i>
                <span class="nav-link-text text-brown @if($route == 'category.index') active @endif">Category</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if($route == 'message.index') active @endif" href="{{ route('message.index') }}">
                <i class="ni ni-email-83 text-brown @if($route == 'message.index') active @endif"></i>
                <span class="nav-link-text text-brown @if($route == 'message.index') active @endif">Message</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if($route == 'user.index') active @endif" href="{{ route('user.index') }}">
                <i class="ni ni-single-02 text-brown @if($route == 'user.index') active @endif"></i>
                <span class="nav-link-text text-brown @if($route == 'user.index') active @endif">User</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-brown border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    @if ( Auth::user()->img_user_encrypted != null)
                        <img src="{{ asset('storage/image/user/'.Auth::user()->img_user_encrypted) }}" class="rounded-circle">
                    @else
                        <img alt="Image placeholder" src="{{ asset('img/profile/akun_kosong.png') }}">
                    @endif
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="{{ route('profile.edit', ['profile' => Auth::user()->id]) }}" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    @yield('content')
    <!-- Footer -->
    <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted text-brown">
              &copy; 2022 <a href="#" class="text-brown ml-1">Rasyid Bakery</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="#" class="nav-link">Rasyid Bakery</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">About Us</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">Blog</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  @include('sweetalert::alert')
  <script src="{{ asset('css/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('css/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('css/vendor/js-cookie/js.cookie.js' )}}"></script>
  <script src="{{ asset('css/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('css/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('js/argon.js')}}"></script>
</body>

</html>

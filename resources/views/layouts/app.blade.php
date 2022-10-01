<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  @yield('title')
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('img/logo/Favicon.png') }}" type="image/png">
  <!-- CSS Custom -->
  @yield('css-custom')
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('css/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('css/argon.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
</head>

<body class="bg-dark-brown">
    @php
        $route = Route::currentRouteName();
    @endphp
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-brown navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home')}}">
        <img src="{{ asset('img/logo/logo-putih.png') }}">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="{{ route('home')}}">
                <img src="{{ asset('img/logo/logo.png') }}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="{{ route('home')}}" class="nav-link">
              <span class="nav-link-inner--text">Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('produk')}}" class="nav-link">
              <span class="nav-link-inner--text">Product</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('contact.index')}}" class="nav-link">
              <span class="nav-link-inner--text">Contact</span>
            </a>
          </li>
        </ul>
        <hr class="d-lg-none" />
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" data-original-title="Like us on Facebook">
              <i class="fab fa-facebook-square"></i>
              <span class="nav-link-inner--text d-lg-none">Facebook</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Instagram">
              <i class="fab fa-instagram"></i>
              <span class="nav-link-inner--text d-lg-none">Instagram</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Twitter">
              <i class="fab fa-twitter-square"></i>
              <span class="nav-link-inner--text d-lg-none">Twitter</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" data-original-title="Star us on Github">
              <i class="fab fa-github"></i>
              <span class="nav-link-inner--text d-lg-none">Github</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- Navbar -->
    @yield('content')
    <!-- Footer -->
  <footer class="py-5 bg-dark-brown" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted text-brown">
            &copy; 2022 <a href="#" class="fw-bold ml-1 text-brown" target="_blank">Creative Tim</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
                <a href="#" class="nav-link text-brown">Rasyid Bakery</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-brown">About Us</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-brown">Blog</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-brown">MIT License</a>
              </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
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
  <script src="{{ mix('js/app.js')}}"></script>
</body>

</html>

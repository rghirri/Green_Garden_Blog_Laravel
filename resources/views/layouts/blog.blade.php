<!DOCTYPE html>
<html lang="en">
<!-- css, styling and favicon files -->

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap-5.0.1/css/bootstrap.min.css') }}" />
  <link href="{{ asset('vendor/fontawesome/css/all.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('vendor/css/normalize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
  <title>@yield('title')</title>
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('uploads/favicon/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('uploads/favicon/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/favicon/favicon-16x16.png') }}">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <script defer src="{{ asset('vendor/fontawesome/js/all.js') }}"></script>
</head>

<body>

  <!-- Navbar Links Start  -->
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('welcome') }}"><img id="nav-logo"
          src="{{ asset('uploads/Green-Garden-Logo-130x130.png') }}" alt="Green Garden Blog Logo" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav text-uppercase">
          @guest
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ route('login') }}">Login</a>
          </li>

          @else
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/contact.php">contact</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('login') }}"><button class="btn text-uppercase">{{ __('Admin') }}</button></a>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  @yield('header')

  @yield('content')

  <!-- Footer Start -->
  <footer class="container-fluid">
    <!-- footer nav-links begin -->
    <div class="footer-nav container pt-5 d-flex flex-column">
      <a href="{{ route('welcome') }}"><img class="footer-nav__logo"
          src="{{ asset('uploads/Green-Garden-logo-100x100.png') }}" alt="Green Garden Blog Logo" /></a>
      <ul class="footer-nav__lists m-auto">
        <li class=" footer-nav__list">
          <a class="footer-nav__link" aria-current="page" href="{{ route('welcome') }}">home</a>
        </li>
        <li class="footer-nav__list">
          <a class="footer-nav__link" href="{{ route('login') }}">login</a>
        </li>
        <!-- ------------------------------ -->
      </ul>
      <p class="footer-nav__copy mt-5">Copyright &copy; {{ date('Y') }} Green Garden Blog. All rights reserved.</p>
      <p class="footer-nav__theme">Theme Created By Rayaa Ghirri</p>
    </div>
  </footer>
  <!-- Footer End -->
  <!-- javascript files -->
  <script src="{{ asset('vendor/js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap-5.0.1/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>

  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e7cbd6cde8cf112"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<!-- css, styling and favicon files -->

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap-5.0.1/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/css/normalize.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/css/jquery.datetimepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
  <title>@yield('title')</title>
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('uploads/favicon/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('uploads/favicon/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/favicon/favicon-16x16.png') }}">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
</head>

<body>

  <!-- Navbar Links Start  -->
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><img id="nav-logo" src="{{ asset('uploads/Green-Garden-Logo-130x130.png') }}"
          alt="Green Garden Blog Logo" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav text-uppercase">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/contact.php">contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}"><button class="btn text-uppercase">log in</button></a>
          </li>
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
      <a href="/"><img class="footer-nav__logo" src="{{ asset('uploads/Green-Garden-logo-100x100.png') }}"
          alt="Green Garden Blog Logo" /></a>
      <ul class="footer-nav__lists m-auto">
        <li class=" footer-nav__list">
          <a class="footer-nav__link" aria-current="page" href="/">home</a>
        </li>
        <!-- <li class="footer-nav__list">
          <a class="footer-nav__link" href="#">contact</a>
        </li> -->
        <li class="footer-nav__list">
          <a class="footer-nav__link" href="/login.php">login</a>
        </li>
        <!-- ------------------------------ -->
      </ul>
      <p class="footer-nav__copy mt-5">Copyright &copy; 2021 Green Garden Blog. All rights reserved</p>
    </div>
  </footer>
  <!-- Footer End -->
</body>
<!-- javascript files -->
<script src="{{ asset('vendor/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('vendor/js/jquery.datetimepicker.full.min.js') }}"></script>
<script src="{{ asset('vendor/js/jquery-validation-1.19.3/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-5.0.1/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

</html>
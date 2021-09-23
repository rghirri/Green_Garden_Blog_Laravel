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
  <title>Green Garden Blog</title>
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

  <!-- Hero Banner Start  -->
  <div class="hero-banner container-fluid container-xl">
    <picture class="hero-banner__overlay">
      <img class="hero-banner__overlay-image img-fluid"
        src="{{ asset('uploads/Green-Garden-hero-banner-1295x264-min.png') }}" alt="" />
    </picture>

    <div class="hero-banner__title">
      <h1>The Green Garden Blog</h1>
    </div>
  </div>
  <!-- Hero Banner End  -->

  <!-- Post list begins -->

  <section class="wrapper  wrapper--medium">

    <!-- Post list begins -->

    @php
    $i = 0
    @endphp

    @foreach($articles as $article)

    @php
    $i++
    @endphp
    @if(!($i % 2 == 0))

    <div class="row pt-5">
      <div class="col-md-6">
        <div class="row justify-content-center">
          <div class="col-10 col-lg-9">
            <div class="post-list d-flex flex-column">
              <h2 class="post-list__title">{{ $article->title }}</h2>
              <p id="meta-data"><time>{{ $article->published_at }}</time>
                <!-- categories -->
                <span> | Categories:
                  {{ $article->category->name }} </span>
              </p>
              <p>
                <!-- Content excerpt -->
                {{ strip_tags($article->excerpt()) }}
              </p>
            </div>
            <a href="/article.php?id=335"><button class="btn">Read More</button></a>
          </div>
        </div>

      </div>
      <div class="col-md-6 ">
        <img class="post-list__image img-fluid" src="{{ asset("/storage/".$article->image_list) }}" alt=""
          class="img-fluid" />
      </div>
    </div>
    @else
    <div class="row pt-5">
      <div class="col-md-6 order-2 order-md-1">
        <img class="post-list__image img-fluid" src="{{ asset("/storage/".$article->image_list) }}" alt=""
          class="img-fluid" />
      </div>
      <div class="col-md-6 order-1 order-md-2">
        <div class="row justify-content-center">
          <div class="col-10 col-lg-9">
            <div class="post-list d-flex flex-column">
              <h2 class="post-list__title">{{ $article->title }}</h2>
              <p id="meta-data"><time>{{ $article->published_at }}</time> |
                <!-- categories -->
                <span>Categories:
                  {{ $article->category->name }} </span>

              </p>
              <p>
                <!-- Content excerpt -->
                {{ strip_tags($article->excerpt()) }}
              </p>
            </div>
            <a href="/article.php?id=336"><button class="btn">Read More</button></a>
          </div>
        </div>
      </div>
    </div>
    @endif
    @endforeach

    <!-- Post list Pagination begin -->
    <!-- This file is added to the end of the post list  -->
    <!-- Post list Pagination begin -->


    <nav aria-label="page" id="pagination-list">

      <ul class=" text-center pagination pt-5">
        <!-- Check for pre pages begin -->
        <li class="page-item disabled">
          <a class="page-link" href="page-link" href="?page=" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <!-- Check for pre pages end -->

        <!-- Loop for pagination numbers begin -->
        <li class="page-item active"><a class="page-link" href="?page=1">1</a></li>
        <li class="page-item "><a class="page-link" href="?page=2">2</a></li>
        <!-- Loop for pagination numbers end -->

        <!-- Check for next pages begin -->
        <li class="page-item">
          <a class="page-link" href="?page=2">Next</a>
        </li>
        <!-- Check for next pages begin -->
      </ul>
    </nav> <!-- Post list Pagination end -->
  </section>
  <!-- Post list Pagination end -->
  <!-- Post list Ends -->
  </div>

  <!-- This code is included in the files to add footer -->

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
        <li class="footer-nav__list">
          <a class="footer-nav__link" href="#">contact</a>
        </li>
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
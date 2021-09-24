@extends('layouts.blog')

@section('title')
Green Garden Blog
@endsection

@section('header')
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
@endsection

@section('content')
<!-- Post list begins -->

<section class="wrapper  wrapper--medium">

  <!-- Post list begins -->

  @php
  $i = 0
  @endphp

  @foreach($articles as $article)
  @if($article->published_at)

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
          <a href="{{ route('blog.show', $article->id) }}"><button class="btn">Read More</button></a>
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
          <a href="{{ route('blog.show', $article->id) }}"><button class="btn">Read More</button></a>
        </div>
      </div>
    </div>
  </div>
  @endif
  @endif
  @endforeach

  <!-- Post list Pagination begin -->
  <nav aria-label="page" id="pagination-list">
    <ul class=" text-center pagination pt-5">
      {{ $articles->links() }}
    </ul>
  </nav>
  <!-- Post list Pagination end -->

</section>

</div>

@endsection
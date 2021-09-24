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

<main class="main-content">
  <div class="section bg-gray">
    <div class="container">
      <div class="row">

        <!-- Post list begins -->
        <div class="col-md-8 col-xl-9">
          <div class="row gap-y">
            <div class="row pt-5">
              @forelse($articles as $article)
              <div class="col-md-6">
                <div class="row justify-content-center">
                  <img class="post-list__image" src="{{ asset("/storage/".$article->image_list) }}" alt=""
                    class="img-fluid" />
                  <div class="col-10 col-lg-9 my-3">
                    <div class="d-flex flex-column">
                      <h2> {{ $article->title }}</h2>
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
              @empty
              <p class="text-center">No Results Found For Query : <strong>{{ request()->query('search') }}</strong></p>
              @endforelse
            </div>
          </div>

          <!-- Post list Pagination begin -->
          <nav aria-label="page" id="pagination-list" class="my-5">
            <ul class=" text-center pagination pt-5">
              {{ $articles->appends(['search' => request()->query('search')])->links() }}
            </ul>
          </nav>
          <!-- Post list Pagination end -->

        </div>

        @include('partials.sidebar')

      </div>
    </div>
  </div>
</main>

@endsection
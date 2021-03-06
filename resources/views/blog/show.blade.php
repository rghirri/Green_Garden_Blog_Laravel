@extends('layouts.blog')

@section('title')
Green Garden Blog | {{ $article->title }}
@endsection

@section('header')
<!-- Hero Banner Start  -->
<div class="hero-banner container-fluid container-xl">
  <picture class="hero-banner__overlay__darker">
    <img class="hero-banner__overlay-image" src="{{ asset("/storage/".$article->image_banner) }}" />
  </picture>
  <div class="hero-banner__title">
    <h1>{{ $article->title }}</h1>
  </div>
</div>
<!-- Hero Banner End  -->
@endsection

@section('content')
<!-- Single post begins -->
<main class="main-content">
  <div class="section bg-gray">
    <div class="container">
      <div class="row">

        <!-- Post list begins -->
        <div class="col-md-8 col-xl-9">
          <div class="row gap-y">
            <div class="row py-5">
              <div class="col-md-10 offset-md-1">
                <div class="single-post">
                  <p id="meta-data">
                    <!-- pubish time and date -->
                    <time>{{ $article->published_at }}</time>
                    <!-- Author -->
                    <span> | Author:
                      {{ $article->user->name }} </span>
                    <!-- tagss -->
                    <span>
                      <!-- categories -->
                      <span> | Categories:
                        {{ $article->category->name }} </span>
                      <span> | Tags:
                        @foreach($article->tags as $tag)
                        {{ $tag->name }}
                        @endforeach
                      </span>
                  </p>
                  <!-- Content  -->
                  <p>{!! $article->content !!}</p>
                  <a href="{{ route('welcome') }}"><button class="btn">Back to Previous</button></a>
                </div>

              </div>

            </div>
          </div>
        </div>
        @include('partials.sidebar')
      </div>
    </div>
  </div>
</main>

<!-- Single post Ends -->

@endsection
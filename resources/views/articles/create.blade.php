@extends('layouts.app')

@section('content')
<div class="card card-default">
  <div class="card-header">
    {{ isset($article) ? 'Edit Article' : 'Create Article' }}
  </div>
  <div class="card-body">
    @include('partials.errors')
    <form action="{{ isset($article) ? route('articles.update', $article->id) : route('articles.store') }}"
      method="POST" enctype="multipart/form-data">
      @csrf

      @if(isset($article))
      @method('PUT')
      @endif

      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title"
          value="{{ isset($article) ? $article->title : '' }}">
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <input id="content" type="hidden" name="content" value="{{ isset($article) ? $article->content : '' }}">
        <trix-editor input="content"></trix-editor>
      </div>
      <div class="form-group">
        <label for="published_at">Published_at</label>
        <input type="text" class="form-control" name="published_at" id="published_at"
          value="{{ isset($article) ? $article->published_at : '' }}">
      </div>
      <!-- Display Image list -->
      @if(isset($article))
      <div class="form-group mt-5">
        <div class="text-center">
          <img src="{{ asset("/storage/".$article->image_list) }}" alt="" style="width:50%">
        </div>
        <label for="image_list">Image List</label>
        <input class="mt-3" type="file" class="form-control" name="image_list" id="image_list"
          aria-describedby="imageHelp" value="{{ asset("/storage/".$article->image_list) }}">
        <small id="imageHelp" class="font-weight-bolder">Image dimensions need to be 1300x269px.</small>
      </div>
      @else
      <div class="form-group">
        <label for="image_list">Image List</label>
        <input type="file" class="form-control" name="image_list" id="image_list">
        <small id="imageHelp" class="font-weight-bolder">Image dimensions need to be 363x255px.</small>
      </div>
      @endif
      <!-- Display Image banner -->
      @if(isset($article))
      <div class="form-group mt-5">
        <div class="text-center">
          <img class="text-center" src="{{ asset("/storage/".$article->image_banner) }}" alt="" style="width:50%">
        </div>
        <label for="image_list">Image Banner</label>
        <input class="mt-3" type="file" class="form-control" name="image_banner" id="image_banner"
          aria-describedby="imageHelp" value="{{ asset("/storage/".$article->image_banner) }}">
        <small id="imageHelp" class="font-weight-bolder">Image dimensions need to be 1300x269px.</small>
      </div>
      @else
      <div class="form-group">
        <label for="image_banner">Image Banner</label>
        <input type="file" class="form-control" name="image_banner" id="image_banner" aria-describedby="imageHelp">
        <small id="imageHelp" class="font-weight-bolder">Image dimensions need to be 1300x269px.</small>
      </div>
      @endif
      <!-- Categories List -->
      <div class="form-group">
        <label for="category">Category</label>
        <select name="category" id="category" class="form-control">
          @foreach($categories as $category)
          <option value="{{ $category->id }}" @if(isset($article)) @if($category->id == $article->category_id)
            selected
            @endif
            @endif
            >
            {{ $category->name }}
          </option>
          @endforeach
        </select>
      </div>

      <!-- Tags List -->
      @if($tags->count() > 0)
      <div class="form-group">
        <label for="tags">Tags</label>
        <select name="tags[]" id="tags" class="tags-selector form-control" multiple>
          @foreach($tags as $tag)
          <option value="{{ $tag->id }}" @if(isset($article)) @if($article->hasTag($tag->id))
            selected
            @endif
            @endif
            >
            {{ $tag->name }}
          </option>
          @endforeach
        </select>
      </div>
      @endif

      <div class="form-group">
        <button type="submit" class="btn btn-success">
          {{ isset($article) ? 'Update Article' : 'Create Article' }}
        </button>
      </div>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
// date picker
flatpickr('#published_at', {
  enableTime: true,
  enableSeconds: true
});

// tag select
$(document).ready(function() {
  $('.tags-selector').select2();
});
</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
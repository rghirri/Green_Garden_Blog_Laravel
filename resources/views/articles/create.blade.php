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
      <div class="form-group text-center">
        <img src="{{ asset("/storage/".$article->image_file_list) }}" alt="" style="width:50%">
      </div>
      @endif
      <div class="form-group">
        <label for="image">Image List</label>
        <input type="file" class="form-control" name="image" id="image">
      </div>
      <!-- Display Image banner -->
      @if(isset($article))
      <div class="form-group text-center">
        <img src="{{ asset("/storage/".$article->image_file_banner) }}" alt="" style="width:50%">
      </div>
      @endif
      <div class="form-group">
        <label for="image">Image Banner</label>
        <input type="file" class="form-control" name="image" id="image">
      </div>
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
flatpickr('#published_at', {
  enableTime: true,
  enableSeconds: true
});
</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
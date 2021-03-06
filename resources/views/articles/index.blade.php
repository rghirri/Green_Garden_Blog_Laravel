@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
  <a href="{{ route('articles.create') }}" class="btn btn-success">Add Article</a>
</div>
<div class="card card-default">
  <div class="card-header">
    Articles
  </div>
  <div class="card-body">
    @if($articles->count() > 0)
    <table class="table">
      <thead>
        <tr>
          <th>image list</th>
          <th>image banner</th>
          <th>Title</th>
          <th>Category</th>
          <th>Publish Status</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($articles as $article)
        <tr>
          <td>
            <div class="zoom">
              <img src="{{ asset("/storage/".$article->image_list) }}" width="100" class="img-fluid" alt="">
            </div>

          </td>
          <td>
            <div class="zoom">
              <img src="{{ asset("/storage/".$article->image_banner) }}" width="100" class="img-fluid" alt="">
            </div>
          </td>
          <td>
            {{ $article->title }}
          </td>
          <td>
            <a href="{{ route('categories.edit', $article->category->id) }}">{{ $article->category->name }}</a>
          </td>
          <td>
            {{ $article->published_at ? 'Published' : 'Unpublished' }}
          </td>
          <td>
            @if($article->trashed())
          <td>
            <form action="{{ route('restore-articles', $article->id) }}" method='POST'>
              @csrf
              @method('PUT')
              <button type="submit" class="btn btn-info btn-sm text-white">Restore</button>
            </form>
          </td>
          @else
          <td><a href="{{ route('articles.edit', $article->id) }}" class="btn btn-info btn-sm">Edit</a></td>
          @endif
          </td>
          <td>
            <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type='submit' class="btn btn-danger btn-sm">
                {{ $article->trashed() ? 'Delete' : 'Trash' }}
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <h3 class="text-center">No Articles</h3>
    @endif
  </div>
</div>
@endsection
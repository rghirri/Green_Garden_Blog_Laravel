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
    <table class="table">
      <thead>
        <tr>
          <th>Title</th>
          <th>Content</th>
          <th>Category</th>
          <th>image list</th>
          <th>image banner</th>
          <th>Publish Status</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($articles as $article)
        <tr>
          <td>
            {{ $article->title }}
          </td>
          <td>
            {!! $article->content !!}
          </td>
          <td>
            Category
          </td>
          <td>
            <img src="{{ asset("/storage/".$article->image_list) }}" alt="">
          </td>
          <td>
            <img src="{{ asset("/storage/".$article->image_banner) }}" alt="">
          </td>
          <td>
            Publish Status button
          </td>
          <td>
            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-info btn-sm">Edit</a>
          </td>
          <td>
            <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $article->id }})">Delete</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="" method="POST" id="deleteArticleForm">
          @csrf
          @method('DELETE')
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Delete Article Confirmation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="text-center text-bold">
                Are you sure you want to delete article?
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="submit" class="btn btn-danger">Yes</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    @endsection

    @section('scripts')
    <script>
    function handleDelete(id) {
      var form = document.getElementById('deleteArticleForm')
      form.action = '/articles/' + id
      $('#deleteModal').modal('show')
    }
    </script>
    @endsection
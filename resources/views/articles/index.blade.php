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
            Category
          </td>
          <td>
            Publish Status button
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
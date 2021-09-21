@extends('layouts.app')

@section('content')
<div class="card card-default">
  <div class="card-header">
    Create Category
  </div>
  <div class="card-body">
    <form action="">
      <div class="form-group">
        <label for="name">category name</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <button class="btn btn-success">add category</button>
      </div>
    </form>
  </div>
</div>

@endsection
@extends('layouts.app')

@section('content')
<div class="card card-default">
  <div class="card-header">Users</div>
  <div class="card-body">
    @if($users->count() > 0)
    <table class="table">
      <thead>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th></th>
        <th></th>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <!-- <td> Avatar of user</td> -->
          <td><img width="70" height="70" style="border-radius:50%;" src="{{ Gravatar::src($user->email) }}" alt="">
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->role }}</td>
          @if($user->email !== 'rayaa_ghirri@yahoo.com')
          @if($user->role == 'writer')
          <td>
            <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-success btn-sm">Admin</button>
            </form>
          </td>
          @else
          <td>
            <form action="{{ route('users.make-writer', $user->id) }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-success btn-sm">Writer</button>
            </form>
          </td>
          @endif
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <h3 class="text-center">No Users</h3>
    @endif
  </div>
</div>
@endsection
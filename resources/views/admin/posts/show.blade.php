{{-- @dd($posts); --}}
@extends('layouts.app')
@section('content')
  <div class="container border">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>ID</th>
          <th>USER ID</th>
          <th>TITLE</th>
          <th>CREATED AT</th>
          <th>UPDATED AT</th>
          <th colspan="3"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{$post->id}}</td>
          <td>{{$post->user_id}}</td>
          <td>{{$post->title}}</td>
          <td>{{$post->created_at}}</td>
          <td>{{$post->updated_at}}</td>
          <td>
            <button class="btn btn-info" type="submit" name="button">
              <a href="{{route('admin.posts.index')}}">Torna ai risultati</a>

            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection

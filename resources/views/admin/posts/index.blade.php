{{-- @dd($posts); --}}

{{-- Usiamo il layouts che ci fornisce gia Laravel --}}
@extends('layouts.app')
@section('content')
  <div class="container border">
    <div class="">
      <a class="btn btn-info" href="#">Crea un nuovo post</a>
    </div>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>ID</th>
          <th>User ID</th>
          <th>Title</th>
          <th>Created at</th>
          <th>Updated at</th>
          <th colspan="3"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->user_id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->updated_at}}</td>
            <td>
              <a class="btn btn-primary" href="{{route('admin.posts.show', $post->slug)}}">
                View
              </a>
            </td>
            <td class="btn btn-primary">Edit</td>
            <td class="btn btn-danger" type="submit">Delete</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

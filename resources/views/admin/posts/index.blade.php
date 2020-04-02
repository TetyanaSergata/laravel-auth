{{-- @dd($posts); --}}

{{-- Usiamo il layouts che ci fornisce gia Laravel --}}
@extends('layouts.app')
@section('content')
  <div class="container border">
    <div class="">
      <button type="button" name="button">
        <a class="btn btn-info" href="{{route('admin.posts.create')}}">Crea un nuovo post</a>
      </button>

    </div>
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
        @foreach ($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->user_id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->updated_at}}</td>
            <td>
              <a class="btn btn-primary"
              href="{{route('admin.posts.show', $post->slug)}}"
                >View
              </a>
            </td>
            <td>
              <a class="btn btn-success"
              href="{{route('admin.posts.edit', $post->slug)}}">
                Edit
              </a>
            </td>
            <td>
              <form action="{{route('admin.posts.destroy', $post)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" name="button">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection

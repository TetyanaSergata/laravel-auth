{{-- @dd($posts); --}}

{{-- Usiamo il layouts che ci fornisce gia Laravel --}}
@extends('layouts.app')
@section('content')
  <table class='table'>
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Created at</th>
        <th>Updated at</th>
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
          <td>View</td>
          <td>Edit</td>
          <td>Delete</td>
        </tr>
      @endforeach
    </tbody>
  </table>

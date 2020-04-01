{{-- @dd($posts); --}}

@extends('layouts.app')
@section('content')
  <div class="container border">
    <div class="row">
      <div class="col-12">
        {{-- Autenticazione --}}
        <h3>{{$post->title}}</h3>
        <p>{{$post->body}}</p>
        <h6>Autore : {{$post->user->name}}</h6>
      </div>
    </div>
  </div>
@endsection

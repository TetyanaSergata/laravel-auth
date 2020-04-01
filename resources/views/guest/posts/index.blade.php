{{-- @dd($posts); --}}

@extends('layouts.app')
@section('content')
  <div class="container border">
    <div class="row">
      <div class="col-12">
        <div class="container">
          {{-- Autenticazione --}}
          {{-- @auth
            Autenticato
          @endauth --}}
          @foreach ($posts as $post)
            <h3>{{$post->title}}</h3>
            <p>{{$post->body}}</p>
            <h6>Autore : {{$post->user->name}}</h6>
            <div>
              <a class="stretched-link"
              href="{{route('posts.show', $post->slug)}}">
                Leggi il post
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection

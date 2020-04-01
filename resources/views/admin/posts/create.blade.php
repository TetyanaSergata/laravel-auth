@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
    {{-- Creiamo il nostro FORM --}}
    <form action="{{route('admin.posts.store')}}" method="post">
      @csrf
      @method('POST')
      <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" type="text" name="title">
      </div>
      <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control" name="body" rows="8" cols="80"></textarea>
      </div>
      <button class="btn btn-primary" type="submit" name="button">Save</button>
    </form>
      </div>

    </div>

  </div>
@endsection

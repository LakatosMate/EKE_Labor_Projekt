@extends('layouts.app')

@section('title')
Kezdőlap
@endsection

@section('content')

  <style>
  .custom-img {
    width: 30%;
    height: 220px;
    object-fit: cover;
  }

  .custom-body {
    width: 70%;
    margin: 0 auto;
  }
</style>

  <h2>Bejegyzések</h2>
  <hr>
    @foreach ($posts as $post)

    <div class="card d-flex flex-column mb-3">
      <div class="d-flex flex-row" style="flex: 1;">
        @if ($post->image_path)
          <img class="card-img-left custom-img" src="{{ asset($post->image_path) }}"/>
        @else
          <img class="card-img-left custom-img" src="{{ asset('images/dummy-post-image.jpg') }}"/>
        @endif

        <div class="card-body custom-body">
          <h4 class="card-title h5 h4-sm">{{ $post->title}}</h4>
          <p class="card-text" style="text-align: justify;">{{ $post->short_description}}</p>
          <div class="text-end">
            <a href="#" class="btn btn-secondary">Elolvasom</a>
          </div>
        </div>

      </div>
      <div class="card-footer text-end text-muted">
        @if (!empty($post->author->full_name))
          <p class="card-text mb-0"><small class="text-muted">Szerző: {{$post->author->full_name}}, Dátum: {{$post->created_at->format('Y.m.d H:i')}}</small></p>
        @else
          <p class="card-text mb-0"><small class="text-muted">Szerző: {{$post->author->username}}, Dátum: {{$post->created_at->format('Y.m.d H:i')}}</small></p>
        @endif
      </div>
    </div>

    @endforeach


    @if (Session::has('fail'))
        <div class="mt-3">
        <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
        </div>
    @endif
@endsection

@extends('layouts.app')

@section('title')
Kezdőlap
@endsection

@section('content')
  <h2>Bejegyzések</h2>
  <hr>

    @if (count($posts) > 0)
        @foreach ($posts as $post)
        <div class="card p-3 mt-3">
            <h3><a href="/post/{{$post->id}}">{{$post->title}}</a></h3>
            <small>Írta: {{$post->user->name}} - {{$post->created_at}}</small>
        </div>
        @endforeach
    @else
        <p>Nincs megjeleníthető bejegyzés.</p>
    @endif


  @if (Session::has('fail'))
    <div class="mt-3">
      <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
    </div>
  @endif
@endsection

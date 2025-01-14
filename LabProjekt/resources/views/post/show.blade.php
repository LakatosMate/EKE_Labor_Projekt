@extends('layouts.app')

@section('title')
{{ $post->title }}
@endsection

@section('content')
<style>
  .article-container {
    max-width: 800px;

    margin: 40px auto;
    padding: 20px;
    background-color: #f9f9f9;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
  }



  .article-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
  }

  .article-meta {
    font-size: 0.9rem;
    color: #6c757d;
    text-align: center;
    margin-bottom: 30px;
  }

  .article-content {
    font-size: 1.1rem;
    line-height: 1.8;
    text-align: justify;
    color: #333;
  }

  .btn-back {
    display: inline-block;
    margin-top: 30px;
    padding: 10px 20px;
    font-size: 1rem;
    font-weight: bold;
    color: #fff;
    background-color: #007bff;
    border-radius: 6px;
    text-decoration: none;
    text-align: center;
    transition: background-color 0.3s;
  }
   .article-image {

    width: 100%;
  height: auto;
  aspect-ratio: 2 / 1;
  object-fit: cover;
  border-radius: 8px;
  margin-bottom: 20px;

  }

  .btn-back:hover {
    background-color: #0056b3;
  }
</style>

<div class="article-container">


  <h1 class="article-title">{{ $post->title }}</h1>

   @if ($post->image_path)
    <img class="article-image" src="{{ asset($post->image_path) }}" alt="{{ $post->title }}">
  @else
    <img class="article-image" src="{{ asset('images/dummy-post-image.jpg') }}" alt="Default Image">
  @endif



  <div class="article-content">
    <p><strong>Leírás:</strong> {{ $post->description }}</p>
    <p>{{ $post->description }}</p>
  </div>
  <div class="article-meta">
    @if (!empty($post->author->full_name))
      Szerző: {{ $post->author->full_name }} | Dátum: {{ $post->created_at->format('Y.m.d H:i') }}
    @else
      Szerző: {{ $post->author->username }} | Dátum: {{ $post->created_at->format('Y.m.d H:i') }}
    @endif
  </div>

  <a href="{{ route('home.index') }}" class="btn-back">Vissza a listához</a>
</div>
@endsection

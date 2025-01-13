@extends('layouts.app')

@section('title')
Kezdőlap
@endsection

@section('content')
<style>

     body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #fff;
        padding: 10px 20px;
        border-bottom: 1px solid #ddd;
    }

    header img {
        height: 50px;
    }

    header nav a {
        margin-left: 15px;
        text-decoration: none;
        color: #333;
        font-weight: bold;
    }

    main {
        padding: 20px;
    }

    h1 {
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        background: #fff;
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    table th {
        background-color: #f8f8f8;
    }

    table tr:hover {
        background-color: #f1f1f1;
    }

    a {
        text-decoration: none;
        color: #007bff;
    }

    a:hover {
        text-decoration: underline;
    }

    .btn {
        display: inline-block;
        padding: 8px 15px;
        border-radius: 5px;
        text-align: center;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    .btn-edit {
        background-color: #007bff; /* Kék szín az Edit gombhoz */
        margin-right: 5px;
    }

    .btn-edit:hover {
        background-color: #0056b3; /* Sötétebb kék hover állapot */
    }

    .btn-delete {
        background-color: #dc3545; /* Piros szín a Delete gombhoz */
    }

    .btn-delete:hover {
        background-color: #a71d2a; /* Sötétebb piros hover állapot */
    }

    .pagination-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }

    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .pagination li {
        margin: 0 2px;
    }

    .pagination a,
    .pagination span {
        display: inline-block;
        padding: 5px 8px;
        font-size: 12px;
        border-radius: 3px;
        border: 1px solid #ddd;
        background-color: #fff;
        color: #333;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .pagination a:hover {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .pagination .active span {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .pagination .disabled span {
        color: #ddd;
        cursor: not-allowed;
    }

    .pagination li:first-child {
        margin-right: auto;
    }

    .pagination li:last-child {
        margin-left: auto;
    }

    .items-per-page {
        margin-top: 20px;
        text-align: right;
    }

    .items-per-page select {
        padding: 5px;
    }

    img {
        max-width: 100px;
        height: auto;
        border-radius: 5px;
    }
</style>

  <h2>Bejegyzések</h2>
  <hr>
@foreach ($posts as $post)
<div class="card mb-3">
  <img class="card-img-top" src=".../100px180/" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{ $post->title}}</h5>
    <p class="card-text"> {{ $post->description}} </p>
   <div class="d-flex justify-content-between align-items-center">

    @if (!empty($post->author->name))
      <p class="card-text mb-0"><small class="text-muted">{{$post->author->role}}</small></p>
      @else
        <p class="card-text mb-0"><small class="text-muted">{{$post->author->full_name}}</small></p>
      @endif
      <a href="#" class="btn btn-secondary">Elolvasom</a>
    </div>
  </div>
</div>
@endforeach


  @if (Session::has('fail'))
    <div class="mt-3">
      <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
    </div>
  @endif
@endsection

@extends('layouts.app')

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

    .post {
        display: flex;
        background: #fff;
        padding: 15px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .post img {
        width: 80px;
        height: 80px;
        background-color: #ccc;
        border-radius: 5px;
        margin-right: 15px;
    }

    .post-content {
        flex: 1;
    }

    .post-content h2 {
        margin: 0;
        font-size: 1.2em;
    }

    .post-content p {
        margin: 5px 0 10px;
        color: #666;
    }

    .post-content .meta {
        font-size: 0.9em;
        color: #999;
    }

    .read-more {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination a {
        text-decoration: none;
        color: #333;
        padding: 5px 10px;
        margin: 0 5px;
        border: 1px solid #ddd;
        border-radius: 3px;
    }

    .pagination a.active {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .items-per-page {
        margin-top: 20px;
        text-align: right;
    }

    .items-per-page select {
        padding: 5px;
    }
</style>

<h1>Bejegyzések</h1>
<a href="{{ route('post.create') }}">Új bejegyzés</a>

@if ($message = Session::get('success'))
    <p>{{ $message }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>Cím</th>
            <th>Leírás</th>
            <th>Szerző</th>
            <th>Publikált</th>
            <th>Műveletek</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->cím }}</td>
            <td>{{ $post->leirás }}</td>
            <td>{{ $post->szerző->name }}</td>
            <td>{{ $post->is_publikált ? 'Igen' : 'Nem' }}</td>
            <td>
                <a href="{{ route('post.edit', $post->id) }}">Szerkesztés</a>
                <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Törlés</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="pagination">
    <a href="#" class="active">1</a>
    <a href="#">2</a>
    <span>&hellip;</span>
    <a href="#">6</a>
</div>

<div class="items-per-page">
    <label for="items"></label>
    <select id="items">
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="50">50</option>
    </select>
</div>
@endsection

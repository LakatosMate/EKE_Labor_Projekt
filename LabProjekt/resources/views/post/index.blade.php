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
        background-color: #007bff;
        margin-right: 5px;
    }

    .btn-edit:hover {
        background-color: #0056b3;
    }

    .btn-delete {
        background-color: #dc3545;
    }

    .btn-delete:hover {
        background-color: #a71d2a;
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

<h1>Bejegyzések</h1>
<a href="{{ route('post.create') }}" style="display: inline-block; margin-bottom: 20px; background: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 5px;">Új bejegyzés</a>

@if ($message = Session::get('success'))
    <p style="background: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 5px;">{{ $message }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>Kép</th>
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
            <td>
                @if ($post->image_path)
                    <img src="{{ asset($post->image_path) }}" alt="Kép">
                @else
                    Nincs kép
                @endif
            </td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->description }}</td>
            <td>{{ $post->author->username }}</td>
            <td>{{ $post->is_published ? 'Igen' : 'Nem' }}</td>
            <td>
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-edit">Szerkesztés</a>
                <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete" onclick="return confirm('Biztosan törölni szeretnéd?')">Törlés</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="pagination-container">
    {{ $posts->onEachSide(1)->links('pagination::bootstrap-4') }}
</div>

<div class="items-per-page">
    <label for="items">Elemek száma oldalanként:</label>
    <select id="items" onchange="window.location.href='?items=' + this.value">
        <option value="10" {{ request('items') == 10 ? 'selected' : '' }}>10</option>
        <option value="20" {{ request('items') == 20 ? 'selected' : '' }}>20</option>
        <option value="50" {{ request('items') == 50 ? 'selected' : '' }}>50</option>  <!--létrehoztam hogy tudjam commitolni ne dobja fel-->
    </select>
</div> 
@endsection
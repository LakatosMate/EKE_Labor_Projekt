@extends('layouts.app')

@section('title', 'Bejegyzések')

@section('content')
<h2 class="mb-4">Bejegyzések</h2>

@if ($message = Session::get('success'))
    <div class="alert alert-success">{{ $message }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>Kép</th>
            <th>Cím</th>
            <th> Rövid Leírás</th>
            <th class="text-center">Szerző</th>
            <th class="text-center">Publikus</th>
            <th class="text-center">Műveletek</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>
                @if ($post->image_path)
                    <img src="{{ asset($post->image_path) }}" alt="Kép" class="img-thumbnail" style="max-width: 100px;">
                @else
                    <span class="text-muted">Nincs kép</span>
                @endif
            </td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->short_description }}</td>
            <td class="text-center">{{ $post->author->username }}</td>
            <td class="text-center" >{{ $post->is_published ? 'Igen' : 'Nem' }}</td>
            <td  class="text-nowrap text-center">
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning btn-sm">Szerkesztés</a>
                <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Biztosan törölni szeretnéd?')">Törlés</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-between align-items-center">
    <div>
        {{ $posts->onEachSide(1)->links('pagination::bootstrap-4') }}
    </div>
    <div>
        <label for="items" class="form-label">Elemek száma oldalanként:</label>
        <select id="items" class="form-select d-inline-block w-auto" onchange="window.location.href='?items=' + this.value">
            <option value="10" {{ request('items') == 10 ? 'selected' : '' }}>10</option>
            <option value="20" {{ request('items') == 20 ? 'selected' : '' }}>20</option>
            <option value="50" {{ request('items') == 50 ? 'selected' : '' }}>50</option> <!--auto szerző-->
        </select>
    </div>
</div>
@endsection

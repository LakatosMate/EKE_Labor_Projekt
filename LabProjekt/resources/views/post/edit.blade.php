@extends('layouts.app')

@section('content')
<main>
    <h1 style="margin-bottom: 20px; font-size: 1.5em; font-weight: bold;">Bejegyzés szerkesztése</h1>
    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data" style="background: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 5px;">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="title" style="display: block; font-weight: bold; margin-bottom: 5px;">Cím:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
        </div>

         <div class="col-md-12 mb-3">
                    <label for="short_description" class="form-label">Rövid leírás:</label>
                    <textarea id="short_description" name="short_description" rows="4" class="form-control" placeholder="Pár mondat a bejegyzésről"></textarea>
                </div>
        <div style="margin-bottom: 15px;">
            <label for="description" style="display: block; font-weight: bold; margin-bottom: 5px;">Leírás:</label>
            <textarea id="description" name="description" rows="4" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">{{ old('description', $post->description) }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="image_path" style="display: block; font-weight: bold; margin-bottom: 5px;">Kép:</label>
            <input type="file" id="image_path" name="image_path" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
            @if ($post->image_path)
            <p>Jelenlegi kép: <a href="{{ asset($post->image_path) }}" target="_blank">{{ $post->image_path }}</a></p>
            @endif
        </div>

        <div style="margin-bottom: 15px;">
            <label for="author_id" style="display: block; font-weight: bold; margin-bottom: 5px;">Szerző:</label>
            <select id="author_id" name="author_id" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
                @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $post->author_id == $user->id ? 'selected' : '' }}>
                    {{ $user->username }}
                </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="is_published" style="display: block; font-weight: bold; margin-bottom: 5px;">Publikált:</label>
            <input type="checkbox" id="is_published" name="is_published" value="1" {{ $post->is_published ? 'checked' : '' }} style="margin-right: 5px;">
            <span>Igen</span>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="date" style="display: block; font-weight: bold; margin-bottom: 5px;">Dátum:</label>
            <input type="datetime-local" id="date" name="date" value="{{ old('date', $post->date->format('Y-m-d\TH:i')) }}" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
        </div>

        <button type="submit" style="background: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 1em; cursor: pointer;">Frissítés</button>
    </form>
</main>
@endsection

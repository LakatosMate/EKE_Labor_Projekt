@extends('layouts.app')

@section('content')
<main>
    <h1 style="margin-bottom: 20px; font-size: 1.5em; font-weight: bold;">Új bejegyzés létrehozása</h1>
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" style="background: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 5px;">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="title" style="display: block; font-weight: bold; margin-bottom: 5px;">Cím:</label>
            <input type="text" id="title" name="title" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="description" style="display: block; font-weight: bold; margin-bottom: 5px;">Leírás:</label>
            <textarea id="description" name="description" rows="4" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;"></textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="image_path" style="display: block; font-weight: bold; margin-bottom: 5px;">Kép:</label>
            <input type="file" id="image_path" name="image_path" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="author_id" style="display: block; font-weight: bold; margin-bottom: 5px;">Szerző:</label>
            <select id="author_id" name="author_id" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
                <option value="">Válassz egy szerzőt</option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->username }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="is_published" style="display: block; font-weight: bold; margin-bottom: 5px;">Publikált:</label>
            <input type="checkbox" id="is_published" name="is_published" value="1" style="margin-right: 5px;">
            <span>Igen</span>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="date" style="display: block; font-weight: bold; margin-bottom: 5px;">Dátum:</label>
            <input type="datetime-local" id="date" name="date" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
        </div>

        <button type="submit" style="background: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 1em; cursor: pointer;">Létrehozás</button>
    </form>
</main>
@endsection
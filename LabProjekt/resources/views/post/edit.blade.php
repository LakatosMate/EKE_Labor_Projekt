@extends('layouts.app')

@section('content')
<h1>Bejegyzés szerkesztése</h1>
<form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Cím:</label>
    <input type="text" name="cím" value="{{ $post->cím }}" required>

    <label>Leírás:</label>
    <textarea name="leirás">{{ $post->leirás }}</textarea>

    <label>Kép:</label>
    @if ($post->image_path)
        <p>Jelenlegi kép:</p>
        <img src="{{ asset('storage/' . $post->image_path) }}" alt="Kép" width="200">
    @endif
    <input type="file" name="image_path">

    <label>Szerző:</label>
    <select name="szerző_id">
        @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ $post->szerző_id == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>

    <label>Publikált:</label>
    <input type="checkbox" name="is_publikált" value="1" {{ $post->is_publikált ? 'checked' : '' }}>

    <label>Dátum:</label>
    <input type="datetime-local" name="dátum" value="{{ $post->dátum->format('Y-m-d\TH:i') }}" required>

    <button type="submit">Mentés</button>
</form>
@endsection
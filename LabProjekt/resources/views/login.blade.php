@extends('layouts.app')

@section('title')
Bejelentkezés
@endsection

@section('content')
 <div class="container">
    <h2>Bejelentkezés</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Felhasználó név</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Jelszó</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Bejelentkezés</button>
    </form>
</div>
@endsection

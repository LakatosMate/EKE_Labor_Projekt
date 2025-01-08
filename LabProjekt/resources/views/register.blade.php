@extends('layouts.app')

@section('title')
Regisztráció
@endsection

@section('content')
  <div class="container">
    <h2>Regisztráció</h2>
    <form method="POST" action="{{ route('registration') }}">
      @csrf
      <div class="mb-3">
          <label for="username" class="form-label">Felhasználó név</label>
          <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email cím</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
          <label for="password" class="form-label">Jelszó</label>
          <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Jelszó megerősítés</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
      </div>
      <button type="submit" class="btn btn-primary">Regisztráció</button>
  </form>
  </div>
@endsection

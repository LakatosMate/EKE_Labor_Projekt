@extends('layouts.app')

@section('title')
Regisztráció
@endsection

@section('content')
  <div class="container">
    <h2>Regisztráció</h2>
    @if (Session::has('fail'))
      <div class="my-3">
        <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
      </div>
    @endif
    <form method="POST" action="{{ route('registration') }}">
      @csrf
      <div class="mb-3">
          <label for="username" class="form-label">Felhasználónév</label>
          <input type="text" placeholder="Írja be a felhasználónevet" class="form-control" id="username" name="username" required>
          @error('username')
            <span class="text-danger">{{$message}}</span>
          @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email cím</label>
        <input type="email" placeholder="Írja be az Email címét" class="form-control" id="email" name="email" required>
        @error('email')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="mb-3">
          <label for="password" class="form-label">Jelszó</label>
          <input type="password" placeholder="Írja be a jelszót" class="form-control" id="password" name="password" required>
          @error('password')
            <span class="text-danger">{{$message}}</span>
          @enderror
      </div>
      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Jelszó megerősítés</label>
        <input type="password" placeholder="Írja be újra a jelszót" class="form-control" id="password_confirmation" name="password_confirmation" required>
        @error('password_confirmation')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Regisztráció</button>
  </form>
  </div>
@endsection

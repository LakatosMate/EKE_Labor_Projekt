@extends('layouts.app')

@section('title')
Elfelejtett Jelszó
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Elfelejtett jelszó</h2>
    <p class="text-center">Kérlek add meg az alábbi adatokat az új jelszó beállításához.</p>

    <form method="POST"  action="{{ route('pwReset') }}">
        @csrf

        <div class="mb-3">
            <label for="username" class="form-label">Felhasználó név</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Add meg a felhasználóneved" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail cím</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Add meg az e-mail címed" required>
        </div>

        <div class="mb-3">
            <label for="new_password" class="form-label">Új jelszó</label>
            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Add meg az új jelszót" required>
        </div>

        <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Új jelszó ismétlés</label>
            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="Add meg újra az új jelszót" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Új jelszó beállítása</button>
    </form>
</div>
@endsection

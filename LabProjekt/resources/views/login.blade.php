@extends('layouts.app')

@section('title')
Bejelentkezés
@endsection

@section('content')
 <div class="container">
    <h2>Bejelentkezés</h2>
    <form method="POST"  action="{{ route('logging_in') }}">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Felhasználó név</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Jelszó</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="d-inline">
            <button type="submit" class="btn btn-primary">Bejelentkezés</button>
        </div>

    </form>

    <div class="mt-3 d-inline">
        <a href="{{ route('pwrequest') }}"> Elfelejtett jelszó? </a>
    </div>

    @if (Session::has('success'))
        <div class="mt-3">
            <span class="alert alert-success p-2">{{Session::get('success')}}</span>
        </div>
    @endif
</div>
@endsection



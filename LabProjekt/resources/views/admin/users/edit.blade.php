    @extends('layouts.app')

    @section('title', 'Felhasználó szerkesztése')

    @section('content')
    <div class="container">
        <h2>Felhasználó szerkesztése</h2>

        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Felhasználónév</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Jogkör</label>
                <select class="form-select" id="role" name="role">
                    <option value="regisztrált" {{ $user->role === 'regisztrált' ? 'selected' : '' }}>Felhasználó</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="szerkesztő" {{ $user->role === 'szerkesztő' ? 'selected' : '' }}>Szerkesztő</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Mentés</button>
        </form>
    </div>
    @endsection

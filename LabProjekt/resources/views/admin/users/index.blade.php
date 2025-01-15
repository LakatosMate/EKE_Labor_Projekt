@extends('layouts.app')

@section('title', 'Felhasználók kezelése')

@section('content')
<div class="container">
    <h2>Felhasználók kezelése</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3 d-flex justify-content-end">
        <form method="GET" action="{{ route('admin.users.index') }}" class="d-inline-block w-25">
            <label for="perPage" class="form-label">Felhasználók száma oldalanként:</label>
            <select id="perPage" name="perPage" class="form-select" onchange="this.form.submit()">
                <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
                <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
            </select>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Felhasználónév</th>
                <th>Email</th>
                <th>Jogkör</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning btn-sm">Szerkesztés</a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Törlés</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $users->appends(['perPage' => request('perPage')])->links('pagination::bootstrap-4', ['prev_message' => 'Előző', 'next_message' => 'Következő']) }}
    </div>
</div>
@endsection

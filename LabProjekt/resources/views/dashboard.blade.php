@extends('layouts.app')

@section('title')
Írányítópult
@endsection

@section('content')
<div class="container">
    <h2>Írányítópult</h2>

    <div class="mt-3">
        @if (empty(Auth::user()->full_name))
            <h4>Üdvözöllek!</h4>
        @else
            <h4>Üdvözöllek kedves, {{ Auth::user()->full_name }}!</h4>
        @endif
        <p>Legyen szép napod!</p>

        
        @if (Auth::check() && (Auth::user()->role === 'szerkesztő' || Auth::user()->role === 'admin'))
            <a href="/post" class="btn btn-primary mb-4">Bejegyzések</a>
            <a href="{{ route('post.create') }}" class="btn btn-primary mb-4">Új bejegyzés</a>
        @endif

        @if (Auth::check() && Auth::user()->role === 'admin')
            <a href="/admin/users" class="btn btn-primary mb-4">Felhasználók kezelése</a>
        @endif
        
    </div>
@endsection
@extends('layouts.app')

@section('title')
Profilom
@endsection

@section('content')
 <div class="container">
    <h2>Profilom</h2>
    <div class="mt-3">
        @if (empty(Auth::user()->full_name) == false)
            <h5>{{ Auth::user()->full_name }}</h5>
        @endif 
        <p>Felhasználóvév: {{ Auth::user()->username }}</br>Email cím: {{ Auth::user()->email }}</br>Jogkör: {{ Auth::user()->role }}</p>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('content')
 <div class="container">
    <h2>Dashboard</h2>
    <form action="{{ url('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
@endsection

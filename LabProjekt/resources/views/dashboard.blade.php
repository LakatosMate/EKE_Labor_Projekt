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
    </div>


</div>
@endsection

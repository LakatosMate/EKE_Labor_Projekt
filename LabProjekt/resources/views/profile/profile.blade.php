@extends('layouts.app')

@section('title')
Profilom
@endsection

@section('content')

<div class="container">
    <div class="container rounded bg-white mt-3 mb-3">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle" width="150px" src="{{ asset('storage/images/dummy-profile-pic-300x300.png') }}" alt="Profilkép">
                    <span class="font-weight-bold">{{ Auth::user()->username }}</span>
                    <span class="text-black-50">{{ Auth::user()->email }}</span>
                    <span class="font-weight-bold">Jogkör: {{ Auth::user()->role }}</span>
                    <span> </span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="text-right">Profilom</h2>
                    </div>
                    <div class="row mt-3">
                        @if (empty(Auth::user()->full_name) == false)
                            <h5>{{ Auth::user()->full_name }}</h5>
                        @endif 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
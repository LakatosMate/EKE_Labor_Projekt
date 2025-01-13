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
                    <img class="rounded-circle mb-2" width="150px" src="{{ auth()->user()->profile_picture ? asset(auth()->user()->profile_picture) : asset('images/profile_avatar_placeholder.png') }}" alt="Profilkép">
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

                    <hr>

                    <div class="row mt-3">
                        <h5 class="mb-3">Profilkép megváltoztatása</h5>
                        <form action="{{ route('profile.picture.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <input type="file" class="form-control" name="profile_picture" id="profile_picture" aria-label="Profilkép feltöltése" required>
                                <button class="btn btn-outline-secondary" type="submit">Feltöltés</button>
                            </div>
                        </form>
                    </div>
                    <hr>

                     <div class="row mt-3">
                        <h5>Teljes név beállítása</h5>
                        <form action="{{ route('profile.fullname.update') }}" method="POST">
                            @csrf
                             <div class="form-group">
                                <label for="full_name">Teljes név</label>
                                <input id="full_name" type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" value="{{ old('full_name', auth()->user()->full_name) }}">
                                @error('full_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Mentés</button>
                        </form>
                    </div>
                    <hr>

                    <div class="row mt-3">
                        <h5>Jelszó megváltoztatása</h5>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <div class="form-group">
                                <label class="my-2" for="current_password">Jelenlegi jelszó</label>
                                <input id="current_password" type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required>
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                    
                            <div class="form-group">
                                <label class="my-2" for="password">Új jelszó</label>
                                <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                    
                            <div class="form-group">
                                <label class="my-2" for="password_confirmation">Új jelszó megerősítése</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
                            </div>
                    
                            <button type="submit" class="btn btn-primary mt-3">Jelszó megváltoztatása</button>
                        </form>
                    </div>
                    
                    @if(session('success'))
                        <div class="mt-3">
                            <span class="alert alert-success p-2">{{Session::get('success')}}</span>
                        </div>
                    @endif                  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
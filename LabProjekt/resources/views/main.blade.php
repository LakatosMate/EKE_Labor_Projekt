@extends('layouts.app')

@section('title')
Kezdőlap
@endsection

@section('content')
  <h1>Üdvözöllek a kezdőoldalon!</h1>
  <p>Itt kezdődik a hírek.</p>

  @if (Session::has('fail'))
    <div class="mt-3">
      <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
    </div>
  @endif
@endsection

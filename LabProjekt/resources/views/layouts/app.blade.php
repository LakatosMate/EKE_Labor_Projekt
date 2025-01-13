<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title','title')</title>
 <link rel="stylesheet" href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">

    <a class="navbar-brand" href="/">Kezdőlap</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      @auth
      <li ><a class="nav-link" href="/dashboard">Irányítópult</a></li>
      <li class="nav-item"><a class="nav-link" href="/profile">Profilom</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('post.index') }}">Bejegyzés</a></li>
 @if (Auth::check() && Auth::user()->role === 'admin')
    <li  class="nav-item"><a class="nav-link" href="/admin/users">Felhasználók kezelése</a></li>
 @endif

      <li class="nav-item">
          <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="nav-link" type="submit">Kijelentkezés</button>
          </form>
      </li>
    @endauth

    @guest
      <li class="nav-item">
        <a class="nav-link"  href="{{ route('login') }}">Bejelentkezés</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">Regisztráció</a>
      </li>
    @endguest
  </ul>
  </div>
</nav>

<div class="container mt-4">

 @yield('content')

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kezdőoldal</title>
 <link rel="stylesheet" href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

 @vite('resources/js/app.js')
<body>
    <!-- Navigációs menü -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">My Laravel App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Főoldal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Szolgáltatások</a>
                        <input class="btn btn-primary" type="button" value="Input">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kapcsolat</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <h1>Üdvözlünk a Laravel alkalmazásban!</h1>
        <p>Ez egy alapértelmezett kezdőoldal Bootstrap navigációs menüvel.</p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>
</html>

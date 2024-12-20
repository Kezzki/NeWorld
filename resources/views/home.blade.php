<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NeWorld - Explore the World</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-item img {
            height: 400px;
            object-fit: cover;
        }
        .feature {
            text-align: center;
            padding: 20px;
        }
    </style>
</head>

<style>
    body {
        background-image: url('https://plus.unsplash.com/premium_photo-1681488098851-e3913f3b1908?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>

<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6ba4ff;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">NeWorld</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/countries">Countries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="text-center mb-5">
            <h1>Welcome to NeWorld</h1>
            <p class="lead">Discover countries from around the globe, learn about their culture, history, and more!</p>
        </div>

        <div id="countryCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($popularCountries as $index => $country)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <img src="{{ $country['flags']['svg'] }}" class="d-block w-100" alt="{{ $country['name']['common'] }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $country['name']['common'] }}</h5>
                        <p>Population: {{ number_format($country['population']) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#countryCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#countryCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="mt-5">
            <h2 class="text-center mb-4">Features of NeWorld</h2>
            <div class="row">
                <div class="col-md-4 feature">
                    <h4>Explore Countries</h4>
                    <p>Search and browse through all the countries in the world with detailed information.</p>
                </div>
                <div class="col-md-4 feature">
                    <h4>Learn Details</h4>
                    <p>Get population, language, currency, and even map locations for each country.</p>
                </div>
                <div class="col-md-4 feature">
                    <h4>Create Your World</h4>
                    <p>Design your own NeWorld and select the countries you’d include in it!</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

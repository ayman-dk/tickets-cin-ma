<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CinéNova') }}</title>
    <link rel="icon" href="{{ asset('images/logo1.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #690000;
            color: #1E1E1E;
            font-family: 'Poppins', sans-serif;
        }

        .navbar-cine {
            background-color: #1E1E1E !important;
            color: #FFFFFF;
        }

        .navbar-cine a {
            color: #FFFFFF;
        }

        .navbar-cine a:hover {
            color: #D72638;
        }

        .card-cine {
            background-color: #1E1E1E;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .btn-cine {
            background-color: #D72638;
            color: #FFFFFF;
            border: none;
        }

        .btn-cine:hover {
            background-color: #B31B2D;
        }

        .text-muted-cine {
            color: #D3D3D3;
        }

        .form-control {
            background-color: #FFFFFF;
            border: 1px solid #CCC;
            color: #1E1E1E;
        }

        .form-control:focus {
            border-color: #D72638;
            box-shadow: 0 0 5px #D72638;
        }

        label {
            color: #F5C518;
        }

        .table-cine thead {
            background-color: #1E1E1E;
            color: #F5C518;
        }

        .badge-cine {
            background-color: #F5C518;
            color: #000;
            padding: 0.3em 0.6em;
            border-radius: 5px;
        }

        a {
            color: #D72638;
        }

        a:hover {
            color: #B31B2D;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-[#F5F5F5]">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
    <footer style="background-color: #222831; color: #EEEEEE; padding: 30px 0; margin-top: 50px;">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h5>À propos</h5>
                <p>Découvrez notre plateforme de réservation de billets de cinéma simple et rapide, avec un large choix de films et séances.</p>
            </div>
            <div class="col-md-4 mb-3">
                <h5>Contact</h5>
                <p>Email : cinénova@gmail.com</p>
                <p>Téléphone : +212 600 123 456</p>
            </div>
            <div class="col-md-4 mb-3">
                <h5>Suivez-nous</h5>
                <a href="#" style="color: #FFD700; margin-right: 15px;">Facebook</a>
                <a href="#" style="color: #FFD700; margin-right: 15px;">Twitter</a>
                <a href="#" style="color: #FFD700;">Instagram</a>
            </div>
        </div>
        <div class="mt-3">
            <small>&copy; {{ date('Y') }} CinéNova. Tous droits réservés.</small>
        </div>
    </div>
</footer>

</body>
</html>

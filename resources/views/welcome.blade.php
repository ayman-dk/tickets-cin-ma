<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenue sur CinéNova</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="antialiased">

    {{-- Lien de connexion / dashboard en haut à droite --}}
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-50">
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-[#D72638] text-white font-semibold px-4 py-2 rounded hover:bg-[#1E1E1E] transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="bg-[#D72638] text-white font-semibold px-4 py-2 rounded hover:bg-[#1E1E1E] transition">Se connecter</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-[#D72638] text-white font-semibold px-4 py-2 rounded hover:bg-[#1E1E1E] transition">S'inscrire</a>
                    @endif
                @endauth
            </div>
        @endif

        {{-- Contenu principal --}}
        <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('/images/cinema-dark.jpg');"></div>

        <div class="relative z-10 text-center max-w-2xl px-6 py-20">
        <div style="display: flex; justify-content: center; padding: 20px; ">
            <img src="{{ asset('images/logo1.png') }}" alt="Logo" style="max-height: 90px;">
        </div>

            <h1 class="text-5xl font-extrabold text-white drop-shadow mb-6">Bienvenue sur <span class="text-red-500">CinéNova</span></h1>
            <p class="text-lg text-gray-300 mb-8 leading-relaxed">
                Explorez les derniers films, réservez vos séances, et vivez l’expérience du grand écran.
            </p><br>
            <a href="{{ route('login') }}" class="bg-red-600 hover:bg-red-700 text-white text-lg font-bold py-4 px-10 rounded shadow-lg transition">
                    Commencer
            </a>
        </div>
    </div>

</body>
</html>

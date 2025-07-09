<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex bg-gray-900 text-gray-200 font-sans">

    <div class="w-1/2 bg-cover bg-center" style="background-image: url('/images/PhotoInscription.png')">
        <!-- Image cinéma -->
    </div>

    <div class="w-1/2 flex items-center justify-center bg-gray-800">
        <div class="w-full max-w-md px-8 py-10 bg-gray-900 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold mb-6 text-center text-red-600 drop-shadow-lg">Connexion</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-5">
                    <label for="email" class="block mb-2 text-red-500 font-semibold">Email</label>
                    <input id="email" type="email" name="email" required autofocus
                        class="w-full p-3 rounded bg-gray-700 border border-red-600 placeholder-red-400 text-white focus:outline-none focus:ring-2 focus:ring-red-600" />
                </div>

                <div class="mb-5">
                    <label for="password" class="block mb-2 text-red-500 font-semibold">Mot de passe</label>
                    <input id="password" type="password" name="password" required
                        class="w-full p-3 rounded bg-gray-700 border border-red-600 placeholder-red-400 text-white focus:outline-none focus:ring-2 focus:ring-red-600" />
                </div>

                <div class="block mb-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="rounded border-gray-400 text-red-600 shadow-sm focus:ring-red-500" />
                        <span class="ml-2 text-sm text-gray-300 select-none">Se souvenir de moi</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-sm text-red-400 hover:text-red-600 underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 rounded">
                            Mot de passe oublié ?
                        </a>
                    @endif

                    <x-primary-button
                        class="bg-red-600 hover:bg-red-700 focus:ring-red-500 px-6 py-2 rounded text-white font-semibold">
                        Se connecter
                    </x-primary-button>
                </div>
            </form>

            <p class="mt-6 text-center text-gray-400">
                Pas encore inscrit ? 
                <a href="{{ route('register') }}" class="text-red-500 hover:text-red-700 underline font-semibold">
                    Créez un compte
                </a>
            </p>
        </div>
    </div>

</body>
</html>

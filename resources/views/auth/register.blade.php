<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex bg-gray-900 text-gray-200 font-sans">

    <div class="w-1/2 bg-cover bg-center" style="background-image: url('/images/PhotoInscription.png')">
        <!-- Image cinéma -->
    </div>

    <div class="w-1/2 flex items-center justify-center bg-gray-800">
        <div class="w-full max-w-md px-8 py-10 bg-gray-900 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold mb-6 text-center text-red-600 drop-shadow-lg">Inscription</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-5">
                    <label for="name" class="block mb-2 text-red-500 font-semibold">Nom</label>
                    <input id="name" type="text" name="name" required autofocus
                        class="w-full p-3 rounded bg-gray-700 border border-red-600 placeholder-red-400 text-white focus:outline-none focus:ring-2 focus:ring-red-600"
                        value="{{ old('name') }}" />
                    @error('name')
                        <p class="text-red-400 mt-2 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="block mb-2 text-red-500 font-semibold">Email</label>
                    <input id="email" type="email" name="email" required
                        class="w-full p-3 rounded bg-gray-700 border border-red-600 placeholder-red-400 text-white focus:outline-none focus:ring-2 focus:ring-red-600"
                        value="{{ old('email') }}" />
                    @error('email')
                        <p class="text-red-400 mt-2 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="block mb-2 text-red-500 font-semibold">Mot de passe</label>
                    <input id="password" type="password" name="password" required
                        class="w-full p-3 rounded bg-gray-700 border border-red-600 placeholder-red-400 text-white focus:outline-none focus:ring-2 focus:ring-red-600" />
                    @error('password')
                        <p class="text-red-400 mt-2 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block mb-2 text-red-500 font-semibold">Confirmer le mot de passe</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="w-full p-3 rounded bg-gray-700 border border-red-600 placeholder-red-400 text-white focus:outline-none focus:ring-2 focus:ring-red-600" />
                </div>

                <div class="flex items-center justify-end">
                    <a href="{{ route('login') }}"
                       class="text-sm text-red-400 hover:text-red-600 underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600 rounded">
                        Déjà inscrit ?
                    </a>

                    <button type="submit" 
                        class="ms-4 bg-red-600 hover:bg-red-700 focus:ring-red-500 px-6 py-2 rounded font-semibold text-white">
                        S'inscrire
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>

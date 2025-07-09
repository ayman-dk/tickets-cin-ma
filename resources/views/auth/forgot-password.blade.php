<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Mot de passe oublié</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen bg-gray-900 text-gray-200 font-sans flex items-center justify-center"
      style="background-image: url('/images/PhotoInscription.png'); background-size: cover; background-position: center;">

    <div class="bg-gray-900 bg-opacity-80 p-10 rounded-lg shadow-lg w-full max-w-md text-center">
        <div class="mb-6 text-gray-300 text-sm leading-relaxed">
            Mot de passe oublié ? Pas de problème. Indiquez simplement votre adresse email et nous vous enverrons un lien de réinitialisation pour choisir un nouveau mot de passe.
        </div>

        <!-- Session Status (à remplacer par ton composant) -->
        @if (session('status'))
            <div class="mb-6 font-medium text-green-500">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="text-left">
            @csrf

            <label for="email" class="block mb-1 text-gray-300 font-semibold">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                class="block w-full p-2 rounded border border-gray-600 bg-gray-800 text-gray-200 mb-4" />
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <button type="submit"
                class="w-full bg-red-600 hover:bg-red-700 focus:ring-red-500 px-6 py-2 rounded font-semibold text-white">
                Envoyer le lien de réinitialisation
            </button>
        </form>
    </div>

</body>
</html>

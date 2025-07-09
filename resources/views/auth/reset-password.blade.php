<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Réinitialisation du mot de passe</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen bg-gray-900 text-gray-200 font-sans flex items-center justify-center" 
      style="background-image: url('/images/PhotoInscription.png'); background-size: cover; background-position: center;">

    <div class="bg-gray-900 bg-opacity-80 p-10 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold mb-6 text-center text-red-600 drop-shadow-lg">Réinitialisation du mot de passe</h2>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-5">
                <label for="email" class="block mb-2 text-red-500 font-semibold">Email</label>
                <input id="email" type="email" name="email" required autofocus
                    class="w-full p-3 rounded bg-gray-700 border border-red-600 placeholder-red-400 text-white focus:outline-none focus:ring-2 focus:ring-red-600"
                    value="{{ old('email', $request->email) }}" />
                @error('email')
                    <p class="text-red-400 mt-2 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="block mb-2 text-red-500 font-semibold">Nouveau mot de passe</label>
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
                @error('password_confirmation')
                    <p class="text-red-400 mt-2 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" 
                    class="bg-red-600 hover:bg-red-700 focus:ring-red-500 px-6 py-2 rounded font-semibold text-white">
                    Réinitialiser le mot de passe
                </button>
            </div>
        </form>
    </div>

</body>
</html>

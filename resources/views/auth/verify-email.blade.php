<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Vérification d'email</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen bg-gray-900 text-gray-200 font-sans flex items-center justify-center"
      style="background-image: url('/images/PhotoInscription.png'); background-size: cover; background-position: center;">

    <div class="bg-gray-900 bg-opacity-80 p-10 rounded-lg shadow-lg w-full max-w-md text-center">
        <div class="mb-6 text-gray-300 text-sm leading-relaxed">
            Merci pour votre inscription ! Avant de commencer, veuillez vérifier votre adresse email en cliquant sur le lien que nous venons de vous envoyer.  
            Si vous n'avez pas reçu l'email, nous vous en enverrons un nouveau avec plaisir.
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-6 font-medium text-green-500">
                Un nouveau lien de vérification a été envoyé à l'adresse email fournie lors de votre inscription.
            </div>
        @endif

        <div class="flex flex-col sm:flex-row sm:justify-between gap-4">
            <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
                @csrf
                <button type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 focus:ring-red-500 px-6 py-2 rounded font-semibold text-white">
                    Renvoyer l'email de vérification
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
                @csrf
                <button type="submit"
                    class="underline text-sm text-gray-400 hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600 px-4 py-2">
                    Se déconnecter
                </button>
            </form>
        </div>
    </div>

</body>
</html>

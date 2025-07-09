<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation Réservation</title>
</head>
<body>
    <p>Bonjour {{ $reservation->user->name }},</p>

    <p>Merci pour votre réservation. Voici votre reçu et votre ticket :</p>

    <ul>
        <li><strong>Film :</strong> {{ $reservation->seance->film->titre }}</li>
        <li><strong>Date :</strong> {{ $reservation->seance->date_heure }}</li>
        <li><strong>Montant total :</strong> {{ $reservation->montant_total }} DHS</li>
    </ul>

    <p><strong>Votre ticket (QR code) :</strong></p>
    <p><img src="{{ $qrUrl }}" alt="QR Code de votre ticket"></p>

    <p>Présentez ce QR code à l'entrée de la salle.</p>

    <p>Bonne séance !</p>
</body>
</html>

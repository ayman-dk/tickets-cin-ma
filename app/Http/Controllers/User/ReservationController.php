<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Seance;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\ReservationConfirmed;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['seance.film', 'seance.salle', 'categories'])
            ->where('user_id', auth()->id())
            ->orderByDesc('date_reservation')
            ->get();
        return view('user.reservations.index', compact('reservations'));
    }



    public function create(Seance $seance)
    {
        $seance->load(['film', 'salle']);
        $categories = Category::all(); 

       return view('user.reservations.create', compact('seance', 'categories'));
    }



public function store(Request $request)
{
    $request->validate([
        'seance_id' => 'required|exists:seances,id',
        'categories' => 'required|array',
        'categories.*.category_id' => 'required|exists:categories,id',
        'categories.*.quantite' => 'required|integer|min:0',
    ]);

    // Filtrer uniquement les catégories avec quantité > 0
    $categories = collect($request->categories)
        ->filter(fn($cat) => isset($cat['quantite']) && $cat['quantite'] > 0)
        ->values();

    if ($categories->isEmpty()) {
        return back()
            ->withErrors(['categories' => 'Veuillez sélectionner au moins une catégorie avec une quantité supérieure à 0.'])
            ->withInput();
    }

    DB::transaction(function () use ($request, $categories) {
        $seance = Seance::with('film')->findOrFail($request->seance_id);

        // Calcul du montant total
        $total = 0;
        foreach ($categories as $cat) {
            $category = Category::findOrFail($cat['category_id']);
            $total += $category->prix * $cat['quantite'];
        }

        // Création de la réservation
        $reservation = Reservation::create([
            'user_id' => auth()->id(),
            'seance_id' => $seance->id,
            'film_id' => $seance->film_id,
            'statut' => 'confirmée',
            'date_reservation' => now(),
            'montant_total' => $total,
            'paiement_confirme' => false,
            'moyen_paiement' => null,
        ]);

        // Préparation et insertion dans la table pivot
        $pivotData = [];
        foreach ($categories as $cat) {
            $pivotData[$cat['category_id']] = ['quantite' => $cat['quantite']];
        }

        $reservation->categories()->attach($pivotData);
    });

    return redirect()->route('user.reservations.index')->with('success', 'Réservation effectuée avec succès.');
}



    public function show($id)
    {
        $reservation = Reservation::with(['seance.film', 'seance.salle', 'categories.category'])->findOrFail($id);

        if ($reservation->user_id !== auth()->id()) {
            abort(403);
        }
        return view('user.reservations.show', compact('reservation'));
    }



    public function destroy($id)
    {
        $reservation = Reservation::with('seance')->findOrFail($id);

        if ($reservation->user_id !== auth()->id()) {
            abort(403);
        }
        if ($reservation->seance->date_heure < now()) {
            return redirect()->back()->with('error', 'Impossible d\'annuler une réservation passée.');
        }
        $reservation->update(['statut' => 'annulée']);

        return redirect()->route('user.reservations.index')->with('success', 'Réservation annulée.');
    }




    public function payer(Request $request, $id)
    {
    $request->validate([
        'moyen_paiement' => 'required|in:Visa,PayPal,Espèces',
    ]);

    $reservation = Reservation::where('user_id', auth()->id())->findOrFail($id);

    if ($reservation->paiement_confirme) {
        return back()->with('info', 'Le paiement est déjà confirmé.');
    }

    // Calculer le total des places réservées
    $totalPlaces = $reservation->categories()->sum('reservation_categories.quantite');

    $seance = $reservation->seance;

    if ($seance->places_disponibles < $totalPlaces) {
        return back()->with('error', 'Il n’y a plus assez de places disponibles pour cette séance.');
    }

    // Mise à jour du paiement
    $reservation->update([
        'paiement_confirme' => true,
        'moyen_paiement' => $request->moyen_paiement,
    ]);

    // Diminuer les places disponibles
    $seance->decrement('places_disponibles', $totalPlaces);

    // Envoi de l'email avec le QR code
    Mail::to($reservation->user->email)->send(new ReservationConfirmed($reservation));

    return back()->with('success', 'Paiement confirmé avec succès.');
    }

}

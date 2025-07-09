<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seance;
use App\Models\Film;
use App\Models\Salle;

class SeanceController extends Controller
{
    /**
     * Affiche la liste des séances.
     */
    public function index()
    {
        $seances = Seance::with(['film', 'salle'])->get();
        return view('admin.seances.index', compact('seances'));
    }

    /**
     * Affiche le formulaire de création de séance.
     */
    public function create()
    {
        $films = Film::all();
        $salles = Salle::all();
        return view('admin.seances.create', compact('films', 'salles'));
    }

    /**
     * Enregistre une nouvelle séance.
     */
    public function store(Request $request)
    {
    $validated = $request->validate([
        'film_id' => 'required|exists:films,id',
        'salle_id' => 'required|exists:salles,id',
        'date_heure' => 'required|date|after:now',
    ]);

    $salle = Salle::findOrFail($validated['salle_id']);
    $validated['places_disponibles'] = $salle->nb_places;

    Seance::create($validated);

    return redirect()->route('admin.seances.index')->with('success', 'Séance ajoutée avec succès.');
    }


    /**
     * Affiche une séance spécifique.
     */
    public function show($id)
    {
        $seance = Seance::with(['film', 'salle'])->findOrFail($id);
        return view('admin.seances.show', compact('seance'));
    }

    /**
     * Affiche le formulaire d'édition de séance.
     */
    public function edit($id)
    {
        $seance = Seance::findOrFail($id);
        $films = Film::all();
        $salles = Salle::all();

        return view('admin.seances.edit', compact('seance', 'films', 'salles'));
    }

    /**
     * Met à jour une séance existante.
     */
    public function update(Request $request, $id)
    {
        $seance = Seance::findOrFail($id);

        $validated = $request->validate([
            'film_id' => 'required|exists:films,id',
            'salle_id' => 'required|exists:salles,id',
            'date_heure' => 'required|date',
        ]);

        $seance->update($validated);

        return redirect()->route('admin.seances.index')->with('success', 'Séance mise à jour.');
    }

    /**
     * Supprime une séance.
     */
    public function destroy($id)
    {
        Seance::findOrFail($id)->delete();

        return redirect()->route('admin.seances.index')->with('success', 'Séance supprimée.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $film = Film::all();
        return view('admin.films.index', compact('film'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.films.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'duree' => 'required|integer',
        'classification' => 'nullable|string|max:10',
        'realisateur' => 'nullable|string|max:255',
        'acteurs' => 'nullable|string',
        'genres' => 'nullable|string',
        'affiche_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'date_sortie' => 'nullable|date',
    ]);

    if ($request->hasFile('affiche_url')) {
        $imagePath = $request->file('affiche_url')->store('affiches', 'public');
        $validated['affiche_url'] = 'storage/' . $imagePath;
    }

    $validated['est_actif'] = $request->has('est_actif');

    Film::create($validated);

    return redirect()->route('admin.films.index')->with('success', 'Film ajouté avec succès.');
}
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $film = Film::findOrFail($id);
        return view('admin.films.show', compact('film'));;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $film = Film::findOrFail($id);
        return view('admin.films.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $film = Film::findOrFail($id);

    $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'duree' => 'required|integer',
        'classification' => 'nullable|string|max:10',
        'realisateur' => 'nullable|string|max:255',
        'acteurs' => 'nullable|string',
        'genres' => 'nullable|string',
        'affiche_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'date_sortie' => 'nullable|date',
    ]);

    if ($request->hasFile('affiche_url')) {
        $imagePath = $request->file('affiche_url')->store('affiches', 'public');
        $validated['affiche_url'] = 'storage/' . $imagePath;
    }

    $validated['est_actif'] = $request->has('est_actif');

    $film->update($validated);

    return redirect()->route('admin.films.index')->with('success', 'Film modifié avec succès.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $film = Film::findOrFail($id)->delete();
        return redirect()->route('admin.films.index')->with('success', 'Film Supprimé.');
    }

    public function dashboardA()
    {
        $filmsAvecSeance = Film::whereHas('seances')->take(5)->get();

        $filmsActuellementAffiche = Film::whereHas('seances', function ($q) {
        $q->where('date_heure', '>=', now());
        })->get();

        $filmsProchainement = Film::where('est_actif', true)
        ->whereDoesntHave('seances')
        ->get();

        return view('admin.dashboardA', compact('filmsAvecSeance','filmsActuellementAffiche','filmsProchainement'));
    }

}

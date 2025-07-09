<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::where('est_actif', true)->latest()->get();
        return view('user.films.index', compact('films'));
    }

    public function show($id)
    {
        $film = Film::where('est_actif', true)->findOrFail($id);
        return view('user.films.show', compact('film'));
    }

    public function dashboardU()
    {
        $filmsAvecSeance = Film::whereHas('seances')->take(5)->get();

        $filmsActuellementAffiche = Film::whereHas('seances', function ($q) {
        $q->where('date_heure', '>=', now());
        })->get();

        $filmsProchainement = Film::where('est_actif', true)
        ->whereDoesntHave('seances')
        ->get();

        return view('user.dashboardU', compact('filmsAvecSeance','filmsActuellementAffiche','filmsProchainement'));
    }

}

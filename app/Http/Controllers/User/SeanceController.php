<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Seance;

class SeanceController extends Controller
{
    public function index()
    {
        $seances = Seance::with(['film', 'salle'])->get();
        return view('user.seances.index', compact('seances'));
    }

    public function show($id)
    {
        $seance = Seance::with(['film', 'salle'])->findOrFail($id);
        return view('user.seances.show', compact('seance'));
    }
}

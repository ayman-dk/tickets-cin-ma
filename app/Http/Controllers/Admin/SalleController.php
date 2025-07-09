<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salle;


class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salles = Salle::all();
        return view('admin.salles.index', compact('salles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.salles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'nb_places' => 'required|integer|min:1',
        ]);

        Salle::create($validated);
        return redirect()->route('admin.salles.index')->with('success', 'Salle ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $salle = Salle::findOrFail($id);
        return view('admin.salles.index', compact('salle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $salle = Salle::findOrFail($id);
        return view('admin.salles.edit', compact('salle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $salle = Salle::findOrFail($id);

        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'nb_places' => 'required|integer|min:1',
        ]);

        $salle->update($validated);

        return redirect()->route('admin.salles.index')->with('success', 'Salle modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $salle = Salle::findOrFail($id)->delete();

        return redirect()->route('admin.salles.index')->with('success', 'Salle Supprimé.');
    }
}

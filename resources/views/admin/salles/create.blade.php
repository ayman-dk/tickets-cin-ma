@extends('layouts.app')

@section('title', 'Ajouter une Salle')

@section('content')
<div class="container my-5">
    <div class="card-cine">
        <h2 class="mb-4">Ajouter une salle</h2>

        <form action="{{ route('admin.salles.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nom">Nom de la salle</label>
                <input type="text" name="nom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nb_places">Nombre de places</label>
                <input type="number" name="nb_places" class="form-control" required min="1">
            </div>

            <button type="submit" class="btn btn-cine">Enregistrer</button>
            <a href="{{ route('admin.salles.index') }}" class="btn btn-secondary">Retour</a>
        </form>
    </div>
</div>
@endsection

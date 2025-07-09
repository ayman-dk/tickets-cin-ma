@extends('layouts.app')

@section('title', 'Modifier Salle')

@section('content')
<div class="container my-5">
    <div class="card-cine">
        <h2 class="mb-4">Modifier : {{ $salle->nom }}</h2>

        <form action="{{ route('admin.salles.update', $salle) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nom">Nom de la salle</label>
                <input type="text" name="nom" class="form-control" value="{{ $salle->nom }}" required>
            </div>

            <div class="mb-3">
                <label for="nb_places">Nombre de places</label>
                <input type="number" name="nb_places" class="form-control" value="{{ $salle->nb_places }}" required min="1">
            </div>

            <button type="submit" class="btn btn-cine">Mettre à jour</button>
            <a href="{{ route('admin.salles.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection

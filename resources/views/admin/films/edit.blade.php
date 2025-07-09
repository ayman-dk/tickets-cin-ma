@extends('layouts.app')

@section('title', 'Modifier un film')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Modifier le film</h1>

    <form method="POST" action="{{ route('admin.films.update', $film) }}" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" value="{{ old('titre', $film->titre ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" required>{{ old('description', $film->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Durée (en minutes)</label>
            <input type="number" name="duree" class="form-control" value="{{ old('duree', $film->duree ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Classification</label>
            <input type="text" name="classification" class="form-control" value="{{ old('classification', $film->classification ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Acteurs</label>
            <textarea name="acteurs" class="form-control">{{ old('acteurs', $film->acteurs ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Réalisateur</label>
            <input type="text" name="realisateur" class="form-control" value="{{ old('realisateur', $film->realisateur ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Date de sortie</label>
            <input type="date" name="date_sortie" class="form-control" value="{{ old('date_sortie', isset($film->date_sortie) ? $film->date_sortie->format('Y-m-d') : '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Genres</label>
            <input type="text" name="genres" class="form-control" value="{{ old('genres', $film->genres ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Affiche (image)</label>
            <input type="file" name="affiche_url" class="form-control">
            @if ($film->affiche_url)
                <div class="mt-2">
                    <p class="mb-1">Image actuelle :</p>
                    <img src="{{ asset($film->affiche_url) }}" alt="Affiche du film" class="img-thumbnail" width="150">
                </div>
            @endif
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="est_actif" id="est_actif"
                {{ old('est_actif', $film->est_actif ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="est_actif">Film actif</label>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('admin.films.index') }}" class="btn btn-secondary">Retour</a>
        </div>
    </form>
</div>
@endsection

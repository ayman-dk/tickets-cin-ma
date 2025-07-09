@extends('layouts.app')

@section('title', 'Ajouter un film')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Ajouter un film</h1>

    <form method="POST" action="{{ route('admin.films.store') }}" enctype="multipart/form-data" class="card-cine">
        @csrf

        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" value="{{ old('titre') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Durée (en minutes)</label>
            <input type="number" name="duree" class="form-control" value="{{ old('duree') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Classification</label>
            <input type="text" name="classification" class="form-control" value="{{ old('classification') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Acteurs</label>
            <textarea name="acteurs" class="form-control">{{ old('acteurs') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Réalisateur</label>
            <input type="text" name="realisateur" class="form-control" value="{{ old('realisateur') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Date de sortie</label>
            <input type="date" name="date_sortie" class="form-control" value="{{ old('date_sortie') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Genres</label>
            <input type="text" name="genres" class="form-control" value="{{ old('genres') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Affiche (image)</label>
            <input type="file" name="affiche_url" class="form-control">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="est_actif" id="est_actif" {{ old('est_actif') ? 'checked' : '' }}>
            <label class="form-check-label" for="est_actif">Film actif</label>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('admin.films.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection

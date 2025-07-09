@extends('layouts.app')

@section('title', 'Ajouter une séance')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Ajouter une Séance</h1>

    <form method="POST" action="{{ route('admin.seances.store') }}">
        @csrf

        <div class="mb-3">
            <label>Film</label>
            <select name="film_id" class="form-control" required>
                @foreach($films as $film)
                    <option value="{{ $film->id }}">{{ $film->titre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Salle</label>
            <select name="salle_id" class="form-control" required>
                @foreach($salles as $salle)
                    <option value="{{ $salle->id }}">{{ $salle->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Date & Heure</label>
            <input type="datetime-local" name="date_heure" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>
@endsection

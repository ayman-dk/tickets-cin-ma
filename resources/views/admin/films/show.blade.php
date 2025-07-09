@extends('layouts.app')

@section('title', $film->titre)

@section('content')
<div class="container my-5">
    <div class="card-cine d-flex flex-column flex-md-row">
        <!-- Affiche du film -->
        <div class="col-md-4">
            <img src="{{ asset($film->affiche_url) }}" alt="Affiche du film" class="rounded shadow" style="width: 250px; height: 370px; object-fit: cover;">
        </div>
        <!-- Détails du film -->
        <div>
            <h1 class="mb-3" style="color: #FFD700;">{{ $film->titre }}</h1>

            <p class="text-muted-cine mb-2">
                <strong>Genres :</strong> {{ $film->genres }}
            </p>
            <p class="text-muted-cine mb-2">
                <strong>Durée :</strong> {{ $film->duree }} min
            </p>
            <p class="text-muted-cine mb-2">
                <strong>Classification :</strong>
                <span class="badge-cine">{{ $film->classification ?? 'Non spécifiée' }}</span>
            </p>
            <p class="text-muted-cine mb-2">
                <strong>Réalisateur :</strong> {{ $film->realisateur ?? '-' }}
            </p>
            <p class="text-muted-cine mb-2">
                <strong>Acteurs :</strong> {{ $film->acteurs ?? '-' }}
            </p>
            <p class="text-muted-cine mb-2">
                <strong>Sortie :</strong> {{ $film->date_sortie->format('Y-m-d') ?? '-' }}
            </p>

            <p class="text-muted-cine mt-4">{{ $film->description }}</p>

            <p class="mt-4">
                <strong>Statut :</strong>
                @if($film->est_actif)
                    <span class="badge bg-success">Actif</span>
                @else
                    <span class="badge bg-danger">Inactif</span>
                @endif
            </p>
        </div>
    </div>

    <!-- Séances du film -->
    <div class="card-cine">
        <h3 class="mb-3" style="color: #FFD700;">Séances programmées</h3>

        @if($film->seances->count())
            <table class="table table-dark table-striped table-cine text-white">
                <thead>
                    <tr>
                        <th>Date & Heure</th>
                        <th>Salle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($film->seances as $seance)
                        <tr>
                            <td>{{ $seance->date_heure }}</td>
                            <td>{{ $seance->salle->nom }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-muted-cine">Aucune séance programmée pour ce film.</p>
        @endif
    </div>

    <a href="{{ route('admin.films.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>
@endsection

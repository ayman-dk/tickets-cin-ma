@extends('layouts.app')

@section('title', $film->titre)

@section('content')
<div class="container my-5">
    <div class="card-cine d-flex flex-column flex-md-row mb-4">
        <!-- Affiche du film -->
        <div class="col-md-4 mb-3 mb-md-0">
            <img src="{{ asset($film->affiche_url) }}" alt="Affiche du film" class="rounded shadow" style="width: 250px; height: 370px; object-fit: cover;">
        </div>

        <!-- Détails du film -->
        <div class="ps-md-4">
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
        </div>
    </div>

    <!-- Séances -->
    <div class="card-cine">
        <h3 class="mb-3" style="color: #FFD700;">Séances disponibles</h3>

        @if($film->seances->count())
            <table class="table table-dark table-striped table-cine text-white">
                <thead>
                    <tr>
                        <th>Date & Heure</th>
                        <th>Salle</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($film->seances as $seance)
                        <tr>
                            <td>{{ $seance->date_heure }}</td>
                            <td>{{ $seance->salle->nom }}</td>
                            <td>
                                <a href="{{ route('user.reservations.create',$seance) }}" class="btn btn-sm btn-success">Réserver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-muted-cine">Aucune séance disponible pour ce film.</p>
        @endif
    </div>

    <a href="{{ route('user.films.index') }}" class="btn btn-secondary mt-4">← Retour aux films</a>
</div>
@endsection

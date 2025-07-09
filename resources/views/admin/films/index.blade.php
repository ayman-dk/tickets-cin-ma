@extends('layouts.app')

@section('title', 'Liste des films')

@section('content')
<div class="container my-5">
    <div class="card-cine p-4">
    <h1 style="color: white;">Liste des Films</h1><br>

    <a href="{{ route('admin.films.create') }}" class="btn btn-cine mb-3">+ Ajouter un film</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-dark table-dark-cine text-white">
        <thead class="table-dark">
            <tr>
                <th>Affiche</th>
                <th>Titre</th>
                <th>Durée</th>
                <th>Classification</th>
                <th>Genres</th>
                <th>Réalisateur</th>
                <th>Acteurs</th>
                <th>Date Sortie</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($film as $film)
            <tr>
                <td>
                    @if($film->affiche_url)
                        <img src="{{ asset($film->affiche_url) }}" alt="Affiche du film" width="80">
                    @else
                        <span class="text-muted">Aucune</span>
                    @endif
                </td>
                <td>{{ $film->titre }}</td>
                <td>{{ $film->duree }} min</td>
                <td>{{ $film->classification ?? '-' }}</td>
                <td>{{ $film->genres ?? '-' }}</td>
                <td>{{ $film->realisateur ?? '-' }}</td>
                <td>{{ Str::limit($film->acteurs, 50) }}</td>
                <td>{{ $film->date_sortie }}</td>
                <td>
                    @if($film->est_actif)
                        <span class="badge bg-success">Actif</span>
                    @else
                        <span class="badge bg-danger">Inactif</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.films.edit', $film) }}" class="btn btn-sm btn-warning">Modifier</a>
                    <a href="{{ route('admin.films.show', $film) }}" class="btn btn-sm btn-secondary">Détails</a>
                    <form action="{{ route('admin.films.destroy', $film) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ce film ?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection

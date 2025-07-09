@extends('layouts.app')

@section('title', 'Gestion des Séances')

@section('content')
<div class="container my-5">
    <div class="card-cine p-4">
        <h2 style="color: #FFD700;">Séances enregistrées</h2><br>

        <a href="{{ route('admin.seances.create') }}" class="btn btn-cine mb-3">
            + Ajouter une séance
        </a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

    <table class="table table-bordered table-dark table-dark-cine text-white">
    <thead>
        <tr>
            <th>Film</th>
            <th>Salle</th>
            <th>Date & Heure</th>
            <th>Nombre Places disponibles</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($seances as $seance)
        <tr>
            <td>{{ $seance->film->titre }}</td>
            <td>{{ $seance->salle->nom }}</td>
            <td>{{ $seance->date_heure }}</td>
            <td>{{ $seance->places_disponibles }}</td>
            <td>
                <a href="{{ route('admin.seances.edit', $seance) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('admin.seances.destroy', $seance) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette séance ?')">
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

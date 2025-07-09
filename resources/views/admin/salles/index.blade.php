@extends('layouts.app')

@section('title', 'Gestion des Salles')

@section('content')
<div class="container my-5">
    <div class="card-cine p-4">
        <h2 style="color: white;">Salles enregistrées</h2><br>

        <a href="{{ route('admin.salles.create') }}" class="btn btn-cine mb-3">
            + Ajouter une salle
        </a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-dark table-dark-cine text-white">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Nombre de places</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($salles as $salle)
                    <tr>
                        <td>{{ $salle->nom }}</td>
                        <td>{{ $salle->nb_places }}</td>
                        <td>
                            <a href="{{ route('admin.salles.edit', $salle) }}" class="btn btn-sm btn-secondary">Modifier</a>
                            <form action="{{ route('admin.salles.destroy', $salle) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette salle ?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-muted-cine text-center">Aucune salle disponible.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Catégories')

@section('content')
<div class="container my-5">
    <div class="card-cine p-4">
        <h2 style="color: #FFD700;">Liste des catégories</h2><br>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-cine mb-3">+ Nouvelle catégorie</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-dark table-striped table-cine text-white">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix (DHS)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                    <tr>
                        <td>{{ $cat->nom }}</td>
                        <td>{{ $cat->prix }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $cat) }}" class="btn btn-sm btn-warning">Modifier</a>
                            <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette catégorie ?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

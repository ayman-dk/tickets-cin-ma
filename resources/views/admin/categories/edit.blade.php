@extends('layouts.app')

@section('title', 'Modifier une catégorie')

@section('content')
<div class="container my-4">
    <div class="card-cine p-4">
        <h2 style="color: #FFD700;">✏️ Modifier la catégorie</h2>

        <form method="POST" action="{{ route('admin.categories.update', $category) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $category->nom) }}" required>
            </div>

            <div class="mb-3">
                <label for="prix">Prix</label>
                <input type="number" step="0.01" name="prix" id="prix" class="form-control" value="{{ old('prix', $category->prix) }}" required>
            </div>

            <button type="submit" class="btn btn-cine">Enregistrer</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection

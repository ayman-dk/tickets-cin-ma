@extends('layouts.app')

@section('title', 'Réserver')

@section('content')
<div class="container my-5 text-white">
    <div class="card-cine p-4">
        <h2 class="mb-4" style="color: #FFD700;">Réserver pour {{ $seance->film->titre }}</h2>

        <p><strong>Salle :</strong> {{ $seance->salle->nom }}</p>
        <p><strong>Date :</strong> {{ $seance->date_heure }}</p>

        <form action="{{ route('user.reservations.store') }}" method="POST">
            @csrf
            
            <input type="hidden" name="seance_id" value="{{ $seance->id }}">

            <h4 class="mt-4 mb-2" style="color: #00ADB5;">Choisissez vos catégories :</h4>
            @foreach($categories as $category)
                <div class="mb-3">
                    <label>
                        <strong>{{ $category->nom }}</strong> - {{ $category->prix }} DHS
                    </label>
                    <input type="hidden" name="categories[{{ $loop->index }}][category_id]" value="{{ $category->id }}">
                    <input type="number" name="categories[{{ $loop->index }}][quantite]" class="form-control w-25" placeholder="Quantité" min="0" value="{{ old('categories.' . $loop->index . '.quantite', 0) }}">

                </div>
            @endforeach

            <button type="submit" class="btn btn-cine mt-3">Confirmer la réservation</button>
            <a href="{{ route('user.films.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection

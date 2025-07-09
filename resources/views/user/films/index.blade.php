@extends('layouts.app')

@section('title', 'Tous les Films')

@section('content')
<style>
    body {
        background-color: #121212;
        color: #fff;
        font-family: 'Poppins', sans-serif;
    }
    .film-card {
        background-color: #363636;
        border-radius: 10px;
        overflow: hidden;
        position: relative;
        transition: transform 0.3s ease;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        height: 380px;
    }
    .film-card:hover {
        transform: scale(1.05);
    }
    .film-card img {
        width: 100%;
        height: 270px;
        object-fit: cover;
    }
    .film-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 80%;
        background-color: rgba(0, 0, 0, 0.6);
        opacity: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: opacity 0.3s ease;
    }
    .film-card:hover .film-overlay {
        opacity: 1;
    }
    .card-footer {
        background-color: #363636;
        text-align: center;
        padding: 10px;
    }
    .card-footer h6 {
        margin-bottom: 5px;
        color: #fff;
    }
    .card-footer .text-muted {
        color: #B3B3B3 !important;
    }
</style>

<div class="container py-4">
    <h2 class="text-white fw-bold mb-4" style="font-size: 2rem;">Tous les Films</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
        @forelse ($films as $film)
            <div class="col mb-4">
                <div class="film-card">
                    <img src="{{ asset($film->affiche_url) }}" alt="{{ $film->titre }}">

                    <div class="film-overlay">
                        <a href="{{ route('user.films.show', $film) }}" class="btn btn-light fw-bold">Voir les séances</a>
                    </div>

                    <div class="card-footer">
                        <h6>{{ $film->titre }}</h6>
                        <div class="small text-muted">
                            {{ $film->genres ?? 'Genre inconnu' }}
                            @if ($film->classification)
                                <span class="badge bg-warning text-dark">{{ $film->classification }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Aucun film trouvé.</p>
        @endforelse
    </div>
</div>
@endsection

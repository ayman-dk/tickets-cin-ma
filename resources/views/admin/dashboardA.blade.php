@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<style>
    body {
        background-color: #121212;
        color: #fff;
        font-family: 'Poppins', sans-serif;
    }
    .section-title {
        color: white;
        font-size: 1.5rem;
        margin: 20px 0;
        border-left: 4px solid #E50914;
        padding-left: 10px;
    }
    .film-card {
        background-color: #363636;
        border-radius: 10px;
        overflow: hidden;
        margin: 0 10px;
        width: 200px;
        flex-shrink: 0;
        box-shadow: 0 0 10px rgba(0,0,0,0.5);
        position: relative;
        transition: transform 0.3s ease;
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
    .scroll-row {
        display: flex;
        overflow-x: auto;
        padding: 10px;
    }
    .scroll-row::-webkit-scrollbar {
        height: 6px;
    }
    .scroll-row::-webkit-scrollbar-thumb {
        background: #E50914;
        border-radius: 10px;
    }
    .card-footer {
        background-color: #363636;
        color:#B3B3B3 !important;
        text-align: center;
        padding: 10px;
    }
    .card-footer h6 {
        margin-bottom: 5px;
        color: #fff;
    }
    .card-footer .badge {
        font-size: 0.75rem;
    }
    .card-footer .text-muted {
        color: #B3B3B3 !important;
    }
    .object-fit-cover {
    object-fit: cover;
    }
</style>

<div class="container">

{{--  Slider principal (max 5 films + espacement) --}}
<div class="container mt-5 mb-5">
    <div id="heroCarousel" class="carousel slide shadow-lg rounded overflow-hidden" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($filmsAvecSeance->take(5) as $index => $film)
                <div class="carousel-item {{ $index === 3 ? 'active' : '' }}">
                    <div class="position-relative" style="height: 450px;">
                        <img src="{{ asset($film->affiche_url) }}" class="d-block w-100 h-100 object-fit-cover" alt="Affiche de {{ $film->titre }}">

                        {{-- Overlay sombre --}}
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50"></div>

                        {{-- Contenu du slider --}}
                        <div class="carousel-caption d-flex flex-column justify-content-center h-100 text-start px-5">
                            <h2 class="text-white fw-bold display-5">{{ $film->titre }}</h2>
                            <p class="text-light d-none d-md-block" style="max-width: 600px;">
                                {{ Str::limit($film->description, 120) ?? 'Film à découvrir bientôt sur grand écran.' }}
                            </p>
                            <a href="{{ route('admin.films.show', $film->id) }}" class="btn btn-danger mt-3 fw-semibold">
                                 Voir les séances
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Contrôles --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

    {{--  Section "Actuellement à l'affiche" --}}
    <h2 class="section-title"> Actuellement à l'affiche</h2>
    <div class="scroll-row mb-4">
        @forelse($filmsActuellementAffiche as $film)
            <div class="film-card">
                <img src="{{ asset($film->affiche_url) }}" alt="Affiche {{ $film->titre }}">

                <div class="film-overlay">
                    <a href="{{ route('admin.films.show', $film) }}" class="btn btn-light fw-bold">Voir les séances</a>
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
        @empty
            <p class="text-muted">Aucun film actuellement à l'affiche.</p>
        @endforelse
    </div><br>

    {{--  Section "Prochainement" --}}
    <h2 class="section-title"> Prochainement</h2>
    <div class="scroll-row">
        @forelse($filmsProchainement as $film)
            <div class="film-card">
                <img src="{{ asset($film->affiche_url) }}" alt="Affiche {{ $film->titre }}">

                <div class="film-overlay">
                    <a href="{{ route('admin.films.show', $film) }}" class="btn btn-light fw-bold">Voir les infos</a>
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
        @empty
            <p class="text-muted">Aucun film annoncé prochainement.</p>
        @endforelse
    </div>
</div>
@endsection

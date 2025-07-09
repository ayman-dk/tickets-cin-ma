<style>
.popup-paiement {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.7);
    display: flex; align-items: center; justify-content: center;
    z-index: 1000;
}
.popup-content {
    background: #1E1E1E;
    color: #FFFFFF;
    padding: 20px;
    border-radius: 10px;
    width: 90%;
    max-width: 400px;
    box-shadow: 0 0 20px #000;
}
.d-none {
    display: none !important;
}
</style>

@extends('layouts.app')

@section('title', 'Mes Réservations')

@section('content')
<div class="container my-5 text-white">
    <div class="card-cine p-4">
        <h2 class="mb-4" style="color: #FFD700;">Mes Réservations</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($reservations->isEmpty())
            <p  style="color:rgba(255, 255, 255, 0.68);">Aucune réservation pour le moment.</p>
        @else
            @foreach($reservations as $reservation)
                <div class="border-bottom py-3 mb-3">
                    <h5 style="color: #00ADB5;">🎬 {{ $reservation->seance->film->titre }}</h5>
                    <p><strong>Salle :</strong> {{ $reservation->seance->salle->nom }}</p>
                    <p><strong>Date séance :</strong> {{ $reservation->seance->date_heure }}</p>
                    <p><strong>Date réservation :</strong> {{ $reservation->date_reservation }}</p>
                    <p><strong>Statut :</strong> 
                        <span class="badge {{ $reservation->statut == 'confirmée' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($reservation->statut) }}
                        </span>
                    </p>

                    <ul>
                        @foreach ($reservation->categories as $category)
                        <p>Catégorie : {{ $category->nom }} - Quantité : {{ $category->pivot->quantite }}</p>
                        @endforeach
                    </ul>

                    @if($reservation->statut == 'confirmée' && $reservation->seance->date_heure > now() )
                        <form action="{{ route('user.reservations.destroy', $reservation) }}" method="POST" onsubmit="return confirm('Annuler cette réservation ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Annuler</button>
                        </form>
                    @if(!$reservation->paiement_confirme)
                        <button class="btn btn-success btn-sm" onclick="ouvrirPopupPaiement('{{ $reservation->id }}', '{{ $reservation->montant_total }}')">
                        Confirmer Paiement
                        </button>

                        {{-- Formulaire pop-up  --}}
                        <div class="popup-paiement d-none" id="popup-paiement-{{ $reservation->id }}">
                        <div class="popup-content">
                        <h4>Détail de Paiement</h4>
                        <p><strong>Montant à payer :</strong> {{ $reservation->montant_total }} DHS</p>
                        <p><small>{{ now()->format('l, F j, Y H:i:s') }}</small></p>

                    <form method="POST" action="{{ route('user.reservations.payer', $reservation->id) }}">
                    @csrf

                <div class="mb-2">
                    <label for="moyen_paiement">Modes de paiement :</label>
                    <select name="moyen_paiement" id="moyen_paiement" class="form-control" required>
                        <option value="">-- Choisir --</option>
                        <option value="Visa">Visa,mastercard,CMI</option>
                    </select>
                </div>

                {{-- Champs paiement par carte, affichés uniquement si Visa sélectionné --}}
                <div id="carte-details" style="display:none;">
                    <div class="mb-2">
                        <label for="nom_porteur">Nom du porteur de la carte</label>
                        <input type="text" id="nom_porteur" name="nom_porteur" class="form-control" placeholder="Nom sur la carte">
                    </div>

                    <div class="mb-2">
                        <label for="num_carte">Numéro de carte de paiement</label>
                        <input type="text" id="num_carte" name="num_carte" class="form-control" placeholder="XXXX XXXX XXXX XXXX"  minlength="16" maxlength="16">
                    </div>

                    <div class="mb-2 d-flex gap-2">
                        <div>
                            <label for="date_expiration_mois">Date d'expiration</label>
                            <select id="date_expiration_mois" name="date_expiration_mois" class="form-control">
                                <option value="">MM</option>
                                @for ($m=1; $m<=12; $m++)
                                    <option value="{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}</option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <label for="date_expiration_annee">&nbsp;</label>
                            <select id="date_expiration_annee" name="date_expiration_annee" class="form-control">
                                <option value="">AAAA</option>
                                @for ($y = date('Y'); $y <= date('Y') + 10; $y++)
                                    <option value="{{ $y }}">{{ $y }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="code_verification">Code de vérification <small>(CVV)</small></label>
                        <input type="text" id="code_verification" name="code_verification" class="form-control" maxlength="4" placeholder="123">
                    </div>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="accept_cgu" name="accept_cgu" required>
                    <label class="form-check-label" for="accept_cgu">
                        Confirmer l'acceptation des <a href="{{ route('conditions.generales') }}" target="_blank">conditions générales d’utilisation du service</a>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Payer maintenant</button>
                <button type="button" class="btn btn-secondary btn-sm" onclick="fermerPopupPaiement('{{ $reservation->id }}')">Annuler</button>
            </form>
        </div>
    </div>

    <script>
        const selectPaiement = document.getElementById('moyen_paiement');
        const carteDetails = document.getElementById('carte-details');

        selectPaiement.addEventListener('change', function() {
            if (this.value === 'Visa') {
                carteDetails.style.display = 'block';
                document.getElementById('nom_porteur').setAttribute('required', 'required');
                document.getElementById('num_carte').setAttribute('required', 'required');
                document.getElementById('date_expiration_mois').setAttribute('required', 'required');
                document.getElementById('date_expiration_annee').setAttribute('required', 'required');
                document.getElementById('code_verification').setAttribute('required', 'required');
            } else {
                carteDetails.style.display = 'none'; 
                ['nom_porteur','num_carte','date_expiration_mois','date_expiration_annee','code_verification'].forEach(id => {
                    document.getElementById(id).removeAttribute('required');
                });
            }
        });
    </script>
                    @endif
                @endif
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
<script>
function ouvrirPopupPaiement(id, montant) {
    document.getElementById('popup-paiement-' + id).classList.remove('d-none');
}
function fermerPopupPaiement(id) {
    document.getElementById('popup-paiement-' + id).classList.add('d-none');
}
</script>

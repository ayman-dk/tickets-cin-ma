<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'seance_id', 'film_id', 'statut', 'date_reservation','paiement_confirme','montant_total','moyen_paiement'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seance()
    {
        return $this->belongsTo(Seance::class);
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'reservation_categories')
                ->withPivot('quantite')
                ->withTimestamps();
    }
}

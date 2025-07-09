<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['titre','description','duree','classification','realisateur','acteurs','genres','affiche_url','est_actif','date_sortie',];

    protected $casts = [
        'genres' => 'array',
        'date_sortie' => 'date',
        'est_actif' => 'boolean',
    ];

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}

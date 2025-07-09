<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['nb_places'];
    public $timestamps = false;

    public function reservations()
    {
    return $this->belongsToMany(Reservation::class, 'reservation_categories')
                ->withPivot('quantite')
                ->withTimestamps();
    }


}

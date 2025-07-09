<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationCategory extends Model
{
    use HasFactory;
    protected $fillable = ['reservation_id', 'category_id', 'quantite'];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function category()
    {
    return $this->belongsTo(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caronas extends Model
{
    protected $table = 'caronas';

    protected $fillable = [
        'origin',
        'destination',
        'date',
        'time',
        'available_seats', // Campo "vagas"
        'driver_id'
    ];

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
    public function passengers()
    {
        return $this->belongsToMany(User::class, 'carona_passenger', 'carona_id', 'passenger_id');
    }
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('origin', 'like', "%{$search}%")
                         ->orWhere('destination', 'like', "%{$search}%");
        }
        return $query;
    }   
}

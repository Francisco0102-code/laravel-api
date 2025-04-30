<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    protected $fillable = [
        'carbrand',
        'carmodel',
        'caryear',
        'carplate',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

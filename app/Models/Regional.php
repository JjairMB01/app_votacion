<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'seat_id'
    ];

    public function seat()
    {
        return $this->hasMany(Seat::class);
    }

}

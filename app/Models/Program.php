<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'code'

    ];

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    public function apprentices()
    {
        return $this->hasMany(Apprentice::class);
    }


}

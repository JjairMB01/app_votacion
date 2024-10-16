<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulate extends Model
{
    use HasFactory;

    public function apprentice()
    {
        return $this->belongsTo(Apprentice::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    public function apprentice()
    {
        return $this->belongsTo(Apprentice::class);
    }

    public function yearVoting()
    {
        return $this->belongsTo(YearVoting::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

}

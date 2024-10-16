<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'program_id'

    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function regionals()
    {
        return $this->belongsTo(Regional::class);
    }

    public function apprentices()
    {
        return $this->hasMany(Apprentice::class);
    }

}

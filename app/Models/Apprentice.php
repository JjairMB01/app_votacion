<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprentice extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'surname',
        'type_document_id',
        'identification',
        'regional_id',
        'seat_id',
        'program_id'

    ];

    public function typeDocument()
    {
        return $this->belongsTo(TypeDocument::class);
    }

    public function regional()
    {
        return $this->belongsTo(Regional::class);
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    public function postulates()
    {
        return $this->hasOne(Postulate::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

}

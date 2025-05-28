<?php

namespace App\Models;

use Database\Factories\SightingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sighting extends Model
{
    protected $guarded = [''];
    
    use HasFactory;

    public function ufo()
    {
        return $this->hasOne(UfoSighting::class);
    }

    public function alien()
    {
        return $this->hasOne(AlienSighting::class);
    }

    public function abductionsighting()
    {
        return $this->hasOne(AbductionSighting::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}

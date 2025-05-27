<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlienShape extends Model
{
    public function aliensightings()
    {
        return $this->hasMany(AlienSighting::class);
    }
}

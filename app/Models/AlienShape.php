<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlienShape extends Model
{
    public $timestamps = false;
    public function aliensightings()
    {
        return $this->hasMany(AlienSighting::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function sightings()
    {
        return $this->hasMany(Sighting::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "statuses";
    public function sightings()
    {
        return $this->hasMany(Sighting::class);
    }
}

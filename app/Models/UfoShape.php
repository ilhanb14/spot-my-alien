<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UfoShape extends Model
{
    public $timestamps = false;
    public function ufosightings()
    {
        $this->hasMany(UfoSighting::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UfoSighting extends Model
{
    public function sighting() {
        return $this->belongsTo(Sighting::class);
    }
}

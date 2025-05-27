<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbductionSighting extends Model
{
    public function sighting()
    {
        return $this->belongsTo(Sighting::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }
}

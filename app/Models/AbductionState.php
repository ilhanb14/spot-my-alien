<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbductionState extends Model
{
    public function abductionsightings()
    {
        return $this->hasMany(AbductionSighting::class);
    }
}

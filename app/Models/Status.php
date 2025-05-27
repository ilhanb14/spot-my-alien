<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function abductionsightings()
    {
        return $this->hasMany(AbductionSighting::class);
    }
}

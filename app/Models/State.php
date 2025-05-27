<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function abductionsighting(){
        return $this->hasMany(AbductionSighting::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sighting extends Model
{
    public function ufo(){
        return $this->hasOne(UfoSighting::class);
    }

    public function alien(){
        return $this->hasOne(AlienSighting::class);
    }

    public function abduction(){
        return $this->hasOne(AbductionSighting::class);
    }
}

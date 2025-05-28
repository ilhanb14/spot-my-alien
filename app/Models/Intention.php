<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intention extends Model
{
    public $timestamps = false;
    public function aliensightings(){
        return $this->hasMany('aliensightings');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\type;

class Sighting extends Model
{
    public function ufo(){
        return $this->hasOne(UfoSighting::class);
    }

    public function alien(){
        return $this->hasOne(AlienSighting::class);
    }

    public function abductionsighting(){
        return $this->hasOne(AbductionSighting::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }

}

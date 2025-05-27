<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbductionSighting extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    
    public function sighting()
    {
        return $this->belongsTo(Sighting::class);
    }

    public function abductionstate(){
        return $this->belongsTo(AbductionState::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
}

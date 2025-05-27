<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlienSighting extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    
    public function sighting()
    {
        return $this->belongsTo(Sighting::class);
    }

    public function alienshape()
    {
        return $this->belongsTo(AlienShape::class);
    }
}

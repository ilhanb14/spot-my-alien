<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlienSighting extends Model
{
    public $timestamps = false;

    public function sighting()
    {
        return $this->belongsTo(Sighting::class);
    }

    public function alienshape()
    {
        return $this->belongsTo(AlienShape::class, "shape_id");
    }

    public function intention()
    {
        return $this->belongsTo(Intention::class);
    }
}

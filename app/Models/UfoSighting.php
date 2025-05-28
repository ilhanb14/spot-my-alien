<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UfoSighting extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function sighting() {
        return $this->belongsTo(Sighting::class);
    }

    public function ufoshape()
    {
        return $this->belongsTo(UfoShape::class, 'shape_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function sighting()
    {
        return $this->belongsTo(Sighting::class);
    }
}

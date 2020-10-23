<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    public function nail(){
        return $this->belongsTo("App\Nail");
    }

    public function sales(){
        return $this->hasMany("App\Sale");
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nail extends Model
{
    public function sales_detail(){
        return $this->hasMany("App\SalesDetail");
    }
}

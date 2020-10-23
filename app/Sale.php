<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function sales_detail(){
        return $this->belongsTo("App\SalesDetail");
    }

    public function incentive(){
        return $this->hasMany("App\Incentive");
    }
    

    public function user(){
    	return $this->belongsTo("App\User");
    }
}

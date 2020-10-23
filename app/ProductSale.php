<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    public function purchasing_detail(){
        return $this->belongsTo("App\SalesDetail");
    }

    public function prodict_incentive(){
        return $this->hasMany("App\Incentive");
    }
    
    public function admin(){
    	return $this->belongsTo("App\Admin");
    }
}

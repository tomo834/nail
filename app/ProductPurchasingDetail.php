<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPurchasingDetail extends Model
{
    public function product(){
        return $this->belongsTo("App\Product");
    }

    public function purchasings(){
        return $this->hasMany("App\ProductPurchasing");
    }
}

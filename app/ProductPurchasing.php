<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPurchasing extends Model
{
    public function product_purchasing_detail()
    {
        return $this->belongsTo("App\ProductPurchasingDetail");
    }

    public function product_incentive()
    {
        return $this->hasMany("App\ProductIncentive");
    }

    public function admin()
    {
    	return $this->belongsTo("App\Admin");
    }
}

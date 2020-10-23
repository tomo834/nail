<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incentive extends Model
{
	protected $dates = [
        'receive', 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function sale(){
        return $this->belongsTo("App\Sale");
    }

}

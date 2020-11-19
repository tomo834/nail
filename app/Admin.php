<?php

namespace App;

use App\Notifications\AdminResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type', 'name_jp',"company_name","representative","shop_name","shop_pic","address","phone","cellphone","account_holder","bank_name","branch_name","bank_code","branch_code","account_type","account_number","incentive","historical_matters","passbook","other","account_id","homepage","zip_code","shop_zip_code","shop_address","request","shop_phone","shop_open","has_nailist","notification_address"
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPassword($token));
    }

    public function incentive_info(){
        return $this->hasMany("App\Incentive");
    }
    public function product_incentive_info(){
        return $this->hasMany("App\ProductIncentive");
    }
    public function user_info(){
        return $this->hasMany("App\User");
    }
}

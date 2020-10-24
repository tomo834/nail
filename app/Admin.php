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
        'name', 'email', 'password','type', 'name_jp',"company_name","representative","shop_name","shop_pic", "birthday","address","phone","fax","cellphone","account_holder","bank_name","branch_name","bank_code","branch_code","account_type","account_number","incentive","need_file","historical_matters","seal_certificate","passbook","residents_card","other","mailing_date","account_id"
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

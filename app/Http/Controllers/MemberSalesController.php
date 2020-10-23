<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Incentive;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Log;

class MemberSalesController extends Controller
{
    public function index(Request $request){
    	$incentives = Admin::find(160)->incentive_info;

    	Log::debug("incentives");
    	Log::debug($incentives);


    	// $incentives = Admin::find(Auth::guard('admin')->user()->id)->incentives;
    	
    	return view('member/sales/sales', compact("incentives"));
    }
}

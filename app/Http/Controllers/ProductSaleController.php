<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Node;
use App\NodeClosure;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Log;

class ProductSaleController extends Controller
{
    public function incentive(Request $request){

    	$admin = Admin::find(Auth::guard('admin')->user()->id);

    	//admin
    	if ($admin->type == "99"){
    		$incentives = Admin::find($admin->id)->product_incentive_info;
    	}
    	//agency
    	else if ($admin->type == "1"){
    		$incentives = Admin::find($admin->id)->product_incentive_info;
    	}
    	//distributor
    	else if ($admin->type == "2"){
    		$incentives = Admin::find($admin->id)->product_incentive_info;
    	}
    	//member
    	else if ($admin->type == "3"){
    		$incentives = Admin::find($admin->id)->product_incentive_info;
    	}

    	Log::debug($incentives);

    	return view('administor/product/incentive', compact('incentives'));
    }

}

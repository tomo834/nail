<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Node;
use App\NodeClosure;
use Illuminate\Support\Facades\Auth;
use App\ProductPurchasing;

class PurchaseController extends Controller
{
    public function index(){
    	$orders = ProductPurchasing::where("admin_id", Auth::guard('admin')->user()->id)->count();
    	$account_id = Auth::guard('admin')->user()->account_id;
    	$order = str_pad(strval($orders + 1), 4, "0", STR_PAD_LEFT);
    	$order_id = $account_id . "-" . $order;
    	$gadget_price = 200;
    	$gel_price = 100;
    	return view('administor/product/purchase', compact('order_id', 'gadget_price', 'gel_price'));
    }
}

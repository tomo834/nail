<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Node;
use App\NodeClosure;
use Illuminate\Support\Facades\Auth;
use App\ProductPurchasing;
use App\Product;
use App\ProductIncentive;
use App\ProductPurchasingDetail;
use Illuminate\Support\Facades\Log;

class PurchaseController extends Controller
{
    public function index(){
    	$orders = ProductPurchasing::where("admin_id", Auth::guard('admin')->user()->id)->count();
    	$account_id = Auth::guard('admin')->user()->account_id;
    	$admin_id = Auth::guard('admin')->user()->id;
    	$order = str_pad(strval($orders + 1), 6, "0", STR_PAD_LEFT);
    	$order_id = $account_id . "-" . $order;
    	$gadget_price = Product::find(1)->price;
    	$gel_price = Product::find(2)->price;
    	return view('administor/product/purchase', compact('order_id', 'gadget_price', 'gel_price', 'admin_id'));
    }

    public function receive(Request $request){


    	$order_id = $request->input('OrderID');

    	$url = "https://pt01.mul-pay.jp/payment/SearchTradeMulti.idPass";
    	$ch = curl_init();

    	$data = [];

		$data['ShopID'] = 'tshop00046988';
		$data['ShopPass'] = '6ftzw5gc';
		$data['OrderID'] = $order_id;
		$data['PayType'] = '23';

		$data = http_build_query($data, "", "&");

    	curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    	$response = curl_exec($ch);

    	Log::debug($response);

    	$response = explode("&", $response);

    	$status = $response[0];
    	$status = explode("=", $status);
    	$status = $status[1];

    	if ($status == "TRADING"){

    		$amount = $response[0];
	    	$amount = explode("=", $amount);
	    	$amount = $amount[1];

	    	$client_field1 = $response[6];
	    	$client_field1 = explode("=", $client_field1);
	    	$client_field1 = $client_field1[1];
	    	$client_field1 = explode("-", $client_field1);

	    	$admin = $response[8];
	    	$admin = explode("=", $admin);
	    	$admin = $admin[1];

	    	$device = explode("device", $client_field1[0]);
	    	$device_amount = $device[0];
	    	$device_total = $device[1];

	    	$coat = explode("coat",  $client_field1[1]);
	    	$coat_amount = $coat[0];
	    	$coat_total = $coat[1];

    		$p_deatil_d = new ProductPurchasingDetail();
    		$p_deatil_d->product_id = "1";
    		$p_deatil_d->amount = $device_amount;
    		$p_deatil_d->total = $device_total;
    		$p_deatil_d->purchase = date("Y-m-d H:i:s");
    		$p_deatil_d->save();

    		$p_deatil_c = new ProductPurchasingDetail();
    		$p_deatil_c->product_id = "2";
    		$p_deatil_c->amount = $coat_amount;
    		$p_deatil_c->total = $coat_total;
    		$p_deatil_c->purchase = date("Y-m-d H:i:s");
    		$p_deatil_c->save();

    		$p_d = new ProductPurchasing();
    		$p_d->admin_id = $admin;
    		$p_d->product_purchasing_detail_id = $p_deatil_d->id;
    		$p_d->product_purchasing_division_id = "TRADING";
    		$p_d->order_id = $order_id;
    		$p_d->save();

    		$p_c = new ProductPurchasing();
    		$p_c->admin_id = $admin;
    		$p_c->product_purchasing_detail_id = $p_deatil_c->id;
    		$p_c->product_purchasing_division_id = "TRADING";
    		$p_c->order_id = $order_id;
    		$p_c->save();

    	}else if($status == "TRANSFERRED"){
    		$products = ProductPurchasing::where('order_id', $order_id)->get();
    		foreach ($products as $product) { 
    			$p = ProductPurchasing::find($product);
    			$p->product_purchasing_division_id = "TRANSFERRED";
    			$p->update();

    			$parents = Node::where("shop", $p->id)->getAncestors()->pluck('id')->toArray(); // [1, 2, 3]
    			foreach ($parents as $parent) {
    				if ($parent == "1") {
    					$p_incentive = new ProductIncentive();
    					$p_incentive->product_purchasing_id = $p->id;
    					$p_incentive->incentive = $p->product_purchasing_detail->total;
    					$p_incentive->admin_id = $parent->shop;
    					$p_incentive->receive = date("Y-m-d H:i:s");
    				}
    				else {
    					$p_incentive = new ProductIncentive();
    					$p_incentive->product_purchasing_id = $p->id;
    					$incentive = $p->product_purchasing_detail->total * 0.01 * $parent->shop->incentive;
    					$p_incentive->incentive = $incentive;
    					$p_incentive->admin_id = $parent->shop;
    					$p_incentive->receive = date("Y-m-d H:i:s");
    				}
    				
    			}
    		}

    	}else if($status == "EXPIRED"){
    		$products = ProductPurchasing::where('order_id', $order_id)->get();
    		foreach ($products as $product) { 
    			$p = ProductPurchasing::find($product);
    			$p->product_purchasing_division_id = "EXPIRED";
    			$p->update();
    		}
    	}

    	curl_close($ch);

    	return 0;

    }
}

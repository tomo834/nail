<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Node;
use App\NodeClosure;
use Illuminate\Support\Facades\Auth;
use App\ProductPurchasing;
use Illuminate\Support\Facades\Log;

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

    public function receive(){
    	$url = "https://pt01.mul-pay.jp/payment/SearchTradeMulti.idPass";
    	$ch = curl_init();

    	$data = [];

		$data['ShopID'] = 'tshop00046988';
		$data['ShopPass'] = '6ftzw5gc';
		$data['OrderID'] = '1891817118';
		$data['PayType'] = '23';

		$data = http_build_query($data, "", "&");

    	curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    	$response = curl_exec($ch);
    	$response = explode("&", $response);

    	$status = $response[0];
    	$status = explode("=", $status);
    	$status = $status[1];

    	$client_field = $response[6];
    	$client_field = explode("=", $client_field);
    	$client_field = $client_field[1];
    	$client_field = explode("-", $client_field);

    	$device = str_replace("device", "", $client_field[0]);
    	$coat = str_replace("coat", "", $client_field[1]);

    	Log::debug($response);
    	Log::debug($status);
    	Log::debug($client_field);
    	Log::debug($device);
    	Log::debug($coat);

    	curl_close($ch);

    	return view('administor/device');

    }
}

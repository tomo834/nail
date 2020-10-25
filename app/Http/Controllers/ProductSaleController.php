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

    	if (!empty($request['from']) && !empty($request['until'])) {
            //ハッシュタグの選択された20xx/xx/xx ~ 20xx/xx/xxのレポート情報を取得
            // $incentives = Admin::find(160)->with("incentive_info")getDate($request['from'], $request['until']);
            $incentives = Admin::find($admin->id)->incentive_info->whereBetween("receive", [$request['from'], $request['until']])->all();

        } else {
            //リクエストデータがなければそのままで表示
            $incentives = Admin::find($admin->id)->incentive_info()->paginate(2);
        }

    	Log::debug($incentives);

    	return view('administor/product/incentive', compact('incentives'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Node;
use App\NodeClosure;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Log;

class SalesController extends Controller
{
	public function administor(Request $request){
    	$incentives = Admin::find(1)->incentive_info;

    	// $incentives = Admin::find(Auth::guard('admin')->user()->id)->incentives;
    	
    	return view('administor/sales', compact("incentives"));
    }

	public function agency(Request $request){
    	$incentives = Admin::find(160)->incentive_info;

    	// $incentives = Admin::find(Auth::guard('admin')->user()->id)->incentives;
    	
    	return view('agency/sales', compact("incentives"));
    }

    public function distributor(Request $request){
    	$admins = Node::find(45)->getDescendants()->pluck('shop');

    	$incentives = Admin::query()->whereIn("id", ["160","161"])->get();

    	// $incentives = Admin::find(160)->incentive_info;

    	// $incentives = Admin::find(Auth::guard('admin')->user()->id)->incentives;
    	
    	return view('distributor/sales', compact("incentives", "admins"));
    }

    public function member(Request $request){

    	// $incentives = Admin::find(Auth::guard('admin')->user()->id)->incentives;

    	if (!empty($request['from']) && !empty($request['until'])) {
            //ハッシュタグの選択された20xx/xx/xx ~ 20xx/xx/xxのレポート情報を取得
            // $incentives = Admin::find(160)->with("incentive_info")getDate($request['from'], $request['until']);
    		$incentives = Admin::find(160)->incentive_info->whereBetween("receive", [$request['from'], $request['until']])->all();

        } else {
            //リクエストデータがなければそのままで表示
    		$incentives = Admin::find(160)->incentive_info()->paginate(2);
        }
    	
    	return view('member/sales', compact("incentives"));
    }

    public function sales(Request $request){

    	$admin = Admin::find(Auth::guard('admin')->user()->id);

    	//admin
    	if ($admin->type == "99"){
    		$incentives = Admin::find($admin->id)->incentive_info;
    	}
    	//agency
    	else if ($admin->type == "1"){
    		$incentives = Admin::find($admin->id)->incentive_info;
    	}
    	//distributor
    	else if ($admin->type == "2"){
    		$incentives = Admin::find($admin->id)->incentive_info;
    	}
    	//member
    	else if ($admin->type == "3"){
    		$incentives = Admin::find($admin->id)->incentive_info;
    	}

        Log::debug($admin);
        Log::debug($incentives);

    	return view('administor/sales', compact('incentives'));
    }

}

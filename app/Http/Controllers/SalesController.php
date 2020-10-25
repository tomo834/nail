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
    public function incentive(Request $request){

    	$admin = Admin::find(Auth::guard('admin')->user()->id);

        if (!empty($request['from']) && !empty($request['until'])) {
            //ハッシュタグの選択された20xx/xx/xx ~ 20xx/xx/xxのレポート情報を取得
            // $incentives = Admin::find(160)->with("incentive_info")getDate($request['from'], $request['until']);
            $incentives = Admin::find($admin->id)->incentive_info->whereBetween("receive", [$request['from'], $request['until']])->all();

        } else {
            //リクエストデータがなければそのままで表示
            $incentives = Admin::find($admin->id)->incentive_info()->paginate(50);
        }

        Log::debug($admin);
        Log::debug($incentives);

    	return view('administor/incentive', compact('incentives'));
    }

    public function sales(){

        $admin = Auth::guard('admin')->user();

        //admin
        if ($admin->type == "99"){
            $nodes = Node::find(1)->with('admin_info')->get()->toTree();
        }
        //agency
        else if ($admin->type == "1"){
            $nodes = Node::where("shop", $admin->id)->with('admin_info')->get()->toTree();
        }
        //distributor
        else if ($admin->type == "2"){
            $nodes = Node::where("shop", $admin->id)->with('admin_info')->get()->toTree();
        }

        return view('administor/sales', compact("nodes"));
    }

}

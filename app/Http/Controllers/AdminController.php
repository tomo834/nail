<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Facades\Auth; 
use App\Mail\RegisterMail;
use App\Node;
use App\NodeClosure;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();

        //admin
        if ($admin->type == "99"){
            $nodes = Node::find(1)->with('admin_info')->get()->toTree();
            $admins = Admin::all();
        }
        //agency
        else if ($admin->type == "1"){
            $nodes = Node::where("shop", $admin->id)->with('admin_info')->get()->toTree();
        }
        //distributor
        else if ($admin->type == "2"){
            $nodes = Node::where("shop", $admin->id)->with('admin_info')->get()->toTree();
            $admins = [];
        }
        //member
        else if ($admin->type == "3"){
            $nodes = Node::where("shop", $admin->id)->with('admin_info')->get()->toTree();
            $admins = [];
        }

        return view('administor.index', compact('admins','nodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("administor.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $under = Node::where("shop", $admin->id)->first()->getChildren()->pluck('id')->count();
        //admin
        if ($admin->type == "99"){
            $nodes = Node::find(1)->with('admin_info')->get()->toTree();
            $admins = Admin::all();
            $account_id = str_pad(strval($under + 1), 3, "0", STR_PAD_LEFT);
            $account_id = str_pad($account_id, 10, "0", STR_PAD_RIGHT);
            $type = "1";
        }
        //agency
        else if ($admin->type == "1"){
            $nodes = Node::where("shop", $admin->id)->with('admin_info')->get()->toTree();
            $account_id_left = substr($admin->account_id, 0, 3);
            $account_id_right = str_pad(strval($under + 1), 2, "0", STR_PAD_LEFT);
            $account_id_right = str_pad($account_id_right, 7, "0", STR_PAD_RIGHT);
            $account_id = $account_id_left . $account_id_right;
            $type = "2";
        }
        //distributor
        else if ($admin->type == "2"){
            $nodes = Node::where("shop", $admin->id)->with('admin_info')->get()->toTree();
            $admins = [];
            $account_id_left = substr($admin->account_id, 0, 5);
            $account_id_right = str_pad(strval($under + 1), 5, "0", STR_PAD_LEFT);
            $account_id = $account_id_left . $account_id_right;
            $type = "3"
        }
        $new_admin = new Admin();
        $new_admin->name = $request->name;
        $new_admin->email = $request->email;
        $new_admin->type = $type;
        $new_admin->account_id = $account_id;
        $p = str_random(12);
        Log::debug($under);
        Log::debug($account_id);
        $new_admin->password = Hash::make($p);
        $new_admin->save();

        

        $rootTree = Node::where("shop", $admin->id)->first();
        $childTree = new Node();
        $childTree->shop = $new_admin->id;
        $rootTree->addChild($childTree);
        $childTree->save();

        

        //Mail::send(new RegisterMail($p));

        return view('administor.index', compact('admins', "nodes"));        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

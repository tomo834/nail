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
            $type = "3";
        }

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'incentive' => 'required|integer'
        ]);

        Log::debug($request);


        $new_admin = new Admin();
        $new_admin->name = $request->name;
        $new_admin->email = $request->email;
        $new_admin->request = $request->request;
        $new_admin->company_name = $request->company_name;
        $new_admin->representative = $request->representative;
        $new_admin->zip_code = $request->zip_code;
        $new_admin->address = $request->address;
        $new_admin->cellphone = $request->cellphone;
        $new_admin->phone = $request->phone;
        $new_admin->fax = $request->fax;
        $new_admin->shop_name = $request->shop_name;
        $new_admin->shop_pic = $request->shop_pic;
        $new_admin->shop_zip_code = $request->shop_zip_code;
        $new_admin->shop_address = $request->shop_address;
        $new_admin->shop_phone = $request->shop_phone;
        $new_admin->shop_open = $request->shop_open;
        $new_admin->has_nailist = $request->has_nailist;
        $new_admin->homepage = $request->homepage;
        $new_admin->account_holder = $request->account_holder;
        $new_admin->bank_name = $request->bank_name;
        $new_admin->branch_name = $request->branch_name;
        $new_admin->bank_code = $request->bank_code;
        $new_admin->branch_code = $request->branch_code;
        $new_admin->account_type = $request->account_type;
        $new_admin->account_number = $request->account_number;
        $new_admin->incentive = $request->incentive;
        $new_admin->need_file = $request->need_file;
        $new_admin->historical_matters = $request->historical_matters;
        $new_admin->seal_certificate = $request->seal_certificate;
        $new_admin->passbook = $request->passbook;
        $new_admin->residents_card = $request->residents_card;
        $new_admin->other = $request->other;
        $new_admin->mailing_date = $request->mailing_date;
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

        

        Mail::send(new RegisterMail($p));

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

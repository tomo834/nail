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
        }
        //agency
        else if ($admin->type == "1"){
            $nodes = Node::where("shop", $admin->id)->with('admin_info')->get()->toTree();
        }
        //distributor
        else if ($admin->type == "2"){
            $nodes = Node::where("shop", $admin->id)->with('admin_info')->get()->toTree();
        }
        //member
        else if ($admin->type == "3"){
            $nodes = Node::where("shop", $admin->id)->with('admin_info')->get()->toTree();
        }

        return view('administor.index', compact('nodes'));
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
        
        //admin
        if ($admin->type == "99"){
            $nodes = Node::find(1)->with('admin_info')->get()->toTree();
            $type = "1";
        }
        //agency
        else if ($admin->type == "1"){
            $nodes = Node::where("shop", $admin->id)->with('admin_info')->get()->toTree();
            $type = "2";
        }
        //distributor
        else if ($admin->type == "2"){
            $nodes = Node::where("shop", $admin->id)->with('admin_info')->get()->toTree();
            $type = "3";
        }

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'incentive' => 'required|integer',
            'account_id' => 'required|unique:admins|size:10'
        ]);

        Log::debug($request);


        $new_admin = new Admin();
        $new_admin->name = $request->name;
        $new_admin->email = $request->email;
        $new_admin->account_id = $request->account_id;

        if ($request->notification_address == NULL) {
            $notification_address = $request->email;
        }else{
            $notification_address = $request->notification_address;
        }

        $new_admin->notification_address = $notification_address;
        $new_admin->request = $request->request_date;
        $new_admin->company_name = $request->company_name;
        $new_admin->representative = $request->representative;
        $new_admin->zip_code = $request->zip_code;
        $new_admin->address = $request->address;
        $new_admin->cellphone = $request->cellphone;
        $new_admin->phone = $request->phone;
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
        $new_admin->historical_matters = $request->historical_matters;
        $new_admin->passbook = $request->passbook;
        $new_admin->other = $request->other;

        $new_admin->type = $type;
        $p = str_random(12);
        $new_admin->password = Hash::make($p);

        $new_admin->save();

        Log::debug($p);

        $rootTree = Node::where("shop", $admin->id)->first();
        $childTree = new Node();
        $childTree->shop = $new_admin->id;
        $rootTree->addChild($childTree);
        $childTree->save();

        $email = $request->email;
        $name = $request->name;
        $account_id = $request->account_id;

        // Mail::send(new RegisterMail($p, $notification_address, $email, $account_id, $name));

        return view('administor.complete_register');        
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

    public function update(Request $request, $id)
    {
        //
    }

    public function editShop($id)
    {
        $admin = Admin::find($id);
        return view('administor/edit_shop', compact("id", "admin"));
    }

    public function updateShop(Request $request, $id)
    {

        Log::debug($request);
        $admin = Admin::find($id);

        Log::debug("OK");

        if ($request->notification_address == NULL) {
            $notification_address = $request->email;
        }else{
            $notification_address = $request->notification_address;
        }

        $admin->notification_address = $notification_address;
        $admin->request = $request->request_date;
        $admin->company_name = $request->company_name;
        $admin->representative = $request->representative;
        $admin->zip_code = $request->zip_code;
        $admin->address = $request->address;
        $admin->cellphone = $request->cellphone;
        $admin->phone = $request->phone;
        $admin->shop_name = $request->shop_name;
        $admin->shop_pic = $request->shop_pic;
        $admin->shop_zip_code = $request->shop_zip_code;
        $admin->shop_address = $request->shop_address;
        $admin->shop_phone = $request->shop_phone;
        $admin->shop_open = $request->shop_open;
        $admin->has_nailist = $request->has_nailist;
        $admin->homepage = $request->homepage;

        $admin->account_holder = $request->account_holder;
        $admin->bank_name = $request->bank_name;
        $admin->branch_name = $request->branch_name;
        $admin->bank_code = $request->bank_code;
        $admin->branch_code = $request->branch_code;
        $admin->account_type = $request->account_type;
        $admin->account_number = $request->account_number;
        $admin->historical_matters = $request->historical_matters;
        $admin->passbook = $request->passbook;
        $admin->other = $request->other;

        $admin->update();

        return view('administor.complete_register'); 
    }

    public function editProfile()
    {
        $admin = Auth::guard('admin')->user();
        return view('administor/change_profile', compact("admin"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        if ($admin->email !== $request->email){
            $validatedData = $request->validate([
                'email' => 'required|email|max:255|unique:admins',
            ]);
            $admin->email = $request->email;
        }

        $admin->name = $request->name;

        if ($request->notification_address == NULL) {
            $notification_address = $request->email;
        }else{
            $notification_address = $request->notification_address;
        }

        $admin->notification_address = $notification_address;
        $admin->request = $request->request_date;
        $admin->company_name = $request->company_name;
        $admin->representative = $request->representative;
        $admin->zip_code = $request->zip_code;
        $admin->address = $request->address;
        $admin->cellphone = $request->cellphone;
        $admin->phone = $request->phone;
        $admin->shop_name = $request->shop_name;
        $admin->shop_pic = $request->shop_pic;
        $admin->shop_zip_code = $request->shop_zip_code;
        $admin->shop_address = $request->shop_address;
        $admin->shop_phone = $request->shop_phone;
        $admin->shop_open = $request->shop_open;
        $admin->has_nailist = $request->has_nailist;
        $admin->homepage = $request->homepage;

        $admin->account_holder = $request->account_holder;
        $admin->bank_name = $request->bank_name;
        $admin->branch_name = $request->branch_name;
        $admin->bank_code = $request->bank_code;
        $admin->branch_code = $request->branch_code;
        $admin->account_type = $request->account_type;
        $admin->account_number = $request->account_number;
        $admin->historical_matters = $request->historical_matters;
        $admin->passbook = $request->passbook;
        $admin->other = $request->other;

        $admin->update();

        return view('administor.complete_register'); 
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

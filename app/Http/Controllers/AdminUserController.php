<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Facades\Auth; 
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Log;
use App\Node;
use App\NodeClosure;

class AdminUserController extends Controller
{
    public function userList(){
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

        return view('administor.user.list', compact('admins','nodes'));
    }
}

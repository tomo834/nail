<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesRegisterController extends Controller
{
    public function index()
    {
    	$ransu = "2";
        return view('member/sales/register', compact("ransu"));
    }
}

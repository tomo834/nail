<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AllAdminImport;
use Illuminate\Support\Facades\Log;

class AllAdminController extends Controller
{
	 /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport()
    {
    	Log::debug("Startimport");
        return view('file-allimport');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileAllImport(Request $request) 
    {
        $request->validate([
            'file' => 'required'
        ]);
        Excel::import(new AllAdminImport, request()->file('file'));
        

        return back();
    }
}

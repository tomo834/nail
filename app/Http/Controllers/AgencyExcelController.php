<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AgencyImport;
use App\Exports\AgencyExport;

use Illuminate\Support\Facades\Log;

class AgencyExcelController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImportExport()
    {
       return view('file-import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
    	$request->validate([
            'file' => 'required'
        ]);
        Excel::import(new AgencyImport, request()->file('file'));
        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        return Excel::download(new AgencyExport, 'admins-collection.xlsx');
    }    
}
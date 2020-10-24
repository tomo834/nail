<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AdminsImport;
use App\Exports\AdminsExport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AdminExcelController extends Controller
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
        Excel::import(new AdminsImport, request()->file('file')->ignoreEmpty());
        

        return back();
    }
    

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        return Storage::download('public/sample.xlsx');
    }    
}
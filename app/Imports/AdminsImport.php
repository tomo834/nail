<?php

namespace App\Imports;

use App\Admin;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Node;
use App\NodeClosure;
use Illuminate\Support\Facades\Auth; 

class AdminsImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {

        $admins = Auth::guard('admin')->user()->id;
        Log::debug($admins);

        if (Auth::guard('admin')->user()->type == "99") {
            $t = "1";
        }else if (Auth::guard('admin')->user()->type == "1") {
            $t = "2";
        }else if (Auth::guard('admin')->user()->type == "2") {
            $t = "3";
        }

        foreach ($rows as $row) 
        {
            $p = str_random(12);
            $admin = Admin::create([
                'name' => $row[0],
                'email' => $row[1],
                'type' => $t,
                'password' => Hash::make($p)
            ]);

            $rootTree = Node::where('shop', Auth::guard('admin')->user()->id)->first();
            $childTree = new Node();
            $childTree->shop = $admin->id;
            $rootTree->addChild($childTree);
            $childTree->save();
            Log::debug($rootTree);
        }

    }
}

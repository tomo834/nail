<?php

namespace App\Imports;

use App\Admin;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Node;
use App\NodeClosure;

class DistributorImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $p = str_random(12);
            $admin = Admin::create([
                'name' => $row[0],
                'email' => $row[1],
                'type' => $row[4],
                'password' => Hash::make($p)
            ]);

            $rootTree = Node::find(1);
            $childTree = new Node();
            $childTree->shop = $admin->id;
            $rootTree->addChild($childTree);
            $childTree->save();
            Log::debug($admin->id);
        }

    }
}

<?php

namespace App\Imports;

use App\Address;
use Maatwebsite\Excel\Concerns\ToModel;

class AddressImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Address([
            //
        ]);
    }
}

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
use Illuminate\Support\Facades\Validator; 
use Maatwebsite\Excel\Concerns\WithStartRow;


class AdminsImport implements ToCollection, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $admins = Auth::guard('admin')->user()->id;

        if (Auth::guard('admin')->user()->type == "99") {
            $t = "1";
        }else if (Auth::guard('admin')->user()->type == "1") {
            $t = "2";
        }else if (Auth::guard('admin')->user()->type == "2") {
            $t = "3";
        }



        foreach ($rows as $row) 
        {

            $row = $row->toArray();
            
            Log::debug($row[0]);
            Log::debug($row[31]);

            $data = [
                "request" => $row[0],
                "name" => $row[1],
                "email" => $row[10],
                "incentive" => $row[24],
                "mailing_date" => $row[31],
            ];
            $conditions = [
                "request" => "date",
                "name" => "required",
                "email" => "required|email|unique:admins",
                "incentive" => "required|integer",
                "mailing_date" => "date",
            ];
            
            Validator::make($data, $conditions)->validate();
            
            $p = str_random(12);

            if ($row[15] != ""){
                $nailist = 1;
            }else{
                $nailist = 0;
            }

            if ($row[26] != ""){
                $historical_matters = 1;
            }else{
                $historical_matters = 0;
            }

            if ($row[27] != ""){
                $seal_certificate = 1;
            }else{
                $seal_certificate = 0;
            }

            if ($row[28] != ""){
                $passbook = 1;
            }else{
                $passbook = 0;
            }

            if ($row[29] != ""){
                $residents_card = 1;
            }else{
                $residents_card = 0;
            }

            if ($row[30] != ""){
                $other = 1;
            }else{
                $other = 0;
            }

            if ($row[0] != ""){
                $re = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[0]);
            }else{
                $re = $row[0];
            }

            if ($row[31] != ""){
                $mailing_date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[31]);
            }else{
                $mailing_date = $row[31];
            }

            $admin = Admin::create([
                'name' => $row[1],
                'request' => $re,
                'company_name' => $row[1],
                'representative' => $row[2],
                'zip_code' => $row[3],
                'address' => $row[4],
                'cellphone' => $row[5],
                'phone' => $row[6],
                'fax' => $row[7],
                'shop_name' => $row[8],
                'shop_pic' => $row[9],
                'email' => $row[10],
                'shop_zip_code' => $row[11],
                'shop_address' => $row[12],
                'shop_phone' => $row[13],
                'shop_open' => $row[14],
                'has_nailist' => $nailist,
                'homepage' => $row[16],
                'account_holder' => $row[17],
                'bank_name' => $row[18],
                'branch_name' => $row[19],
                'bank_code' => $row[20],
                'branch_code' => $row[21],
                'account_type' => $row[22],
                'account_number' => $row[23],
                'incentive' => $row[24],
                'need_file' => $row[25],
                'historical_matters' => $historical_matters,
                'seal_certificate' => $seal_certificate,
                'passbook' => $passbook,
                'residents_card' => $residents_card,
                'other' => $other,
                'mailing_date' => $mailing_date,
                'account_id' => $a,
                'type' => $t,
                'password' => Hash::make($p)
            ]);

            $rootTree = Node::where('shop', Auth::guard('admin')->user()->id)->first();
            $childTree = new Node();
            $childTree->shop = $admin->id;
            $rootTree->addChild($childTree);
            $childTree->save();
        }

    }

    public function startRow(): int
    {
        return 2;
    }
}

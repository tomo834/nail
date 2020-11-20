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
            Log::debug($row);

            $row = $row->toArray();
    
            $now_admin = Auth::guard('admin')->user();

            $data = [
                "account_id" => $row[0],
                "name" => $row[2],
                "email" => $row[10],
                "incentive" =>$row[25]
            ];
            $conditions = [
                "account_id" => "required|unique:admins|size:10",
                "name" => "required",
                "email" => "required|email|unique:admins",
                "incentive" => "required|integer",
            ];
            
            Validator::make($data, $conditions)->validate();

            
            $p = str_random(12);

            $email = $row[10];

            if ($row[11] != ""){
                $notification_address = $row[11];
            }else{
                $notification_address = $row[10];
            }

            if ($row[16] != ""){
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
                $passbook = 1;
            }else{
                $passbook = 0;
            }

            if ($row[28] != ""){
                $other = 1;
            }else{
                $other = 0;
            }

            if ($row[1] != ""){
                $re = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1]);
            }else{
                $re = $row[1];
            }


            $admin = Admin::create([
                'account_id' => $row[0],
                'name' => $row[2],
                'request' => $re,
                'company_name' => $row[2],
                'representative' => $row[3],
                'zip_code' => $row[4],
                'address' => $row[5],
                'cellphone' => $row[6],
                'phone' => $row[7],
                'shop_name' => $row[8],
                'shop_pic' => $row[9],
                'email' => $row[10],
                'notification_address' => $notification_address,
                'shop_zip_code' => $row[12],
                'shop_address' => $row[13],
                'shop_phone' => $row[14],
                'shop_open' => $row[15],
                'has_nailist' => $nailist,
                'homepage' => $row[17],
                'account_holder' => $row[18],
                'bank_name' => $row[19],
                'branch_name' => $row[20],
                'bank_code' => $row[21],
                'branch_code' => $row[22],
                'account_type' => $row[23],
                'account_number' => $row[24],
                'incentive' => $row[25],
                'historical_matters' => $historical_matters,
                'passbook' => $passbook,
                'other' => $other,
                'type' => $t,
                'password' => Hash::make($p)
            ]);

            $rootTree = Node::where('shop', Auth::guard('admin')->user()->id)->first();
            $childTree = new Node();
            $childTree->shop = $admin->id;
            $rootTree->addChild($childTree);
            $childTree->save();



            //Mail::send(new RegisterMail($p, $notification_address, $email, $a));
        }

    }

    public function startRow(): int
    {
        return 2;
    }
}

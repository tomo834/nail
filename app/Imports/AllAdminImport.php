<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Node;
use App\NodeClosure;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AllAdminImport implements ToCollection, WithStartRow
{


    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $n0 = "";//tmp
        $n1 = "";//tmp

        $a = "";//admin account_id
        $n = "";//node
        $t = "";//type

        //運営
        $rootTree = Node::find(1);

        foreach ($rows as $row) 
        {
            $p = str_random(12);

            //agency
            if ($row[0] != ""){
            	$n0 = $row[0];
            	$a = $row[0];
            	$n = $row[0];
            	$t = "1";
            	// Log::debug("node : " . $n0 . " child : " . $row[0]);
            	

            //distributor
            }else if($row[1] != ""){
            	$n1 = $row[1];
            	$a = $row[1];
            	$n = $row[0];
            	$t = "2";
            	// Log::debug("node : " . $n0 . " child : " . $row[1]);

            //member
            }else if($row[2] != ""){
            	$a = $row[2];
            	$n = $row[1];
            	$t = "3";
            	// Log::debug("node : " . $n1 . " child : " . $row[2]);
            }

            if ($row[4] != ""){
            	$name = $row[4];
            }else{
            	$name = "No Name";
            }

            if ($row[8] != ""){
            	$birthday = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[8]);
            }else{
            	$birthday = $row[8];
            }

            if ($row[23] != ""){
            	$historical_matters = 1;
            }else{
            	$historical_matters = 0;
            }

            if ($row[24] != ""){
            	$seal_certificate = 1;
            }else{
            	$seal_certificate = 0;
            }

            if ($row[25] != ""){
            	$passbook = 1;
            }else{
            	$passbook = 0;
            }

            if ($row[26] != ""){
            	$residents_card = 1;
            }else{
            	$residents_card = 0;
            }

            if ($row[27] != ""){
            	$other = 1;
            }else{
            	$other = 0;
            }

            if ($row[28] != ""){
            	$mailing_date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[28]);
            }else{
            	$mailing_date = $row[28];
            }

            $admin = Admin::create([
            	'name' => $name,
                'company_name' => $row[4],
                'representative' => $row[5],
                'shop_name' => $row[6],
                'shop_pic' => $row[7],
                'birthday' => $birthday,
                'address' => $row[9],
                'phone' => $row[10],
                'fax' => $row[11],
                'cellphone' => $row[12],
                'email' => $row[13],
                'account_holder' => $row[14],
                'bank_name' => $row[15],
                'branch_name' => $row[16],
                'bank_code' => $row[17],
                'branch_code' => $row[18],
                'account_type' => $row[19],
                'account_number' => $row[20],
                'incentive' => $row[21],
                'need_file' => $row[22],
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

            if ($row[1] != ""){
            	$rootTree = $rootTreeAgency;
            }else if($row[2] != ""){
            	$rootTree = $rootTreeDistributor;
            }

			$childTree = new Node();
            $childTree->shop = $admin->id;
            $rootTree->addChild($childTree);
            $childTree->save(); 

            if ($row[0] != ""){
	            $rootTreeAgency = $childTree;
	        }else if ($row[1] != ""){
            	$rootTreeDistributor = $childTree;   
            }

            
        }
    }

    public function startRow(): int
    {
    	return 2;
    }
}

<?php

namespace App\Exports;

use App\Admin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AgencyExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Admin::all();
    }

    public function headings():array
	{
		return [
				'#', 
				'name', 
				'email', 
				'created_at', 
				'updated_at',
				'type',
				'name_jp',
				'shop_name',
				'representative',
				'aaa',
				'pic',
				'birthday',
				'address',
				'phone',
				'fax',
				'cellphone',
				'account_holder',
				'bank_name',
				'branch_name',
				'bank_code',
				'branch_code',
				'account_type',
				'account_number',
				'incentive',
				'need_file',
				'need',
				'need',
				'need',
				'need',
				'need',
				'day',
				'account_id',
			]; 
	}
}

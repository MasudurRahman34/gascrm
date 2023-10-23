<?php

namespace App\Imports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;


class LeadsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       
        return new Lead([
        'owner_id' => Auth::user()->id,
        'lead_status_id' => 1,
        'salutation' => isset($row['salutation']) ? $row['salutation']:NULL,
        'first_name' => isset($row['first_name']) ? $row['first_name']: NULL,
        'last_name' => isset($row['last_name']) ? $row['last_name'] : NULL,
        'name' =>  isset($row['fullname']) ? $row['fullname']: trim((isset($row['first_name']) ? $row['first_name']: NULL).' '. (isset($row['last_name']) ? $row['last_name'] : NULL)),
        'company' => isset($row['business_name']) ? $row['business_name'] :NULL,
        'mobile' => isset($row['mobile']) ? $row['mobile']:NULL,
        'email' => isset($row['email']) ? $row['email'] :NULL,
        'website' => isset($row['website']) ? $row['website']:NULL,
        'title' => isset($row['title']) ? $row['title']:NULL,
        // 'rating_id' => isset($row['rating_id']) ? :NULL,
        // 'follow_up' => isset($row['follow_up']) ? :NULL,
        'address_street' => isset($row['address_line_1']) ? $row['address_line_1']:NULL,
        'address_city' => isset($row['city']) ? $row['city'] :NULL,
        'address_state' => isset($row['state']) ? $row['state']:NULL,
        'address_postalcode' => isset($row['postcode']) ? $row['postcode']:NULL, 
        'address_country' => isset($row['country']) ? $row['country']:NULL,
        // 'info_employees' => isset($row['info_employees']) ? :NULL,
        // 'info_revenue' => isset($row['info_revenue']) ? :NULL,
        // 'source_id' => isset($row['source_id']) ? :NULL,
        // 'industry_id' => isset($row['industry_id']) ? :NULL,
        'description' => isset($row['description']) ? $row['description']:NULL,
        'created_by' => Auth::user()->id,
        'updated_by' => Auth::user()->id,

        //frontend
        'utility_type' => isset($row['product']) ? $row['product']:NULL,
        'supplier' => isset($row['supplier']) ? $row['supplier']:NULL,
        'spend_amount' => isset($row['spend_amount']) ? $row['spend_amount']:NULL,
        'contract_start_date' => isset($row['contract_start_date']) ? $row['contract_start_date']:NULL,
        'is_new_business' => isset($row['is_new_business']) ? $row['is_new_business']:NULL,
        'period' => isset($row['period']) ? $row['period']:NULL,
    ]);

        
        // return new Lead([
        //     'owner_id' => Auth::user()->id,
        //     'lead_status_id' => 1,
        //     // 'salutation' => $request->salutation,
        //     // 'first_name' => $request->first_name,
        //     'last_name' => 'abc',
        //     // 'name' => trim($request->first_name.' '.$request->last_name),
        //     'name' => $row['contact_name'],
            
        //     'company' => $row['business_name'],
        //     'mobile' => $row['phone'],
        //     // 'email' => $row[''],
        //     // 'website' => $row[''],
        //     // 'title' => $row[''],
        //     // 'rating_id' => $row[''],
        //     // 'follow_up' => $row[''],
        //     'address_street' => $row['address_line_1'],
        //     // 'address_city' => $row[''],
        //     // 'address_state' => $row[''],
        //     // 'address_postalcode' => $row[''],
        //     // 'address_country' => $row[''],
        //     // 'info_employees' => $row[''],
        //     // 'info_revenue' => $row[''],
        //     // 'source_id' => $row[''],
        //     // 'industry_id' => $row[''],
        //     // 'description' => $row[''],
        //     'created_by' => Auth::user()->id,
        //     'updated_by' => Auth::user()->id,
        // ]);
        // return "working";
    }
}

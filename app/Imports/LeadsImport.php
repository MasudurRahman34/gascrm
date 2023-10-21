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
            // 'salutation' => $request->salutation,
            // 'first_name' => $request->first_name,
            'last_name' => 'abc',
            // 'name' => trim($request->first_name.' '.$request->last_name),
            'name' => $row['contact_name'],
            
            'company' => $row['business_name'],
            'mobile' => $row['phone'],
            // 'email' => $row[''],
            // 'website' => $row[''],
            // 'title' => $row[''],
            // 'rating_id' => $row[''],
            // 'follow_up' => $row[''],
            'address_street' => $row['address_line_1'],
            // 'address_city' => $row[''],
            // 'address_state' => $row[''],
            // 'address_postalcode' => $row[''],
            // 'address_country' => $row[''],
            // 'info_employees' => $row[''],
            // 'info_revenue' => $row[''],
            // 'source_id' => $row[''],
            // 'industry_id' => $row[''],
            // 'description' => $row[''],
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ]);
        return "working";
    }
}

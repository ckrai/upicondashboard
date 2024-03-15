<?php

namespace App\Imports;

use App\Models\Performance;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportPerformance implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // print_r($row);
        // die();
        // Array ( [0] => KO Code [1] => Total Transaction [2] => Total Accounts [3] => PMJBY [4] => PMSBY [5] => APY )
        if($row[0] !='FE Name'){

        return new Performance([
            
            'fe_name'  => @$row[0],
            'bc_name'  => @$row[1],
            'ko_code'    => @$row[2], 
            'ac_opening'  => @$row[3],
            'fund_transfer'    => @$row[4],
            'total_tran'    => @$row[5], 
            'rupay_trnx'    => @$row[6],
            'mobile_seed'    => @$row[7],
            'bbps'  => @$row[8],
            'rd_fd'  => @$row[9],
            'pmjby'  => @$row[10],
            'pmsby'    => @$row[11], 
            'apy'  => @$row[12],
            'p_month'    => @$row[13], 
            'p_year'  => @$row[14]
            
        ]);
        }
    }
}

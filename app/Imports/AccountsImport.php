<?php

namespace App\Imports;

use App\Models\Account;
use App\Models\Department;
use App\Models\jobRange;
use App\Models\Source;
use App\Models\technology;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class AccountsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $previous = Department::where('name','=',$row[3])->select('id')->first();
        $newbu = ($row[4]==null)?"":Department::where('name','=',$row[4])->select('id')->first();
        $technology = technology::where('name','=',$row[5])->select('id')->first();
        $jobrank = jobRange::where('name','=',$row[6])->select('id')->first();
        $obdate =($row[8]==null)?null:Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[8]));
        $transferDay =($row[9]==null)?null:Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[9]));
        $source = Source::where('name','=',$row[5])->select('id')->first();
        $forecast_bu = ($row[13]==null)?"":Department::where('name','=',$row[13])->select('id')->first();
        $status = ($row[11]==null)?"":Department::where('name','=',$row[11])->select('id')->first();
        /*\Log::info($obdate);*/
        return new Account([
            'fullname'     => $row[1],
            'account'    => $row[2],
            'previous'    => ($previous!=null)?$previous->id:null,
            'newbu'    => ($newbu!=null)?$newbu->id:null,
            'technology'    => ($technology!=null)?$technology->id:null,
            'job_range'    => ($jobrank!=null)?$jobrank->id:null,
            'language'    => $row[7],
            'ob_day'    => $obdate,
            'transfer_day'    => $transferDay,
            'source'    => ($source!=null)?$source->id:null,
            'status'    =>  ($status!=null)?$status->id:null,
            'forecast_customer_code'    => $row[12],
            'forecast_bu'    => ($forecast_bu!=null)?$forecast_bu->id:null,
            'note'    => $row[14],
        ]);
    }
}
<?php

namespace App\Exports;

use App\Models\Account;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class AccountsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $accounts = Account::with(['previous', 'newbu', 'forecast_bu', 'source', 'technology', 'job_range', 'status'])
            ->paginate(15);
        $datas = ['previous', 'newbu', 'forecast_bu', 'source', 'technology', 'job_range', 'status'];
        foreach ($accounts as $account) {
            for($i = 0; $i< count($datas); $i++){
                if ($account->{"$datas[$i]"} != null) {
                    ${"$datas[$i]_name"} = $account->{"$datas[$i]"}->name;
                    $account-> {"$datas[$i]_id"} =  ${"$datas[$i]_name"};
                    unset($account->{"$datas[$i]"});
                }
            }
        }
        return $accounts;
    }

    public function headings(): array
    {
        return [
            'id',
            'Full name',
            'Account',
            'Previous',
            'Newbu',
            'Technology',
            'Job rank',
            'Language',
            'Ob day',
            'Transfer',
            'Source',
            'Status',
            'Forecast Customer Code',
            'Forecast BU',
            'Note',
        ];
    }
}

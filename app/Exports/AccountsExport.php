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
            ->get();
        foreach ($accounts as $account) {
            $previous_name = $account->previous->name;
            $account->previous_id = $previous_name;
            unset($account->previous);
            if ($account->newbu != null) {
                $newbu_name = $account->newbu->name;
                $account->newbu_id = $newbu_name;
                unset($account->newbu);
            }
            if ($account->forecast_bu != null) {
                $forecast_bu_name = $account->forecast_bu->name;
                $account->forecast_bu_id = $forecast_bu_name;
                unset($account->forecast_bu);
            }
            if ($account->source != null) {
                $source_name = $account->source->name;
                $account->source_id = $source_name;
                unset($account->source);
            }
            if ($account->technology != null) {
                $technology_name = $account->technology->name;
                $account->technology_id = $technology_name;
                unset($account->technology);
            }
            if ($account->job_range != null) {
                $job_range_name = $account->job_range->name;
                $account->job_range_id = $job_range_name;
                unset($account->job_range);
            }
            if ($account->status != null) {
                $status_name = $account->status->name;
                $account->status_id = $status_name;
                unset($account->status);
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
            'deleted_at',
            'created_at',
            'updated_at',
        ];
    }
}

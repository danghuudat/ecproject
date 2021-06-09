<?php

namespace App\Repositories\Account\Eloquent;

use App\Exports\AccountsExport;
use App\Imports\AccountsImport;
use App\Models\Account;
use App\Repositories\Account\Contracts\AccountInterface;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class DepartmentRepository.
 */
class AccountRepository implements AccountInterface
{
    /**
     * @return string
     *  Return the model
     */

    public function model(){
        return Account::class;
    }

    public function index(){
        $data = $this->model()::query()
            ->with(['previous', 'newbu', 'forecast_bu', 'source', 'technology', 'job_range', 'status'])
            ->get();
        return response($data);
    }

    public function update($request, $id)
    {
        $data = $this->model()::find($id);
        $data->fullname               = $request->fullname;
        $data->account                = $request->account;
        $data->previous_id            = $request->previous_id;
        $data->newbu_id               = $request->newbu_id;
        $data->technology_id          = $request->technology_id;
        $data->job_range_id           = $request->job_range_id;
        $data->language               = $request->language;
        $data->ob_day                 = $request->ob_day;
        $data->transfer_day           = $request->transfer_day;
        $data->source_id              = $request->source_id;
        $data->status_id              = $request->status_id;
        $data->forecast_customer_code = $request->forecast_customer_code;
        $data->forecast_bu_id         = $request->forecast_bu_id;
        $data->note                   = $request->note;
        $data->phone_number           = $request->phone_number;
        $data->save();
        return $data;
    }

    public function destroy($id){
        $data = $this->model()::find($id);
        $result = $data->delete();
        if ($result) {
            return ["result" => "record has been delete"];
        } else {
            return ["result" => "failed"];
        }
    }

    public function store($request)
    {
        $result = new Account();
        $result->fullname               = $request->fullname;
        $result->account                = $request->account;
        $result->previous_id            = $request->previous_id;
        $result->newbu_id               = $request->newbu_id;
        $result->technology_id          = $request->technology_id;
        $result->job_range_id           = $request->job_range_id;
        $result->language               = $request->language;
        $result->ob_day                 = $request->ob_day;
        $result->transfer_day           = $request->transfer_day;
        $result->source_id              = $request->source_id;
        $result->status_id              = $request->status_id;
        $result->forecast_customer_code = $request->forecast_customer_code;
        $result->forecast_bu_id         = $request->forecast_bu_id;
        $result->note                   = $request->note;
        $result->phone_number           = $request->phone_number;
        $result->save();
        return $result;
    }

    public function show($id){
        $account = $this->model()::findOrFail($id);
        return $account;
    }

    public function genchart()
    {
        $datas = $this->model()::groupBy('status_id','technology_id')
            ->select('technology_id', 'status_id', DB::raw('count(id) as number_member'))
            ->orderBy('status_id')
            ->with(['status','technology'])
            ->get();
        return $datas;
    }

    public function genchartNewbu(){
        $datas = $this->model()::groupBy('newbu_id','technology_id')
            ->select('technology_id', 'newbu_id', DB::raw('count(id) as number_member'))
            ->whereNotNull('newbu_id')
            ->orderBy('technology_id')
            ->with(['technology','newbu'])
            ->get();
        return $datas;
    }

    public function export()
    {
        return Excel::download(new AccountsExport, 'accounts.xlsx',);
    }

    public function import()
    {
        Excel::import(new AccountsImport, storage_path('..\app\Imports/xlsx\account.xlsx'));
        return redirect('/')->with('success', 'All good!');
    }
}

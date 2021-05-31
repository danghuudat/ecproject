<?php

namespace App\Http\Controllers;

use App\Exports\AccountsExport;
use App\Models\Account;
use App\Models\Status;
use App\Models\technology;
use Illuminate\Http\Request;
use App\Imports\AccountsImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Account::query()
            ->with(['previous', 'newbu', 'forecast_bu', 'source', 'technology', 'job_range', 'status'])
            ->get();
        return response($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Account::find($id);
        $result = $data->delete();
        if ($result) {
            return ["result" => "record has been delete"];
        } else {
            return ["result" => "failed"];
        }
    }

    public function import()
    {
        Excel::import(new AccountsImport, storage_path('..\app\Imports/xlsx\account.xlsx'));

        return redirect('/')->with('success', 'All good!');
    }

    public function genchart()
    {
        $technology = Technology::withCount('accounts')->get();
        $status = Status::withCount('accounts')->get();
        $datas = new \stdClass();
        $datas->technology = $technology;
        $datas->status = $status;
        $datas = json_decode( json_encode($datas), true);
        return response($datas);
    }

    public function export()
    {
        return Excel::download(new AccountsExport, 'accounts.xlsx',);
    }
}

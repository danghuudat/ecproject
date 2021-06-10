<?php

namespace App\Http\Controllers;

use App\Exports\AccountsExport;
use App\Models\Account;
use App\Repositories\Account\Contracts\AccountInterface;
use Illuminate\Http\Request;
use App\Imports\AccountsImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class AccountController extends Controller
{
    public $accountReponsitory;

    public function __construct(AccountInterface $accountReponsitory)
    {
        $this->accountReponsitory = $accountReponsitory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->accountReponsitory->index();
        return $data;
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
        \Log::info("123123");
        return $this->accountReponsitory->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response($this->accountReponsitory->show($id));
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
    public function update(Request $request, $id)
    {
        return $this->accountReponsitory->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->accountReponsitory->destroy($id);
    }

    public function import()
    {
        return $this->accountReponsitory->export();
    }

    public function genchart()
    {
        return response($this->accountReponsitory->genchart());
    }

    public function genchartNewbu(){
        return response($this->accountReponsitory->genchartNewbu());
    }

    public function export()
    {
        return $this->accountReponsitory->export();
    }


}

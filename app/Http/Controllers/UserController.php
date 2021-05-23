<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Psy\Util\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all()->department;
        return response($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$newRecord = new User();
        $newRecord->name = "test name";
        $newRecord->username = "testusername";
        $newRecord->phone_number = "1234657890";
        $newRecord->dept_id = 1;
        $newRecord->role = 1;
        $newRecord->acc_id = "0001110001";
        $newRecord->password= bcrypt('password');
        $newRecord->remember_token= Str::random(10);
        $newRecord -> save();
        return response($newRecord);*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function getlogin()
    {
        return "ok";
    }


    public function store(Request $request)
    {
        $newRecord = new User();
        $newRecord->fullname =$request->fullname;
        $newRecord->username = $request->username;
        $newRecord->phone_number = $request->phone_number;
        $newRecord->dept_id = $request->dept_id;
        $newRecord->role_id = $request->role_id;
        $newRecord->acc_id = $request->acc_id;
        $newRecord->password= bcrypt($request->password);
        //$newRecord->remember_token= $request->remember_token;
        $newRecord -> save();
        return response($newRecord);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

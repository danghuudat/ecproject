<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\JobRank;
use Illuminate\Http\Request;

class JobRankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = JobRank::find($id);
        $result = $data->delete();
        if ($result) {
            return ["result" => "record has been delete"];
        } else {
            return ["result" => "failed"];
        }
    }


    public function index()
    {
        $data = JobRank::all();
        return response($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobRank  $jobRange
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobRank  $jobRange
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobRank  $jobRange
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobRank  $jobRange
     * @return \Illuminate\Http\Response
     */
}

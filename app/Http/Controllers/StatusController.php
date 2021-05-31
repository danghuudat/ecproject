<?php

namespace App\Http\Controllers;

use App\Models\JobRank;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function destroy($id)
    {
        $data = Status::find($id);
        $result = $data->delete();
        if ($result) {
            return ["result" => "record has been delete"];
        } else {
            return ["result" => "failed"];
        }
    }


    public function index()
    {
        $data = Status::all();
        return response($data);
    }
}

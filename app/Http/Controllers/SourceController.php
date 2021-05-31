<?php

namespace App\Http\Controllers;

use App\Models\JobRank;
use App\Models\Source;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    public function destroy($id)
    {
        $data = Source::find($id);
        $result = $data->delete();
        if ($result) {
            return ["result" => "record has been delete"];
        } else {
            return ["result" => "failed"];
        }
    }


    public function index()
    {
        $data = Source::all();
        return response($data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function destroy($id)
    {
        $data = technology::find($id);
        $result = $data ->delete();
        if($result){
            return ["result"=>"record has been delete"];
        }
        else{
            return ["result"=>"failed"];
        }
    }


    public function index()
    {
        $data = technology::all();
        return response($data);
    }
}

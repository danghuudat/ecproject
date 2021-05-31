<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function destroy($id)
    {
        $data = Department::find($id);
        $result = $data->delete();
        if ($result) {
            return ["result" => "record has been delete"];
        } else {
            return ["result" => "failed"];
        }
    }


    public function index()
    {
        $data = Department::all();
        return response($data);
    }
}

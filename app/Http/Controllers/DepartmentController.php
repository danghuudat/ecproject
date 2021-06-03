<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Department;
use App\Repositories\Department\Contracts\DepartmentInterface;
use App\Repositories\Department\Eloquent\DepartmentRepository;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public $departmentReponsitory;
    public function __construct(DepartmentInterface $departmentReponsitory)
    {
        $this->departmentReponsitory = $departmentReponsitory;
    }

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
        $data = $this->departmentReponsitory->index();
        return response($data);
    }
}

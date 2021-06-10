<?php

namespace App\Http\Controllers;

use App\Repositories\Department\Contracts\DepartmentInterface;
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
        return $this->departmentReponsitory->destroy($id);
    }

    public function index()
    {
        return response($this->departmentReponsitory->index());
    }

    public function store(Request $request){
        return response($this->departmentReponsitory->store($request));
    }

    public function update(Request $request, $id){
        return response($this->departmentReponsitory->update($request, $id));
    }
}

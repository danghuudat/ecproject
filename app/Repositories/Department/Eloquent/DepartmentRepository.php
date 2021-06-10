<?php

namespace App\Repositories\Department\Eloquent;

use App\Models\Department;;
use App\Repositories\Department\Contracts\DepartmentInterface;

/**
 * Class DepartmentRepository.
 */
class DepartmentRepository implements DepartmentInterface
{
    /**
     * @return string
     *  Return the model
     */

    public function model(){
        return Department::class;
    }

    public function index(){
        $data = $this->model()::all();
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->model()::find($id);
        $result = $data->delete();
        if ($result) {
            return ["result" => "record has been delete"];
        } else {
            return ["result" => "failed"];
        }
    }

    public function store($request){
        $data = new Department();
        $data->name = $request->name;
        $data->save();
        return $data;
    }

    public function update($request, $id)
    {
        $data = $this->model()::find($id);
        $data->name = $request->name;
        $data->save();
        return $data;
    }
}

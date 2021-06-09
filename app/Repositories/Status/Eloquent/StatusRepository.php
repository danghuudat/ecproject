<?php

namespace App\Repositories\Status\Eloquent;

use App\Models\Department;;

use App\Models\Status;
use App\Repositories\Status\Contracts\StatusInterface;

/**
 * Class DepartmentRepository.
 */
class StatusRepository implements StatusInterface
{
    /**
     * @return string
     *  Return the model
     */

    public function model(){
        return Status::class;
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
        $data = new Status();
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

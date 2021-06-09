<?php

namespace App\Repositories\Technology\Eloquent;

use App\Models\Technology;
use App\Repositories\Technology\Contracts\TechnologyInterface;

/**
 * Class DepartmentRepository.
 */
class TechnologyRepository implements TechnologyInterface
{
    /**
     * @return string
     *  Return the model
     */

    public function model(){
        return Technology::class;
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
        $data = new Technology();
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

<?php

namespace App\Repositories\JobRank\Eloquent;

use App\Models\JobRank;
use App\Repositories\JobRank\Contracts\JobRankInterface;

/**
 * Class DepartmentRepository.
 */
class JobRankRepository implements JobRankInterface
{
    /**
     * @return string
     *  Return the model
     */

    public function model(){
        return JobRank::class;
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
        $data = new JobRank();
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

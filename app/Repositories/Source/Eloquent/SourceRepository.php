<?php

namespace App\Repositories\Source\Eloquent;

use App\Models\Source;
use App\Repositories\Source\Contracts\SourceInterface;

/**
 * Class DepartmentRepository.
 */
class SourceRepository implements SourceInterface
{
    /**
     * @return string
     *  Return the model
     */

    public function model(){
        return Source::class;
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
        $data = new Source();
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

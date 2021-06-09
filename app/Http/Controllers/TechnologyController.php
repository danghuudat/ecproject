<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use App\Repositories\Technology\Contracts\TechnologyInterface;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public $technologyReponsitory;
    public function __construct(TechnologyInterface $technologyReponsitory)
    {
        $this->technologyReponsitory = $technologyReponsitory;
    }

    public function destroy($id)
    {
        return $this->technologyReponsitory->destroy($id);
    }

    public function index()
    {
        return response($this->technologyReponsitory->index());
    }

    public function store(Request $request){
        return response($this->technologyReponsitory->store($request));
    }

    public function update(Request $request, $id){
        return response($this->technologyReponsitory->update($request, $id));
    }
}

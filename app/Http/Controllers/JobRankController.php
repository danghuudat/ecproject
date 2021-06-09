<?php

namespace App\Http\Controllers;


use App\Repositories\JobRank\Contracts\JobRankInterface;
use Illuminate\Http\Request;

class JobRankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $jobrankReponsitory;
    public function __construct(JobRankInterface $jobrankReponsitory)
    {
        $this->jobrankReponsitory = $jobrankReponsitory;
    }

    public function destroy($id)
    {
        return $this->jobrankReponsitory->destroy($id);
    }

    public function index()
    {
        return response($this->jobrankReponsitory->index());
    }

    public function store(Request $request){
        return response($this->jobrankReponsitory->store($request));
    }

    public function update(Request $request, $id){
        return response($this->jobrankReponsitory->update($request, $id));
    }
}

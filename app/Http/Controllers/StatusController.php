<?php

namespace App\Http\Controllers;

use App\Models\JobRank;
use App\Models\Status;
use App\Repositories\JobRank\Contracts\JobRankInterface;
use App\Repositories\Status\Contracts\StatusInterface;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public $statusReponsitory;
    public function __construct(StatusInterface $statusReponsitory)
    {
        $this->statusReponsitory = $statusReponsitory;
    }

    public function destroy($id)
    {
        return $this->statusReponsitory->destroy($id);
    }

    public function index()
    {
        return response($this->statusReponsitory->index());
    }

    public function store(Request $request){
        return response($this->statusReponsitory->store($request));
    }

    public function update(Request $request, $id){
        return response($this->statusReponsitory->update($request, $id));
    }
}

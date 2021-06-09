<?php

namespace App\Http\Controllers;

use App\Repositories\Source\Contracts\SourceInterface;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    public $sourceReponsitory;
    public function __construct(SourceInterface $sourceReponsitory)
    {
        $this->sourceReponsitory = $sourceReponsitory;
    }

    public function destroy($id)
    {
        return $this->sourceReponsitory->destroy($id);
    }

    public function index()
    {
        return response($this->sourceReponsitory->index());
    }

    public function store(Request $request){
        return response($this->sourceReponsitory->store($request));
    }

    public function update(Request $request, $id){
        return response($this->sourceReponsitory->update($request, $id));
    }
}

<?php

namespace App\Repositories\Department\Eloquent;

use App\Models\Department;
use App\Repositories\Department\Contracts\DepartmentInterface;
use Illuminate\Database\Eloquent\Model;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

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
}

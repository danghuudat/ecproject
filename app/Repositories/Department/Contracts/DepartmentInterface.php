<?php

namespace App\Repositories\Department\Contracts;

interface DepartmentInterface
{
    public function index();

    public function destroy($id);

    public function store($request);

    public function update($request, $id);

}
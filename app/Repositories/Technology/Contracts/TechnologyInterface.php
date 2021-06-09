<?php

namespace App\Repositories\Technology\Contracts;

interface TechnologyInterface
{
    public function index();

    public function destroy($id);

    public function store($request);

    public function update($request, $id);

}

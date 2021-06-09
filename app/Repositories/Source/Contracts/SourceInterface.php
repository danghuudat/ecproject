<?php

namespace App\Repositories\Source\Contracts;

interface SourceInterface
{
    public function index();

    public function destroy($id);

    public function store($request);

    public function update($request, $id);

}

<?php

namespace App\Repositories\Status\Contracts;

interface StatusInterface
{
    public function index();

    public function destroy($id);

    public function store($request);

    public function update($request, $id);

}

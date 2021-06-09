<?php

namespace App\Repositories\Account\Contracts;

interface AccountInterface
{
    public function index();

    public function update($request, $id);

    public function destroy($id);

    public function store($request);

    public function show($id);

    public function genchart();

    public function genchartNewbu();

    public function export();

    public function import();


}

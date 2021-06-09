<?php

namespace App\Repositories\JobRank\Contracts;

interface JobRankInterface
{
    public function index();

    public function destroy($id);

    public function store($request);

    public function update($request, $id);

}

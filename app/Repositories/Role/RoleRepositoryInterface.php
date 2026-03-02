<?php

namespace App\Repositories\Role;

interface RoleRepositoryInterface
{
    public function index();

    public function store($data, $permissions);

    public function show($id);

    public function update($id, $data, $permissions);

    public function delete($id);
}

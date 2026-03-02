<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function index();

    public function store($data, $role);

    public function show($id);

    public function update($id, $data, $role);

    public function delete($id);
}

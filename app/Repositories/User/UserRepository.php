<?php


namespace App\Repositories\User;

use App\Models\User;


class UserRepository implements UserRepositoryInterface
{
    public function show($id)
    {
        return User::find($id);
    }
}

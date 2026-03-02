<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function index()
    {
        return User::with('roles')->get();
    }

    public function store($data, $role)
    {
        $user = User::create($data);

        if ($role) {
            $user->syncRoles([$role]);
        }

        return $user;
    }

    public function show($id)
    {
        return User::with('roles')->findOrFail($id);
    }

    public function update($id, $data, $role)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        $user->syncRoles($role ? [$role] : []);

        return $user;
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'Admin']);
        $user = Role::create(['name' => "User"]);

        $categoryList = Permission::create(['name' => 'categoryList']);
        $categoryCreate = Permission::create(['name' => 'categoryCreate']);
        $categoryUpdate = Permission::create(['name' => 'categoryUpdate']);
        $categoryDelete = Permission::create(['name' => 'categoryDelete']);

        $productList = Permission::create(['name' => 'productList']);
        $productCreate = Permission::create(['name' => 'productCreate']);
        $productUpdate = Permission::create(['name' => 'productUpdate']);
        $productDelete = Permission::create(['name' => 'productDelete']);

        $admin->givePermissionTo([
            $categoryList,
            $categoryCreate,
            $categoryUpdate,
            $categoryDelete,

            $productList,
            $productCreate,
            $productUpdate,
            $productDelete,
        ]);

        $user->givePermissionTo([
            $categoryList,

            $productList,
        ]);
    }

}

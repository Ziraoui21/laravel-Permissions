<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(["name"=>"admin"]);
        $roleWriter = Role::create(["name"=>"writer"]);
        $roleViewer = Role::create(["name"=>"viewer"]);

        $productAdd = Permission::create(['name' => 'add products']);
        $productEdit = Permission::create(['name' => 'edit products']);
        $productDelete = Permission::create(['name' => 'delete products']);

        $roleAdmin->givePermissionTo($productAdd);
        $roleAdmin->givePermissionTo($productEdit);
        $roleAdmin->givePermissionTo($productDelete);

        $roleWriter->givePermissionTo($productEdit);

        $admin = User::create([
            "email" => "admin@gmail.com",
            "name" => "admin",
            "password" => Hash::make("12341234")
        ]);

        $writer = User::create([
            "email" => "writer@gmail.com",
            "name" => "writer",
            "password" => Hash::make("12341234")
        ]);

        $viewer = User::create([
            "email" => "viewer@gmail.com",
            "name" => "viewer",
            "password" => Hash::make("12341234")
        ]);

        $admin->assignRole('admin');
        $writer->assignRole('writer');
        $viewer->assignRole('viewer');
    }
}

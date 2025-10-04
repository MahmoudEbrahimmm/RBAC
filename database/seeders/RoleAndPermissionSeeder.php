<?php

namespace Database\Seeders;

use App\Enum\PermissionsEnum;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = collect(PermissionsEnum::values())->map(function($permission){
            return ['name' => $permission];
        })->toArray();

        Permission::insert($permissions);

        $ownerRole = Role::create(['name' => 'owner']);
        $ownerRole->permissions()->sync(Permission::pluck('id')->toArray());
    }
}

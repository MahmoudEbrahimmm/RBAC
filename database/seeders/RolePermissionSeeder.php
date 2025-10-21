<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Create owner role
        $ownerRole = Role::create(['name' => 'Owner']);
        
        // Uploade all permission on db
        $permissions = PermissionEnum::cases();
        foreach($permissions as $permission){
            Permission::create(['name' => $permission->value]);
        }
        $ownerRole->permissions()->attach(Permission::all());

    }
}

<?php

namespace App\Policies;

use App\Enum\PermissionsEnum;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissions(PermissionsEnum::VIEW_ROLES->value);
    }

    public function view(User $user, Role $role): bool
    {
        return $user->hasPermissions(PermissionsEnum::VIEW_ROLE->value);

    }

    public function create(User $user): bool
    {
        return $user->hasPermissions(PermissionsEnum::CREATE_ROLE->value);
        
    }

    public function update(User $user, Role $role): bool
    {
        return $user->hasPermissions(PermissionsEnum::UPDATE_ROLE->value);
        
    }
    
    public function delete(User $user, Role $role): bool
    {
        return $user->hasPermissions(PermissionsEnum::DELETE_ROLE->value);
    }

    public function restore(User $user, Role $role): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Role $role): bool
    {
        return false;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'otp',
        'role',
        'account_verified_at',
        'logout_other_devices',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'account_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function sessions() : HasMany {
        return $this->hasMany(Session::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function getAllPermissions(){
        $directPermissions = $this->permissions->pluck('name')->toArray();
        $rolePermissions = $this->roles->flatMap(fn($role) => $role->permissions
            ->pluck('name'))->toArray();

        return array_unique(array_merge($directPermissions, $rolePermissions));
    }

    public function hasPermissions(array $permissions){
        return !empty(array_intersect($this->getAllPermissions(), $permissions));
    }

}
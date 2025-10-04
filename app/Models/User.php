<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'otp',
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
    public function roles() {
        return $this->belongsToMany(Role::class);
    }
    public function permissions() {
        return $this->roles()->with('permissions')->get()
            ->pluck('permissions')->flatten()->pluck('name')
            ->unique()->toArray();
    }
    public function hasPermissions(string $permission){
        return in_array($permission, $this->permissions());
    }

}
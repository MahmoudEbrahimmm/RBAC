<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'ID' => $this->id,
            'Name' => $this->name,
            'E-mail' => $this->email,
            'PERMISSIONS' => $this->whenLoaded('permissions', $this->permissions->pluck('name')),
            'ROLES' => RoleResource::collection($this->whenLoaded('roles')),
        ];
    }
}

<?php

namespace App\Http\Requests\API\V1\Roles;

use Illuminate\Foundation\Http\FormRequest;

class AssignPermissionsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id'
        ];
    }
}

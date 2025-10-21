<?php

namespace App\Http\Requests\API\V1\Roles;

use Illuminate\Foundation\Http\FormRequest;

class AssignRolesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id'
        ];
    }
}

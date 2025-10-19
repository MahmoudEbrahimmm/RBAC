<?php

namespace App\Http\Requests\Auth;

use App\Rules\RecaptchaV3Rule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest{
    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'identifier' => 'nullable|max:255',
            'password' => 'required|string|max:255',
            'remember' => 'nullable|in:on,off',
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => 'required|string|max:50|unique:users',
            'password' => 'required|string|min:6',
            'email' => 'nullable|string|email|max:100|unique:users',
        ];
    }
}

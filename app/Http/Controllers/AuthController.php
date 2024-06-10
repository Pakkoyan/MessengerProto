<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AuthController
{
    // Метод для регистрации
    public function register(Request $request)
    {
        // Валидация данных
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:50|unique:users',
            'password' => 'required|string|min:6',
            'email' => 'nullable|string|email|max:100|unique:users',
        ]);

        // В случае проавала валидации возвращаем Bad Request
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }


    }
}

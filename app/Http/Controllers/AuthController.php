<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    // Метод для регистрации
    public function register(AuthRequest $request)
    {
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
        ]);

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        $pass = hash('sha512', $request->password);
        if (!$user || $pass != $user->password) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $token = $user->createToken('User Login')->plainTextToken;
        return response()->json([
            'success' => true,
            'Token' => $token,
            'data' => $user
        ], 200);
    }
}

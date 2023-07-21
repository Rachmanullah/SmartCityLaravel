<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\PersonalAccessToken;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        if ($user && Hash('sha512', $request->password) == $user->password) {
            $token = $user->createToken('ApiToken')->plainTextToken;
            return response()->json(
                [
                    'user' => $user,
                    'token' => $token
                ],
                200
            );
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }


    public function logout(Request $request)
    {
        $token = $request->bearerToken();

        if (empty($token)) {
            return response()->json(['message' => 'Token tidak ditemukan'], 401);
        }

        if (Auth::guard('sanctum')->check()) {
            $user = Auth::guard('sanctum')->user();
            $tokens = $user->tokens;
            foreach ($tokens as $token) {
                // $token->expires_at = now()->addMinute();
                // $token->save();
                $token->delete();
            }
            return response()->json(['user' => $user, 'message' => 'Token valid'], 200);
        } else {
            return response()->json(['message' => 'Token tidak valid'], 401);
        }
    }
    public function data(){
        $user = Auth::guard('sanctum')->user();
        return response()->json(['data'=> $user],200);
    }
}

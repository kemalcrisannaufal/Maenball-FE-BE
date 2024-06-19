<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthAPIController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);

            if ($request->password === $request->confirm_password) {
                $newData = $request->all();
                $newData['password'] = bcrypt($request->password);
                $user = User::create($newData);
                return response()->json([
                    'message' => 'Success',
                    'user' => $user,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Password does not match',
                ], 422);
            }


        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Registration Failed',
                'errors' => $e->errors(),
            ], 422);
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;

            return response()->json([
                'message' => 'Success',
                'token' => $token,
                'user' => $user
            ], 200);
        }

        return response()->json([
            'message' => 'Failed',
        ], 200);
    }


    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $user->currentAccessToken()->delete();

            return response()->json(['message' => 'Logged out successfully'], 200);
        }

        return response()->json(['message' => 'Unauthenticated'], 401);
    }

}

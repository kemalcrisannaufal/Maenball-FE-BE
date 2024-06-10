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
                    'message' => 'User registered successfully',
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
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            return response()->json([
                'message' => 'success',
                'user' => $user,
            ], 200);
        }

        return response()->json([
            'message' => 'failed',
            'errors' => [
                'email' => ['The provided credentials do not match our records.'],
            ],
        ], 401);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json([
            'message' => 'success',
        ], 200);
    }

}

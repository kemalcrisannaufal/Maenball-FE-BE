<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/admin/dashboard');
        }

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Login Gagal');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function register()
    {
        return view('auth.register');
    }

    // public function registerProcess(Request $request)
    // {
    //     if ($request->password === $request->confirm_password) {
    //         $newData = $request->all();
    //         $newData['password'] = bcrypt($request->password);
    //         $user = User::create($newData);
    //         return redirect('/login');
    //     } else {
    //         Session::flash('status', 'failed');
    //         Session::flash('message', 'Password Tidak Sama');
    //         return redirect('/register');
    //     }
    // }

    public function registerProcess(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|',
        ]);

        if ($request->password === $request->confirm_password) {
            $newData = $request->all();
            $newData['password'] = bcrypt($request->password);
            $user = User::create($newData);
            return redirect('/login');
        } else {
            Session::flash('status', 'failed');
            Session::flash('message', 'Password Tidak Sama');
            return redirect('/register');
        }
    }

}

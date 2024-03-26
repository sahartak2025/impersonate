<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImpersonateRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended();
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();;
        return redirect()->to('/');
    }

    public function impersonate(ImpersonateRequest $request, $userId)
    {
        Auth::login($request->user);
        return redirect()->to('/');
    }
}

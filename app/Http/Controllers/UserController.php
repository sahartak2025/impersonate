<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImpersonateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();
        $users = User::where('is_admin', false)->get();
        return view('users.index', compact('users', 'currentUser'));
    }
}

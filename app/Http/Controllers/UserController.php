<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImpersonateRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', false)->get();
        return view('users.index', compact('users'));
    }

    public function impersonate(ImpersonateRequest $request, $userId)
    {
        var_dump($request->request);die;

    }
}

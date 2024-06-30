<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->only(['name', 'username']));
        return $user;
    }
}

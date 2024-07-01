<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\PaginationService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::sort() //eg. ?sort[0]=id:asc
            ->filter();
        $users->orderBy('id', 'desc');//default
        return UserResource::collection(PaginationService::get($request, $users, 'user'));
    }

    // public function store(Request $request)
    // {
    //     $user = User::create($request->only(['name', 'username', "password"]));
    //     return $user;
    // }

    // public function update(Request $request, User $user)
    // {
    //     $user->update($request->only(['name', 'username']));
    //     return $user;
    // }
}

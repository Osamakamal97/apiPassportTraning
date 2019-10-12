<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUser;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use App\User;

class BasicController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function insert(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        if ($user->save()) {
            return ['state' => 'data has been inserted'];
        }

    }


    public function store(StoreUser $user): UserResource
    {
        $created_user = User::create($user->all());
        return new UserResource($created_user);
    }


}


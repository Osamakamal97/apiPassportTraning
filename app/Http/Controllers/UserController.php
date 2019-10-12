<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUser;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserResourceCollection;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public $successStatus = 200;

    public function register()
    {
        $register_user = request()->all();
//        $register_user['password'] = Hash::make(request()->password);
        $register_user['password'] = bcrypt(request()->password);
        $user = User::create($register_user);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
        return response()->json(['success' => $success]);

    }

    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }

    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
//    public function show(User $user)
//    {
//        $user_data = User::where('id', $user->id)->get()[0];
//        return response()->json([
//            'name' => $user_data->name,
//            'email' => $user_data->email
//        ]);
//
//    }

//    public function store(User $user)
//    {
//        $create_user = User::create([
//            'name' => request('name'),
//            'email' => request('email'),
//            'password' => Hash::make(request('password'))
//        ]);
//        return response()->json(['message' => 'user has been created successfully']);
//
//    }


    /**
     *
     *
     */

    /**
     * @return UserResourceCollection
     */
    public function index(): UserResourceCollection
    {
        return new UserResourceCollection(User::paginate());
    }

    /**
     * @param User $user
     * @return UserResource
     * return array of specific user
     */
    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }

    /**
     * @param StoreUser $user
     * @return UserResource
     */
    public function store(StoreUser $user): UserResource
    {
        dd('dsa');
        $userArray = request()->all();
        $userArray['password'] = Hash::make($userArray['password']);
        User::create($userArray);
//        return new UserResource($user);
        return new UserResource($userArray);
    }
//
//    public function update(UpdateUser $updateUser, User $user): UserResource
//    {
//
//        $user->update(request()->all());
//        return new UserResource($updateUser);
//    }
//
//    /**
//     * @param User $user
//     * @return UserResource
//     * @throws \Exception
//     */
//    public function destroy(User $user)
//    {
//        $user->delete();
//        return response()->json();
//    }


}

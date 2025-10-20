<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Users\StoreUserRequest;
use App\Http\Requests\API\V1\Users\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return response()->json(UserResource::collection(User::all()));
    }

    public function show(Request $request, User $user){
        return response()->json(UserResource::make($user));
    }

    public function store(StoreUserRequest $request){
        $user = User::create($request->validated());
        return response()->json([
            'msg' => 'User created successfully',
            'user' => UserResource::make($user)
        ], 201);
    }

    public function update(UpdateUserRequest $request, User $user){
        $user->update($request->validated());
        return response()->json([
            'msg' => 'User updated successfully',
            'user' => UserResource::make($user)
        ], 201);
    }

    public function destroy(Request $request, User $user){
        $user->delete();
        return response()->json([
            'msg' => 'User deleted successfuly'
        ]);
    }
    
}

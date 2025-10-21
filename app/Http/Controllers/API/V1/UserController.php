<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Roles\AssignPermissionsRequest;
use App\Http\Requests\API\V1\Roles\AssignRolesRequest;
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
    
    public function assignPermissions(AssignPermissionsRequest $request, User $user){
        $permissions = $request->input('permissions',[]);
        $user->permissions()->sync($permissions);
        return response()->json([
            'msg' => 'Permissions assigned successfully',
            'user' => UserResource::make($user->load('permissions'))
        ]);
    }
    public function removePermissions(AssignPermissionsRequest $request, User $user){
        $permissions = $request->input('permissions',[]);
        $user->permissions()->detach($permissions);
        return response()->json([
            'msg' => 'Permissions removed successfully',
            'user' => UserResource::make($user->load('permissions'))
        ]);
    }

    public function assignRoles(AssignRolesRequest $request, User $user){
        $roles = $request->input('roles', []);
        $user->roles()->sync($roles);
        return response()->json([
            'msg' => 'Roles assigned successfully',
            'user' => UserResource::make($user->load('roles'))
        ]);
    }
    public function removeRoles(AssignRolesRequest $request, User $user){
        $roles = $request->input('roles', []);
        $user->roles()->detach($roles);
        return response()->json([
            'msg' => 'Roles removed successfully',
            'user' => UserResource::make($user->load('roles'))
        ]);
    }
}

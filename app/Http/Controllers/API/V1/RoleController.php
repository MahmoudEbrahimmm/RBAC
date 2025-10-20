<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Roles\RoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return response()->json(RoleResource::collection(Role::all()));
    }

    public function show(Request $request, Role $role)
    {
        return response()->json(RoleResource::make($role));
    }
    
    public function store(RoleRequest $request)
    {
        $role = Role::create($request->validated());
        return response()->json([
            'msg' => 'Created role succcessfully',
            'role' => RoleResource::make($role)
        ], 201);
    }
    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        return response()->json([
            'msg' => 'Updated role succcessfully',
            'role' => RoleResource::make($role)
        ], 201);
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json([
            'msg' => 'Deleted role successfully'
        ]);
    }
}

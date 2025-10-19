<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthentcationController extends Controller
{
    public function login(LoginRequest $request){
        $user = User::where('email', $request->email)->first();

        if($user && Hash::check($request->password, $user->password)){
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'msg' => 'Login succssfully',
                'user' => UserResource::make($user),
                'token' => $token
            ], 200);
        }
        return response()->json(['message' => 'Invalid acounte'], 401);
    }

    public function register(Request $request){

    }
    public function logout(Request $request){

    }
    public function profile(Request $request){

    }
}

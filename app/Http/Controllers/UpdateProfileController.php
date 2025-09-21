<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller
{

    public function __invoke(UpdateProfileRequest $request)
    {
        $user = User::find(Auth::id());
        $user->update($request->validated());

        return back()->with('success','Profile updated successfully');
    }
}

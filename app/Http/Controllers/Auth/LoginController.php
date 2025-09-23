<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Mail\VerifyAccountMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller{

    public function __invoke(LoginRequest $request){
        $user = User::where('email', $request->identifier)
            ->orWhere('phone',$request->identifier)
        ->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return back()->with('error', 'Invalid credentials!');
        }

        if(!$user->account_verified_at){
            Mail::to($user->email)->send(new VerifyAccountMail($user->otp, $user->email));
            return redirect()->route('account.verify', $user->email);
        }

        Auth::login($user);
        if($user->logout_other_devices){
            Auth::logoutOtherDevices($request->password);
        }
        return redirect()->intended('/profile')->with('success', 'You are in');
    }
}
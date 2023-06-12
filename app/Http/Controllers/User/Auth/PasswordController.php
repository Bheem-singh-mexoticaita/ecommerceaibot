<?php

namespace  App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request)
    {

        $validated = $request->validateWithBag('updatePassword', [
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);
// Mail Functionlaty
Auth::guard('web')->logout();

$request->session()->invalidate();

$request->session()->regenerateToken();
        return response()->json(['code' => 200 ,  'status' =>'success', "message"=>"Password Sucessfully Updated",'redirect' =>route('user.login')]);
    }
}



<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('user.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function updateprofile(Request $request){
        $validator = \Validator::make($request->all(), [
            'name' => 'required|max:50',
            'dob' => 'required',
            'gender' => 'required',
            'phoneNumber' => 'required|numeric|min:10',
            'bio' => 'required|max:500'
               ]);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
            $user = Auth::user();
            $user->name = $request->name;
            $user->dob = date_format(date_create($request->dob),'Y-m/d');
            $user->gender = $request->gender;
            $user->phoneNumber = $request->phoneNumber;
            $user->bio = $request->bio;
            $status = $user->save();
        return response()->json(['code' => 200 ,  'status' =>'success', "message"=>"Your Profile is successfully Updated"]);


    }

}

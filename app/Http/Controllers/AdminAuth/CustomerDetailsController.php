<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerDetailsController extends Controller
{
   public function fetch_user_details(){
      $users =     User::all();

   //  dd($users);
   return view('admin.Users.Fetch_all_users',compact('users'));
   }
}

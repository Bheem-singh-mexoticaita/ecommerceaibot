<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Admindashboard extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
}

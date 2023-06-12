<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function append_payment_method(){

        return view('admin.Pages.paymnet_method');
    }

    public function store(Request $request){
        dd($request->all());

    


    }
}

<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{

    public function index()
    {
        return view('admin.Pages.ProductManagement.catagory.category_view');
    }


    public function getStudents(Request $request){

    }

    
}

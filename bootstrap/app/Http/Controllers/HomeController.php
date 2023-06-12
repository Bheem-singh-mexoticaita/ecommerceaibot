<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductList;
use App\Models\Subcategory;
use App\Models\ProductDetails;
use DB;
class HomeController extends Controller
{
    public function index(){
        $title = 'About Us';
        return view('pages.about-us', compact('title'));
    }
    public function Homepage(){
        $productslatest = DB::table('product_lists') ->join('product_details', 'product_lists.id', '=', 'product_details.product_id')->get();

        $title = 'Homepage';
        return view('welcome', compact('productslatest'));
    }
}

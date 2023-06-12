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
    //shop_page
    public function index(){
        $title = 'About Us';
        return view('pages.about-us', compact('title'));
    }

    public function shop_page(){
        $productslatest = DB::table('product_lists') ->join('product_details', 'product_lists.id', '=', 'product_details.product_id') ->whereNotIn('product_lists.service_type', ['service'])  ->get();
        $title = 'Shop';
        return view('shop', compact('productslatest'));
    }

    public function Homepage(){
        $productslatest = DB::table('product_lists')->join('product_details', 'product_lists.id', '=', 'product_details.product_id')->whereNotIn('product_lists.service_type', ['service'])->whereIn('product_lists.status', ['active']) ->get();
        $servicelatest = DB::table('product_lists')->join('product_details', 'product_lists.id', '=', 'product_details.product_id')
        ->where('product_lists.service_type', 'service')
        ->get();
        //dd($servicelatest);
        $title = 'Homepage';
        return view('welcome', compact('productslatest', 'servicelatest'));
    }

    public function single_product($id ){
        $related_products = DB::table('product_lists') ->join('product_details', 'product_lists.id', '=', 'product_details.product_id')->limit(3)->get();
        $single_product = DB::table('product_lists') ->join('product_details', 'product_lists.id', '=', 'product_details.product_id')->where('product_id', '=', $id)->first();
        $title = 'Homepage';
          return view('pages.single_product', compact('single_product','related_products'));

    }


    public function userdashboard(){
dd('asdsadsad');
    }
}

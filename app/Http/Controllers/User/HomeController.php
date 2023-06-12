<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CartOrder;
use App\Models\Payment;
use App\Models\ProductList;
use App\Models\ProductDetails;
use Illuminate\Support\Facades\Auth;
use DB;
class HomeController extends Controller
{
    public function dashboard(){
        $login_user_id = \Auth::user()->id;
        $cart_product = CartOrder::where('user_id', $login_user_id)->get();
        // dd(count($cart_product));
        if(count($cart_product) > 0){
            foreach ($cart_product as $key => $value1) {
                $productslatest =    DB::table('product_lists')
        ->join('cart_orders', 'product_lists.id', '=', 'cart_orders.product_id')
        ->join('payments', 'cart_orders.Order__id', '=', 'payments.Order_Number')
        ->where('product_id', '=', $value1->product_id)->whereNotIn('product_lists.service_type', ['service'])
        ->get();
            }
        }
     $productslatest = '';
        $user = Auth::user();
        return view('user.dashboard', compact('user','productslatest'));

    }

}

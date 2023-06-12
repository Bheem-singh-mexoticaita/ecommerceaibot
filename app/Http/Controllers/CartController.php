<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductList;
use App\Models\CartSession;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $session = \Session::getId();
        // 
        $auth =\Auth::check();
        $cart = session()->get('cart', []);

        if(\Auth::check() == true){
            $user_id = \Auth::user()->id;
            foreach ($cart as $key => $value) {
                $oldsession =$value['session'];
                CartSession::where('session', $oldsession)->update([
                    'session' =>$session,
                    'old_session' =>$oldsession,
                    'user_id' =>$user_id,
                 ]);
            }
            $CartSession = \DB::table('cart_sessions')->join('product_lists', 'product_lists.id', '=', 'cart_sessions.product_id')->where('cart_sessions.session', $session)->where('cart_sessions.user_id', $user_id)->get();
        }else{
           $CartSession = \DB::table('cart_sessions')->leftjoin('product_lists', 'cart_sessions.product_id', '=', 'product_lists.id ') ->leftjoin('product_details', 'product_lists.id ', '=', 'product_details.product_id') ->where('cart_sessions.session', $session);

        }
        
        
        return view('pages.addTocart', compact('CartSession'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [];
        $user_id = $request->user_id;
        $product_id = $request->product_id;
        $product_price = $request->product_price;
        $product = ProductList::findOrFail($product_id); 
        $total_stock = $product->totalstock;
        $session = \Session::getId();
        $cart = session()->get('cart', []);
        $product_price = ($request->product_sale_price >0 ) ? $request->product_sale_price : $product->price;
        if(isset($cart[$product_id])){
            $new_quantity = $cart[$product_id]['product_quantity'] + $request->product_quntity;
            $new_product_price =$product_price * $new_quantity;
        }else{
            $new_quantity = $request->product_quntity;
            $new_product_price =$product_price * $new_quantity;
        }

        $matchTheseasd = ['session'=>$session,'product_id'=>$product_id];
          $cart[$product_id] = [  "name" => $product->title,
                "quantity" => 1,
                'product_price'=>$product_price,
                'product_quantity'=>$new_quantity,
                'product_total_price'=> $new_product_price,
                "session" => $session,
            ];
     session()->put('cart', $cart);
    $data =     CartSession::updateOrCreate($matchTheseasd,[
              'user_id'   =>  $user_id,
            'session'    =>  $session,
            'product_id'   =>  $product_id,
            'product_price'=>$product_price,
            'product_quantity'=>$new_quantity,
            'product_total_price'=>$new_product_price,
            'cart' =>  json_encode($cart)
        ]);
            $data['status'] = 'success';
          $data['message'] = 'Addd To cart Successfully ';
        $data['redirect'] = 'https://ecommerceaibot.exoticaitsolutions.com/cart';
        return response()->json($data);   
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //   dd($request->all());
        $subtotal = 0; 
        $data = [];
        $product_id = $request->product_oid;
        $product_price = $request->product_price;
        $user_id = $request->user_id;
        $user_session_oid = $request->user_session_oid;
        $quantity = $request->quantity;
        $product = ProductList::findOrFail($product_id);
        $cart= session()->get('cart');
        if(isset($cart[$product_id])) {
       CartSession::where('session', $user_session_oid)->where('product_id',$product_id)->update([
                'product_quantity' =>$quantity,
                'product_total_price' =>$request->producttotalprice
             ]);
             $data =   CartSession::where('session', $user_session_oid)->get();
            //  dd($data);
            foreach ($data as $key => $value) {
                $subtotal = $subtotal + $value->product_total_price;
            }
             $cart[$product_id] = [
                "name" => $product->title,
                "price" => $product->price,
                'product_quantity'=>$request->quantity,
                'product_subtotal'=>$request->producttotalprice,
                "image" => $product->image,
                "session" => $product->session,           
            
            ];
            session()->put('cart', $cart);
        }
    
        $data = ['code' => 200 ,  'status' =>'success','subtotal'=>$subtotal,'total'=>$subtotal,  "message"=>"Edit Cart Successfully",'cart_items'=>$cart];
        return response()->json($data); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request,string $id)
    {
        $subtotal = 0; 
        $user_session_oid = $request->user_session_oid;
        $product_id = $request->product_id;
        $cart= session()->get('cart');
        if(isset($cart[$product_id])) {
            CartSession::findOrFail($id)->delete();
            unset($cart[$product_id]);
            session()->put('cart', $cart);
            $data =   CartSession::where('session', $user_session_oid)->get();
            //  dd($data);
            foreach ($data as $key => $value) {
                $subtotal = $subtotal + $value->product_total_price;
            }
        }
 
    $data = ['code' => 200 ,  'status' =>'success','subtotal'=>$subtotal,'total'=>$subtotal,  "message"=>"Product removed successfully",'cart_items'=>$cart];

    return response()->json($data);   
    }


}

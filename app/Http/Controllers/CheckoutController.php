<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartSession;
use App\Models\Useraddresses;
use App\Models\Country;
use App\Models\State;
use App\Models\CartOrder;
use App\Models\Payment;
use App\Models\City;
use App\Models\Shipping;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class CheckoutController extends Controller
{
    
    public function show_checkout_form_data(){
        
        $user_id = \Auth::user()->id;
        $countries = Country::get(["name", "id"]);
        $Useraddresses = Useraddresses::where('user_id', $user_id)->first();
        $shippiung_details = Shipping::where('shippingcountry',$Useraddresses->country)->where('shippingstate',$Useraddresses->state)->where('shippingcity',$Useraddresses->city)->where('status','active')->first();
        $CartSession = \DB::table('cart_sessions')->join('product_lists', 'product_lists.id', '=', 'cart_sessions.product_id')->where('cart_sessions.user_id', $user_id)->get();
        return view('pages.userCheckout', compact('Useraddresses','countries','CartSession','shippiung_details'));
    }

    public function store(Request $request){
        // dd($request->all());

        $request->validate(
            [
                'first_name' => 'required|max:50',
               'last_name' => 'required|max:50',
                'phone_number' => 'required|min:11|numeric',
                'address1' => 'required|max:150',
                 'Address2' => 'required|max:150',
                'countries' => 'required',
                  'state' => 'required',
                  'City' => 'required',
                   'pincode' => 'required',
          
                     ]
        );
  
    $temp_total = 0;
    $product_list = json_decode($request->product_list ,true);
    $Order__id =  \Str::random(10);
    $shipping =0;
    $handling =0;
    $tax_total =0;
    $shipping_discount =0;
    $insurance  =0;
    $discount  =0;
    foreach ($product_list as $key => $value) {
      
        $temp_total = $value['product_total_price'] + $tax_total +$shipping +$handling+ $insurance-$shipping_discount -$discount;  
        $matchThese = [];
        CartOrder::insert([
        'user_id'=>$request->user_id,
        'Order__id'=>$Order__id ,
        'product_id'=>$value['product_id'],
        'quantity'=>$value['product_quantity'],
        'unit_price'=>$value['product_price'],
        'total_price'=>$value['product_total_price'],
        'name'=>$request->first_name ." ".$request->last_name,
        'email'=>\Auth::user()->email,
        'Phone_Number'=>$request->phone_number,
        'payment_method'=>$request->payment_method,
        'delivery_address'=>$request->address1.",".$request->Address2.",".$request->City.",".$request->state.",".$request->countries.",".$request->pincode,
        'city'=>$request->City,
        'delivery_charge'=> $shipping,
        'order_date'=> date('Y-m-d'),
        'order_time'=>  date('H:i:s') ,
        'order_status'=> 'Pending' ,
        ]);
            $pment_app['purchase_units'][] = ['reference_id'=>'testing__'.$key.'', 'description' => 'Sporting Goods__'.$key.'','amount'=>['currency_code'=>'USD','value'=>$temp_total,'breakdown'=>['item_total'=>['currency_code'=> 'USD','value'=>$temp_total,'shipping'=>['currency_code'=>'USD','value'=>$shipping],'handling'=>['currency_code'=>'USD','value'=>$handling],'tax_total'=>['currency_code'=>'USD','value'=> $tax_total],'discount'=>['currency_code'=>'USD','value'=>$discount ],'shipping_discount'=>['currency_code'=>'USD','value'=>$shipping_discount ],'insurance '=>['currency_code'=>'USD','value'=>$insurance  ]]]]];
    }
// dd( $pment_app);

if($request->payment_method == 'cod'){
    $CartOrderOrder__id_ =    CartOrder::where('user_id', $request->user_id)->where('payment_method',$request->payment_method)->get();
    $grand_totela = 0;
    $CartOrderOrdid = 0;
    // dd( $CartOrderOrder__id);
    foreach ($CartOrderOrder__id_ as $key => $value1) {
        $grand_totela +=  $value1['total_price'];  
        $CartOrderOrdid = $value1['Order__id'];
    }
    $matchTheseasd = ['Userid'=>$request->user_id,'Payment_method'=>'cod','Order_Number'=> $CartOrderOrdid];
        Payment::firstOrCreate($matchTheseasd,[
            'Invoice_Number'=>\Str::random(10),
            'Order_Number'=>$CartOrderOrdid,
            'Payment_id'=>\Str::random(10),
            'payment_account_id'=>$request->user_id,
            'Userid'=>$request->user_id,
            'shipping_hending'=>$handling,
            'shipping_discount_cost'=>$shipping_discount,
            'discount_price'=>$discount,
            'insurance_cost'=>$insurance,
            'totalprice'=>$grand_totela,
            'Grandtotal'=>$grand_totela,
            'Payment_method'=>'COD',
            'PaymentStatus'=>'Paid',
        ]);
        $response['success'] = 'success';
        $response['messages'] = 'Payment Successfully';
        return redirect()->route('thankyou')  ->with('success','Payment Successfully');
        // return redirect()->route('pages.order-confirmed')->with('success','Payment Successfully');
        // 

    }elseif ($request->payment_method =='paypal') {
    $pment_app['intent'] ='CAPTURE';
    $pment_app['application_context'] =['return_url'=> route('success.payment'),'cancel_url'=>route('cancel.payment'), 'brand_name' => 'EXAMPLE INC','locale' => 'en-US'];
           $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder($pment_app);
             if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('createTransaction')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }  
}
  
    }


    public function fetchState(Request $request){
        $data['states'] = State::where("country_id", $request->country_id)
        ->get(["name", "id"]);
        return response()->json($data);

    }

    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id", $request->state_id)
                                    ->get(["name", "id"]);
                                      
        return response()->json($data);
    }
    public function fetch_selected_state_countries (Request $request){
        $data['countries'] = Country::get(["name", "id"]);
        $data['states'] = State::where("country_id", $request->country_id)
        ->get(["name", "id"]);
        $data['cities'] = City::where("state_id", $request->state_id)
        ->get(["name", "id"]);
        return response()->json($data);

    }
    public function paymentCancel()
    {
        dd('Your payment has been declend. The payment cancelation page goes here!');
    }
  
    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $login_user_id = \Auth::user()->id;
            $shipping =0;
            $handling =0;
            $tax_total =0;
            $shipping_discount =0;
            $insurance  =0;
            $discount  =0;
            $CartOrderOrder__id_ =  CartOrder::where('user_id', $login_user_id)->where('payment_method','paypal')->get();
            $grand_totela = 0;
            $CartOrderOrdid = 0;
            foreach ($CartOrderOrder__id_ as $key => $value1) {
                $grand_totela +=  $value1['total_price'];  
                $CartOrderOrdid = $value1['Order__id'];
            }
            $matchTheseasd = ['Userid'=>$login_user_id,'Payment_method'=>'cod','Order_Number'=> $CartOrderOrdid];
            Payment::firstOrCreate($matchTheseasd,[
                'Invoice_Number'=>\Str::random(10),
                'Order_Number'=>$CartOrderOrdid,
                'Payment_id'=>$response['id'] ,
                'payment_account_id'=>$response['payment_source']['paypal']['account_id'],
                'Userid'=>$login_user_id,
                'shipping_hending'=>$handling,
                'shipping_discount_cost'=>$shipping_discount,
                'discount_price'=>$discount,
                'insurance_cost'=>$insurance,
                'totalprice'=>$grand_totela,
                'Grandtotal'=>$grand_totela,
                'Payment_method'=>'Paypal',
                'PaymentStatus'=>$response['status'],
            ]);
            // dd('Payment Done Via Paypal');
            return redirect()->route('thankyou')  ->with('success','Payment Successfully');
        } else {
            return redirect()->route('thankyou')  ->with('error','Something Wrong');


}
}

public function thankyou(){
    return view('pages.order-confirmed');
}
}
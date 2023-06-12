<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Shipping;
class ShippingController extends Controller
{
    public function index(){
        $Shipping = Shipping::latest()->get();
        return view('admin.Pages.ShiipingManagement.showshipping',compact('Shipping'));
    }

    public function create()
    {
        $countries = Country::get(["name", "id"]);
        return view('admin.Pages.ShiipingManagement.createshipping',compact('countries'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'countries' => 'required',
            'state' => 'required',
            'City' => 'required',
            'delivery_time' => 'required',
            'delivery_charge' => 'required',
            'status' => 'required',
]);

if ($validator->fails()) {
    return response()->json(['errors'=>$validator->errors()]);
}
$shippingid =  \Str::random(10);
Shipping::insert([
    'shippingid'=> \Str::random(10),
    'shippingcountry'=>$request->countries,
    'shippingstate'=>$request->state,
    'shippingcity'=>$request->City,
    'Shippingdelivery_time'=>$request->delivery_time,
    'Shippingdelivery_charge'=>$request->delivery_charge,
    'status'=>$request->status,
    ]);
    return response()->json(['code' => 200 ,  'status' =>'success', "message"=>"Delivery Date and time  Successfully Created",'redirct_url'=>route('admin.shipping.index')]);

    }

}

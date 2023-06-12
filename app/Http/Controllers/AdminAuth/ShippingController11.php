<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Shipping;
class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Shipping = Shipping::latest()->get();
        return view('admin.Pages.Shipping.showshipping',compact('Shipping'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::get(["name", "id"]);
       return view('admin.Pages.Shipping.createshipping',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

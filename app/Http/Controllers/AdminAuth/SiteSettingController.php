<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\SiteInfo;
use File;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $SiteInfo = SiteInfo::first();
        return view('admin.Pages.siteSetting' ,compact('SiteInfo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'site_title' => 'required|max:50',
            'meta_description' => 'required|max:500',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:10',
            'office_time' => 'required',
               ]);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        $SiteInfo = SiteInfo::first();
        $img_logo = $SiteInfo->sitelogoimg;
        $favicon = $SiteInfo->sitefaviconimg;
        if($request->file('logo') =='null' ||$request->file('logo') ==null || $img_logo ==null){
            $img_logo = $SiteInfo->sitelogoimg;
        }else{
            $image_path = public_path('upload/SiteSetting/logo/'.$img_logo);
            if(File::exists($image_path)) {  File::delete($image_path); }
            $img_logo = time().'.'.$request->file('logo')->extension();
            $request->file('logo')->move(public_path('upload/SiteSetting/logo/'), $img_logo);
        }
        if($request->file('favicon') =='null' ||$request->file('favicon') ==null || $favicon ==null){
            $favicon = $SiteInfo->sitefaviconimg;
        }else{
          
            $image_path = public_path('upload/SiteSetting/favicon/'.$favicon);
            if(File::exists($image_path)) {  File::delete($image_path); }
            $favicon = time().'.'.$request->file('favicon')->extension();
            $request->file('favicon')->move(public_path('upload/SiteSetting/favicon/'), $favicon);
        }

        $matchTheseasd = ['site_id'=>$request->site_id];
        SiteInfo::updateOrCreate($matchTheseasd,[
            'site_title'=>$request->site_title,
            'site_meta_title'=>$request->meta_keywords,
            'site_title'=>$request->meta_description,
            'site_meta_description'=>$request->site_title,
            'siteaddress'=>$request->address,
            'email'=>$request->email,
            'phonenumber'=>$request->phone,
            'siteurl'=>$request->website_url,
            'sitelogoimg'=>$img_logo,
            'sitefaviconimg'=>$favicon,
            'officetiming'=>$request->office_time,
            'copyright_text'=>$request->copyright_text,
            'currency'=>$request->currency,
            'facebook_link'=>$request->facebook_url,
            'instagram_link'=>$request->instagram_url,
            'twitter_link'=>$request->twitter_url,
            'youtube_link'=>$request->youtube_url,
        ]);
        return response()->json(['code' => 200 ,  'status' =>'success', "message"=>"Site_setting Profile_Successfully"]); 
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

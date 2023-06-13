<title> Admin -Site Setting </title>
<x-AdminApp-layout>
    <div class="main-panel">
    
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Update Settings
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Settings </li>
                    </ol>
                </nav>
            </div>
           
            <div class="row">
                <form id="settingStore" method="post" enctype="multipart/form-data"> 
                    <input type="hidden" name="ajax_password_URL" id="ajax_password_URL" value="{{ route('admin.setting.store') }}">
                <div class="col-sm-12">
                    <div class="card p-4">
                       
                                <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label>Site Title *</label>
                                        <input type="hidden" name="site_id" value="{{$SiteInfo->site_id}}">
                                        <input type="text" placeholder="" class="form-control" name="site_title" value="{{$SiteInfo->site_title}}">
                                        <span id="site_title-error" class="error"></span>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label>Meta Keywords</label>
                                        <input type="text" placeholder="" class="form-control" name="meta_keywords" value="{{$SiteInfo->site_meta_title}}">
                                        <span id="meta_keywords-error" class="error"></span>

                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label>Meta Description *</label>
                                        <textarea class="textarea form-control" name="meta_description" id="form-message" cols="10" rows="4"> {{$SiteInfo->site_meta_description}}</textarea>
                                             <span id="meta_description-error" class="error"></span>

                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label>Address</label>
                                        <textarea class="textarea form-control" name="address" id="form-message" cols="10" rows="4">{{$SiteInfo->siteaddress}}</textarea>
                                        <span id="address-error" class="error"></span>

                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label>Email *</label>
                                        <input type="email" placeholder="" class="form-control" name="email" value="{{$SiteInfo->email}}">
                                        <span id="email-error" class="error"></span>

                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label>Phone Number *</label>
                                        <input type="text" placeholder="" class="form-control" name="phone" value="{{$SiteInfo->phonenumber}}">
                                        <span id="phone-error" class="error"></span>

                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                        <label>Website URL </label>
                                        <input type="url" placeholder="" class="form-control" name="website_url" value="{{$SiteInfo->siteurl}}">
                                        <span id="website_url-error" class="error"></span>

                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label>Logo *</label>
                                        <input name="logo" type="file" class="dropify"  data-default-file="{{ asset('upload/SiteSetting/logo/'. $SiteInfo->sitelogoimg) }}"  data-height="100" />    
                                        <span id="logo-error" class="error"></span>
                               
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label>Favicon </label>
                                        <input name="favicon" type="file" class="dropify" data-default-file="{{ asset('upload/SiteSetting/favicon/'. $SiteInfo->sitefaviconimg) }}"  data-height="100" >   
                                        <span id="favicon-error" class="error"></span>
                                 
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label>Office Time *</label>
                                        <input type="text" placeholder="" class="form-control" name="office_time" value="{{$SiteInfo->officetiming}}">
                                        <span id="office_time-error" class="error"></span>

                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label>Copyright Text </label>
                                        <input type="text" placeholder="" class="form-control" name="copyright_text" value="{{$SiteInfo->copyright_text}}">
                                        <span id="copyright_text-error" class="error"></span>

                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label>Currency </label>
                                        <input type="text" placeholder="" class="form-control" name="currency" value="{{$SiteInfo->currency}}">
                                        <span id="currency-error" class="error"></span>

                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label>Facebook</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa fa-facebook-f"></i>
                                            </span>
                                            <input type="url" placeholder="" class="form-control" name="facebook_url" value="{{$SiteInfo->facebook_link}}">
                                            <span id="facebook_url-error" class="error"></span>

                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label>Youtube</label>
                                        <div class="input-group"><span class="input-group-text">
                                                <i class="fa fa-youtube"></i>
                                            </span>
                                            <input type="url" placeholder="" class="form-control" name="youtube_url" value="{{$SiteInfo->youtube_link}}">
                                            <span id="youtube_url-error" class="error"></span>

                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label>instagram</label>

                                        <div class="input-group"><span class="input-group-text">
                                                <i class="fa fa-instagram"></i>
                                            </span>
                                            <input type="url" placeholder="" class="form-control" name="instagram_url" value="{{$SiteInfo->instagram_link}}">
                                            <span id="instagram_url-error" class="error"></span>

                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label>Twitter</label>
                                        <div class="input-group"><span class="input-group-text"><i class="fa fa-twitter"></i></span>
                                            <input type="url" placeholder="" class="form-control" name="twitter_url" value="{{$SiteInfo->twitter_link}}">
                                            <span id="twitter_url-error" class="error"></span>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 form-group mg-t-8 mt-2">
                                    <button type="submit" class="btn btn-primary"> Update Settings</button>
                                </div>
                            </div>
                     
                    </div>
             
                </div>
            </form>
            </div>
            </div>

</x-AdminApp-layout>

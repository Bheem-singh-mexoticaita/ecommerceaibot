<div class="row">
                                    <div class="col-md-6">
                                        <div class="cusstom_input">
                                            <label>First Name</label>
                                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="CartSession" id="CartSession" value="{{ \Session::getId() }}">
                                            <input type="text" placeholder="First Name" name="first_name" value="{{ $Useraddresses? $Useraddresses->First_name : old('first_name') }}">
                                            <span id="first_name-error" class="error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cusstom_input">
                                            <label>Last Name</label>
                                            <input type="text" placeholder="Last Name" name="last_name" value="{{ $Useraddresses? $Useraddresses->last_name : old('last_name') }}" >
                                            <span id="last_name-error" class="error"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="cusstom_input">
                                            <label>Phone Number</label>
                                            <input type="text" placeholder="Enter Phone Number" name="phone_number"  value="{{ $Useraddresses? $Useraddresses->Phone_Number : old('phone_number') }}">
                                            <span id="phone_number-error" class="error"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cusstom_input">
                                            <label>Address 1</label>
                                            <input type="text" placeholder="Address" name="address1"  value="{{ $Useraddresses? $Useraddresses->address1 : old('address1') }}">
                                            <span id="address1-error" class="error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cusstom_input">
                                        <input type="text" placeholder="Address2" name="Address2"  value="{{ $Useraddresses? $Useraddresses->address2 : old('Address2') }}">
                                        <span id="Address2-error" class="error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cusstom_input">
                                        <label>Country</label>
                                        <input type="hidden"   id="selected_countries" name="selected_countries" value="{{ $Useraddresses ? $Useraddresses->country :'' }}">
                                        <input type="hidden"   id="selected_countries_id" name="selected_countries_id" value="{{ $Useraddresses ? $Useraddresses->country_id :'' }}">
                                        <input type="hidden"   id="ajax_request_url" name="ajax_request_url" value="{{ route('fetch_state') }}">
                                        <input type="hidden"   id="selected_ajax_url" name="selected_ajax_url" value="{{ route('fetch_selected_state_countries') }}">
                                        <select name="countries"  id="country-dd">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $data) 
                                        @if($Useraddresses)
                                        <option value="{{$data->name}}"  {{ $Useraddresses->country == $data->name ? 'selected' : '' }}   country_id="{{$data->id}}" > {{$data->name}} </option>
                                        @else
                                        <option value="{{$data->name}}"   country_id="{{$data->id}}" > {{$data->name}}
                                        @endif
                                        @endforeach  
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cusstom_input">
                                        <label>State/Province</label>
                                        <input type="hidden"   id="ajax_request_url2" name="ajax_request_url2" value="{{ route('fetch_cities') }}">
                                        <input type="hidden"   id="selected_state" name="selected_state" value="{{ $Useraddresses ? $Useraddresses->state :'' }}">
                                         <input type="hidden"   id="selected_state_id" name="selected_state_id" value="{{ $Useraddresses ? $Useraddresses->state_id :'' }}">
                                         <select id="state-dd"  name ="state" class="form-control"> </select>  
                                         <span id="state-error" class="error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="cusstom_input">
                                        <label>City</label>
                                        <input type="hidden"   id="selected_city" name="selected_city" value="{{ $Useraddresses ? $Useraddresses->city :'' }}">
                                        <input type="hidden"   id="selected_city_id" name="selected_city_id" value="{{ $Useraddresses ? $Useraddresses->city_id :'' }}">            <select id="city-dd" name="City" class="form-control">  </select>   
                                        <span id="City-error" class="error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cusstom_input">
                                            <label>Postal code</label>
                                            <input type="text" placeholder="2345" name="pincode" value="{{ $Useraddresses? $Useraddresses->pincode : old('pincode') }}">
                                            <span id="pincode-error" class="error"></span>
                                        </div>
                                    </div>
                                </div>
                    
<div class="radio_btnns">
    <label>Save this information for next time</label>
    <div class="row">
        <div class="col-md-6">
            <div class="radio_input">
            @if($Useraddresses)
            <input  type="radio" value="1"  {{ $Useraddresses->is_shipping_addre == 1 ? 'checked' : '' }}   name="is_shipping_addre">

            @else
            <input  type="radio" value="1"  name="is_shipping_addre">

            @endif
                <label >Yes</label>
            </div>
        </div>
    </div>
</div>
<div class="radio_btnns">
    <label>Address type</label>
    <div class="row">
    @if($Useraddresses)
    
    <div class="col-md-6">
            <div class="radio_input">
                <input id="Address-type-home" type="radio" value="Home"  {{ $Useraddresses->Addresstype == 'Home' ? 'checked' : '' }}  name="Addresstype">
                <label for="Address-type-home">Home <span>(All Day Delivery)</span></label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="radio_input">
                <input id="Address-type-office" type="radio" value="Office" {{ $Useraddresses->Addresstype == 'Office' ? 'checked' : '' }}   name="Addresstype">
                <label for="Address-type-office">Office <span> (Delivery 9 AM - 5 PM)</span></label>
            </div>
        </div>

    @else

    <div class="col-md-6">
            <div class="radio_input">
                <input id="Address-type-home" type="radio" value="Home"  name="Address_type">
                <label for="Address-type-home">Home <span>(All Day Delivery)</span></label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="radio_input">
                <input id="Address-type-office" type="radio" value="Office"  name="Address-type">
                <label for="Address-type-office">Office <span> (Delivery 9 AM - 5 PM)</span></label>
            </div>
        </div>

    @endif

    </div>
    
</div>

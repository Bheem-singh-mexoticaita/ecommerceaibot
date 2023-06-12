
<form id="update_account" method="POST"  >

<input type="hidden"   id="ajax_URL" name="ajax_URL" value="{{ route('update.profile') }}">
<input type="hidden" name="login_user_id" id="login_user_id" value="{{ Auth::user()->id}}">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="account_input">
                        <x-input-label for="name" :value="__('Full Name')" />
                          <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" />
                          <span  id="name-error"class ="error"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="account_input">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" readonly  class="mt-1 block w-full" :value="old('email', $user->email)" />
                        <span  id="email-error"class ="error"></span>

                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="account_input">
                        <x-input-label for="email" :value="__('DOB')" />
                        <input id="datepicker" name="dob" type="text" value="{{date_format(date_create(old('dob', $user->dob)),'m/d/Y')}}">
                        <span  id="dob-error"class ="error"></span>

                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="account_input">
                          <x-input-label for="email" :value="__('Gender')" />
                          <select name="gender" id="gender">
                            <option value="" >Choose Gender</option>
                            <option value="male" {{ old('gender', $user->gender) == "male" ? 'selected' : "" }} >Male</option>
                            <option value="female" {{ old('gender', $user->gender) == "female" ? 'selected' : "" }}>Female</option>
                          </select>
                          <span  id="gender-error"class ="error"></span>

                        </div>
                      </div>
                     
                      <div class="col-md-12">
                        <div class="account_input">
                          <label>Phone Number</label>
                          <input type="text" name="phoneNumber" id="phoneNumber" value="{{old('phoneNumber', $user->phoneNumber)}}">   
                          <span  id="phoneNumber-error"class ="error"></span>
                     
                        </div>
                      </div>
                    </div>
                      <div class="col-md-12">
                        <div class="account_input">
                          <label>About</label>
                          <textarea placeholder="Bio" name="bio">{{old('bio', $user->bio)}}</textarea>
                          <span  id="bio-error"class ="error"></span>
                        </div>
                      </div>
                    </div>
                    <div class="acc_frombttn">
                      <button type="submit" class="theme_btn">
                        Update Account
                      </button>
                    </div>
                  </form>
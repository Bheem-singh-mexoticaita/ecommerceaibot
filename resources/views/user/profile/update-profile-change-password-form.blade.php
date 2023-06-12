
<form  id="changepasswordform"method="POST">

<input type="hidden"   id="ajax_password_URL" name="ajax_password_URL" value="{{ route('user.password.update') }}">
<input type="hidden" name="login_user_id" id="login_user_id" value="{{ Auth::user()->id}}">
<div class="row">

                <div class="col-md-12">
                    <div class="account_input">
                        <x-input-label for="password" :value="__('New Password')" />
                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                        <span id="password-error" class="error"></span>
              </div>
            </div>
            <div class="col-md-12">
                <div class="account_input">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                    <span id="password_confirmation-error" class="error"></span>
                    </div>
        </div>

        </div>
        <div class="acc_frombttn">
                      <button type="submit" class="theme_btn">
                      {{ __(' Update Password') }}
                      </button>
                    </div>
        <!-- <div class="flex items-center gap-4 account_input"> -->
            <!-- <x-primary-button  class="theme_btn" id="">{{ __(' Update Password') }}</x-primary-button>


        </div> -->

</form>

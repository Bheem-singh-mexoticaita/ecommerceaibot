<section>


    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div class="row">
       
                <div class="col-md-12">
                    <div class="account_input">
                        <x-input-label for="password" :value="__('New Password')" />
                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
              </div>
            </div>
            <div class="col-md-12">
                <div class="account_input">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div>
        </div>

        </div>
        <div class="flex items-center gap-4 account_input">
            <x-primary-button  class="theme_btn hjhjjhjhjhjh" id="hjhjjhjhjhjh">{{ __(' Update Password') }}</x-primary-button>


        </div>
    </form>
</section>

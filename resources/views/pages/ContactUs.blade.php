<x-app-layout>
    <section class="inner_banner contact_banner bg_style" style="background-image: url({{ asset('frontend/assets/img/contact-banner.jpg') }});">
        <div class="container">
            <div class="inner_banner_txt">
                <h2>Contact Us</h2>
            </div>
        </div>
      </section>
    <section class="help_support py_8">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="help_support_head">
                          <div class="title_head">
                              <h2>Help & Support</h2>
                          </div>
                          <ul>
                              <li><img src="{{ asset('frontend/assets/img/add_ress.png') }}" alt=""><a href="#">E-65 New York, Street 1234-F1</a></li>
                              <li><img src="{{ asset('frontend/assets/img/e-mail.png') }}" alt=""><a href="#">ecommerce@gmail.com</a></li>
                              <li><img src="{{ asset('frontend/assets/img/pho_ne.png') }}" alt=""><a href="#">01234567890</a></li>
                          </ul>
                    </div>
                </div>
                <div class="col-md-6">
                <form method="POST" id="conatact_cus_form">
                <input type="hidden" name="contact_us_action_url" id="contact_us_action_url" value="{{ route('contact-us-form') }}">

                      <div class="row">
                          <div class="col-md-12">
                              <div class="custom_input">
                              <x-text-input id="full_name" class="block mt-1 w-full" type="text"  placeholder="Enter Full Name" name="full_name" :value="old('full_name')"   autocomplete="full_name" />
                              <span  id="full_name-error"  class="error"></span>

                                </div>
                          </div>
                          
                          <div class="col-md-6">
                              <div class="custom_input">
                              <x-text-input id="email" class="block mt-1 w-full" type="text"  placeholder="Enter email address" name="email" :value="old('email')"   autocomplete="email" />
                  <span  id="email-error"  class="error"></span>                                </div>
                          </div>
                          <div class="col-md-6">
                              <div class="custom_input">
                              <x-text-input id="phone" class="block mt-1 w-full" type="tel"  placeholder="Enter Phone Number" name="phone" :value="old('phone')"   autocomplete="email" />
                  <span  id="phone-error"  class="error"></span>                                </div>
                          </div>
                      </div>
                      <div class="custom_input">
                      <textarea placeholder="Message" name="yourQuery">{{old('yourQuery')}}</textarea>
                  <span  id="yourQuery-error"  class="error"></span>                      </div>
                      <div class="contact_form_btn">
                        <button type="submit">Send</button>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

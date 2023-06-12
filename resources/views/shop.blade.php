<title>Home page </title>

<x-app-layout>
<section class="hero_banner_sec">
        <div
          class="hero_banner bg_style"
          style="background-image: url('{{ asset('frontend/assets/img/home-banner.jpg') }}')"
        >
          <div class="container">
            <div class="hero_banner_text">
              <h3>Get 50% 0ff</h3>
              <h1>Shop Wise With Price Comparisons</h1>
              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard.
              </p>
              <a href="#" class="theme_btn">Shop Now</a>
            </div>
          </div>
        </div>
        <div
          class="hero_banner bg_style"
          style="background-image: url('{{ asset('frontend/assets/img/home-banner.jpg') }}')"
        >
          <div class="container">
            <div class="hero_banner_text">
              <h3>Get 50% 0ff</h3>
              <h1>Shop Wise With Price Comparisons</h1>
              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard.
              </p>
              <a href="#" class="theme_btn">Shop Now</a>
            </div>
          </div>
        </div>
      </section>
      <section class="product_sec pro_serv">
        <div class="container">
          <div class="title_head text-center">
            <h2>Our Products</h2>
            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industry's standard.
            </p>
          </div>
          <div class="row">
            {{-- {{ $products }} --}}
            @foreach ($productslatest as $key=> $item)
            <div class="col-md-4 mb-4">
                <div class="product_box">
                  <div class="whislist_icon">
                    <img src="{{ asset('frontend/assets/img/whislist.png') }}" />
                  </div>
                  <div class="product_img text-center">
                    <img src="{{ asset('/upload/product/'.$item->title.'/Single_image/'. $item->image) }}" alt="" />
                  </div>
                  <div class="product_text">
                    <ul class="d-flex align-items-center justify-content-between">
                    <li><a href="{{ route('single.product', $item->id) }}">{{ $item->title }}</a></li>
                      <li>${{$item->price}}</li>
                    </ul>
                    <p>Lorem Ipsum is simply dummy text of the printing.</p>
                    @if (Route::has('login'))
                    <input type="hidden" name="user_id" value="">
                    @auth
                    <input type="hidden" name="user_id" value="{{ Auth::user()->name }}">
                     @else
                     @endauth
                     @endif
                    <a href="#">Buy Now<img src="{{ asset('frontend/assets/img/arrow-rt.png') }}" /></a>
                    <input type="hidden" name="product_id_{{$item->id}}" id="product_id_{{$item->id}}" value="{{$item->id}}">
                    <input type="hidden" name="ajax_url" id="ajax_url" value="{{ route('cart.store')}}">
                    <input type="hidden" name="product_quntity_{{$item->id}}" id="product_quntity__{{$item->id}}" value="1">
                    <input type="hidden" name="product_price_{{$item->id}}" id="product_price__{{$item->id}}" value="{{ $item->price }}">
                    <a href="javascript:void(0)"  id="addto_cart" product_uid ="{{$item->id}}" >Add to cart</a>                  </div>
                </div>
              </div>
            @endforeach


          </div>
        </div>
      </section>
      <section class="services_sec pro_serv">
        <div class="container">
          <div class="title_head text-center">
            <h2>Our Services</h2>
            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industry's standard.
            </p>
          </div>
          <div class="row">
            <div class="col-md-4 mb-4">
              <div class="service_box">
                <div class="service_img">
                  <img src="{{ asset('frontend/assets/img/s-1.png') }}" />
                </div>
                <div class="service_text">
                  <h5>Store</h5>
                  <p>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page when looking at
                    its layout.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="service_box">
                <div class="service_img">
                <img src="{{ asset('frontend/assets/img/s-2.png') }}" />
                </div>
                <div class="service_text">
                  <h5>Discounts</h5>
                  <p>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page when looking at
                    its layout.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="service_box">
                <div class="service_img">
                  <img src="{{ asset('frontend/assets/img/s-3.png') }}" />
                </div>
                <div class="service_text">
                  <h5>Goods</h5>
                  <p>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page when looking at
                    its layout.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="service_box">
                <div class="service_img">
                  <img src="{{ asset('frontend/assets/img/s-4.png') }}" />
                </div>
                <div class="service_text">
                  <h5>Easy Payment</h5>
                  <p>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page when looking at
                    its layout.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="service_box">
                <div class="service_img">
                  <img src="{{ asset('frontend/assets/img/s-5.png') }}" />
                </div>
                <div class="service_text">
                  <h5>Services</h5>
                  <p>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page when looking at
                    its layout.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="service_box">
                <div class="service_img">
                  <img src="{{ asset('frontend/assets/img/s-6.png') }}" />
                </div>
                <div class="service_text">
                  <h5>Delivery</h5>
                  <p>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page when looking at
                    its layout.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="why_choose_sec py_8">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-5">
              <div class="choose_img">
                <img src="{{ asset('frontend/assets/img/why-choose.jpg') }}" />
              </div>
            </div>
            <div class="col-md-7">
              <div class="choose_text title_head mb-0">
                <h2>Why Choose Us</h2>
                <h5>
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry.
                </h5>
                <ul>
                  <li>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page when looking at
                    its layout.
                  </li>
                  <li>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page when looking at
                    its layout.
                  </li>
                  <li>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page when looking at
                    its layout.
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section
        class="our_mission_sec bg_style"
        style="background-image: url('{{ asset('frontend/assets/img/mission-bnner.jpg') }}')"
      >
        <div class="container">
          <div class="title_head text-center">
            <h2>Our Mission</h2>
            <p>
              It is a long established fact that a reader will be distracted by
              the readable content of a page when looking at its layout. The
              point of using Lorem Ipsum is that it has a more-or-less normal
              distribution of letters, as opposed to using 'Content here,
              content here', making it look like readable English.
            </p>
            <p>
              It is a long established fact that a reader will be distracted by
              the readable content of a page when looking at its layout. The
              point of using Lorem Ipsum is that it has a more-or-less normal
              distribution of letters, as opposed to using 'Content here,
              content here', making it look like readable English.
            </p>
            <p>
              It is a long established fact that a reader will be distracted by
              the readable content of a page when looking at its layout. The
              point of using Lorem Ipsum is that it has a more-or-less normal
              distribution of letters, as opposed to using 'Content here,
              content here', making it look like readable English.
            </p>
          </div>
        </div>
      </section>
      <section class="latest_product py_8">
        <div class="container">
          <div
            class="latest_main_head d-flex justify-content-between align-items-end"
          >
            <div class="title_head mb-0">
              <h2>Latest Products</h2>
              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard.
              </p>
            </div>
            <div class="latest_view">
              <a href="#" class="theme_btn">View All</a>
            </div>
          </div>
          <div class="row">
            @foreach ($productslatest as $key=> $item)
            <div class="col-md-4 mb-4">
                <div class="product_box">
                  <div class="whislist_icon">
                    <img src="{{ asset('frontend/assets/img/whislist.png') }}" />
                  </div>
                  <div class="product_img text-center">
                    <img src="{{ asset('frontend/assets/img/p-1.png') }}" />
                  </div>
                  <div class="product_text">
                    <ul class="d-flex align-items-center justify-content-between">
                    <li><a href="{{ route('single.product', $item->id) }}">{{ $item->title }}</a></li>
                      <li>${{$item->price}}</li>
                    </ul>
                    <p>Lorem Ipsum is simply dummy text of the printing.</p>
                    <a href="#">Buy Now<img src="{{ asset('frontend/assets/img/arrow-rt.png') }}" /></a>
                    <input type="hidden" name="product_id_{{$item->id}}" id="product_id_{{$item->id}}" value="{{$item->id}}">
                    <input type="hidden" name="ajax_url" id="ajax_url" value="{{ route('cart.store')}}">
                    <input type="hidden" name="product_quntity_{{$item->id}}" id="product_quntity__{{$item->id}}" value="1">
                    <input type="hidden" name="product_price_{{$item->id}}" id="product_price__{{$item->id}}" value="{{ $item->price }}">
                    <a href="javascript:void(0)"  id="addto_cart" product_uid ="{{$item->id}}" >Add to cart</a>
                  </div>
                </div>
              </div>
            @endforeach

          </div>
        </div>
      </section>
      <section class="who_we_sec py_8">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-4">
              <div class="who_img">
                <img src="{{ asset('frontend/assets/img/who-bnner.png') }}" />
              </div>
            </div>
            <div class="col-md-8">
              <div class="choose_text title_head mb-0">
                <h2>Who We Are</h2>
                <h5>
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry.
                </h5>
                <p>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                  The point of using Lorem Ipsum is that it has a more-or-less
                  normal distribution of letters, as opposed to using 'Content
                  here, content here', making it look like readable English.
                  Many desktop publishing packages and web page editors.
                </p>
                <p>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                  The point of using Lorem Ipsum is that it has a more-or-less
                  normal distribution of letters, as opposed to using 'Content
                  here, content here', making it look like readable English.
                  Many desktop publishing packages and web page editors.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="essential_sec py_8">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-5">
              <div class="essential_img">
                <img src="{{ asset('frontend/assets/img/ess.png') }}" />
              </div>
            </div>
            <div class="col-md-7">
              <div class="essential_text">
                <div class="title_head mb-0">
                  <h2><span>Essentials</span> For An Everyday Outfit</h2>
                </div>
                <p>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                  The point of using Lorem Ipsum is that it has a more-or-less
                  normal distribution of letters, as opposed to using 'Content
                  here, content here', making it look like readable English.
                </p>
                <a href="#" class="theme_btn">Shop Now</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="faq_sec pro_serv">
        <div class="container">
          <div class="title_head text-center">
            <h2>Frequently Asked Questions</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
          </div>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <div class="acordion_box">
                <h2 class="accordion-header" id="headingOne">
                  <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseOne"
                    aria-expanded="true"
                    aria-controls="collapseOne"
                  >
                    Lorem Ipsum is simply dummy text of the printing
                  </button>
                </h2>
                <div
                  id="collapseOne"
                  class="accordion-collapse collapse show"
                  aria-labelledby="headingOne"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Ut pretium pretium tempor. Ut eget imperdiet neque. In
                      volutpat ante semper diam molestie, et aliquam erat
                      laoreet.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <div class="acordion_box">
                <h2 class="accordion-header" id="headingTwo">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo"
                    aria-expanded="false"
                    aria-controls="collapseTwo"
                  >
                    Lorem Ipsum is simply dummy text of the printing
                  </button>
                </h2>
                <div
                  id="collapseTwo"
                  class="accordion-collapse collapse"
                  aria-labelledby="headingTwo"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Ut pretium pretium tempor. Ut eget imperdiet neque. In
                      volutpat ante semper diam molestie, et aliquam erat
                      laoreet.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <div class="acordion_box">
                <h2 class="accordion-header" id="headingThree">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseThree"
                    aria-expanded="false"
                    aria-controls="collapseThree"
                  >
                    Lorem Ipsum is simply dummy text of the printing
                  </button>
                </h2>
                <div
                  id="collapseThree"
                  class="accordion-collapse collapse"
                  aria-labelledby="headingThree"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Ut pretium pretium tempor. Ut eget imperdiet neque. In
                      volutpat ante semper diam molestie, et aliquam erat
                      laoreet.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <div class="acordion_box">
                <h2 class="accordion-header" id="headingFour">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseFour"
                    aria-expanded="false"
                    aria-controls="collapseFour"
                  >
                    Lorem Ipsum is simply dummy text of the printing
                  </button>
                </h2>
                <div
                  id="collapseFour"
                  class="accordion-collapse collapse"
                  aria-labelledby="headingFour"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Ut pretium pretium tempor. Ut eget imperdiet neque. In
                      volutpat ante semper diam molestie, et aliquam erat
                      laoreet.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <div class="acordion_box">
                <h2 class="accordion-header" id="headingFive">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseFive"
                    aria-expanded="false"
                    aria-controls="collapseFive"
                  >
                    Lorem Ipsum is simply dummy text of the printing
                  </button>
                </h2>
                <div
                  id="collapseFive"
                  class="accordion-collapse collapse"
                  aria-labelledby="headingFive"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Ut pretium pretium tempor. Ut eget imperdiet neque. In
                      volutpat ante semper diam molestie, et aliquam erat
                      laoreet.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <div class="acordion_box">
                <h2 class="accordion-header" id="headingSix">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseSix"
                    aria-expanded="false"
                    aria-controls="collapseSix"
                  >
                    Lorem Ipsum is simply dummy text of the printing
                  </button>
                </h2>
                <div
                  id="collapseSix"
                  class="accordion-collapse collapse"
                  aria-labelledby="headingSix"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Ut pretium pretium tempor. Ut eget imperdiet neque. In
                      volutpat ante semper diam molestie, et aliquam erat
                      laoreet.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="season_salesec py_8">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-4">
              <div class="season_saleimg">
                <img src="{{ asset('frontend/assets/img/sale.png') }}">
              </div>
            </div>
            <div class="col-md-8">
              <div class="season_saletext">
                <h2><span>End OFF</span> Season Sale Start</h2>
                <p>It is a long establis hed fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors.</p>
                <ul>
                  <li>
                    <h6>Day</h6>
                    <p>2 Days</p>
                  </li>
                  <li>
                    <h6>Hours</h6>
                    <p>5</p>
                  </li>
                  <li>
                    <h6>Minutes</h6>
                    <p>50</p>
                  </li>
                  <li>
                    <h6>Seconds</h6>
                    <p>40</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="newsletter_sec bg_style" style="background-image: url('{{ asset('frontend/assets/img/newsleter-bnr.jpg') }}');">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="newsletter_head">
                <h5>Get 10% Off Your First Order</h5>
                <h2>Subscribe To Our Newsletter</h2>
              </div>
            </div>
            <div class="col-md-6">
              <div class="newsletter_form">
                <form>
                  <div class="news_input">
                    <input type="email" placeholder=" Enter your email">
                  </div>
                  <div class="news_bttn">
                    <button type="submit">Subscribe Now</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="shiping_support_sec">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="ship_support_card d-flex align-items-center">
                  <div class="ship_supp_img">
                    <img src="{{ asset('frontend/assets/img/s-6.png') }}">
                  </div>
                  <div class="ship_supp_text">
                    <h6>Free Shipping</h6>
                    <p>On order over $1499</p>
                  </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="ship_support_card d-flex align-items-center">
                  <div class="ship_supp_img">
                    <img src="{{ asset('frontend/assets/img/s-4.png') }}">
                  </div>
                  <div class="ship_supp_text">
                    <h6>Quick Payment</h6>
                    <p>Online Quick Payment</p>
                  </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="ship_support_card d-flex align-items-center">
                  <div class="ship_supp_img">
                  <img src="{{ asset('frontend/assets/img/easy.png') }}">
                  </div>
                  <div class="ship_supp_text">
                    <h6>Easy Return</h6>
                    <p>Return within 24 hours</p>
                  </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="ship_support_card d-flex align-items-center">
                  <div class="ship_supp_img">
                    <img src="{{ asset('frontend/assets/img/supp.png') }}">
                  </div>
                  <div class="ship_supp_text">
                    <h6>24/7 Support</h6>
                    <p>Customer Online Support</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="contact_sec">
        <div class="row g-0 align-items-center">
          <div class="col-md-6">
            <div class="contact_img">
              <img src="{{ asset('frontend/assets/img/contact-img.jpg') }}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="contact_form">
              <div class="title_head">
                <h2>Contact Us</h2>
                <p>It is a long established fact that a reader will be distracted. </p>
              </div>
                <form method="POST" action="{{ route('contact-us-form') }}">@csrf
                <div class="custom_input">
                    <x-text-input id="full_name" class="block mt-1 w-full" type="text"  placeholder="Enter Full Name" name="full_name" :value="old('full_name')"   autocomplete="full_name" />
                    <x-input-error :messages="$errors->get('full_name')" class="mt-2" />


                  {{-- <input type="text" placeholder="Full Name" name=""> --}}
                </div>
                <div class="custom_input">
                  {{-- <input type="email" placeholder="Email"> --}}
                  <x-text-input id="email" class="block mt-1 w-full" type="text"  placeholder="Enter email address" name="email" :value="old('email')"   autocomplete="email" />
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />

                </div>
                <div class="custom_input">
                  {{-- <input type="text" placeholder="Phone Number"> --}}
                  <x-text-input id="phone" class="block mt-1 w-full" type="tel"  placeholder="Enter Phone Number" name="phone" :value="old('phone')"   autocomplete="email" />
                  <x-input-error :messages="$errors->get('phone')" class="mt-2" />

                </div>
                <div class="custom_input">
                  <textarea placeholder="Message" name="yourQuery">{{old('yourQuery')}}</textarea>
                  @error('yourQuery')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>
                <div class="contact_form_btn">
                  <button type="submit">Send</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>



</x-app-layout>

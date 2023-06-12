<title>User Dashboard</title>
<x-app-layout>
<div class="wrapper">
    @if (session('status') === 'password-updated')
    <p
        x-data="{ show: true }"
        x-show="show"
        x-transition
        x-init="setTimeout(() => show = false, 2000)"
        class="text-sm text-gray-600 dark:text-gray-400"
    >{{ __(' Update Password.') }}</p>
@endif
    <section class="dashboard_account_sec">
        <div class="container">
          <div class="dashboard_head">
            <h3>Account</h3>
          </div>
          <div class="dashboard_tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <div class="slider"></div>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="account-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#account"
                  type="button"
                  role="tab"
                  aria-controls="account"
                  aria-selected="true"
                >
                  Account Info
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="lists-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#lists"
                  type="button"
                  role="tab"
                  aria-controls="lists"
                  aria-selected="false"
                >
                  Saved Lists
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="order-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#order"
                  type="button"
                  role="tab"
                  aria-controls="order"
                  aria-selected="false"
                >
                  My Order
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="passcode-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#passcode"
                  type="button"
                  role="tab"
                  aria-controls="passcode"
                  aria-selected="false"
                >
                  Change Passcode
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="billing-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#billing"
                  type="button"
                  role="tab"
                  aria-controls="billing"
                  aria-selected="false"
                >
                  Change Billing
                </button>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div  class="tab-pane fade show active"  id="account"  role="tabpanel"  aria-labelledby="account-tab" >
                <div class="account_form">
                  <div class="acc_form-head">
                    <h4>Account information</h4>
                  </div>
                  @include('profile.edit')
              </div>
              <div
                class="tab-pane fade"
                id="lists"
                role="tabpanel"
                aria-labelledby="lists-tab"
              >
                <div class="list_product">
                  <div class="acc_form-head">
                    <h4>List of saved products</h4>
                  </div>
                  <div class="row">
                    <div class="col-md-4 mb-4">
                      <div class="product_box">
                        <div class="whislist_icon">
                          <img src="assets/img/whislist.png" />
                        </div>
                        <div class="product_img text-center">
                          <img src="assets/img/p-1.png" />
                        </div>
                        <div class="product_text">
                          <ul
                            class="d-flex align-items-center justify-content-between"
                          >
                            <li>3D Glass</li>
                            <li>$10.99</li>
                          </ul>
                          <p>
                            Lorem Ipsum is simply dummy text of the printing.
                          </p>
                          <a href="#"
                            >Buy Now<img src="assets/img/arrow-rt.png"
                          /></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 mb-4">
                      <div class="product_box">
                        <div class="whislist_icon">
                          <img src="assets/img/whislist.png" />
                        </div>
                        <div class="product_img text-center">
                          <img src="assets/img/p-2.png" />
                        </div>
                        <div class="product_text">
                          <ul
                            class="d-flex align-items-center justify-content-between"
                          >
                            <li>Stereo Headset</li>
                            <li>$10.99</li>
                          </ul>
                          <p>
                            Lorem Ipsum is simply dummy text of the printing.
                          </p>
                          <a href="#"
                            >Buy Now<img src="assets/img/arrow-rt.png"
                          /></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 mb-4">
                      <div class="product_box">
                        <div class="whislist_icon">
                          <img src="assets/img/whislist.png" />
                        </div>
                        <div class="product_img text-center">
                          <img src="assets/img/p-3.png" />
                        </div>
                        <div class="product_text">
                          <ul
                            class="d-flex align-items-center justify-content-between"
                          >
                            <li>Goldenhour Watch</li>
                            <li>$10.99</li>
                          </ul>
                          <p>
                            Lorem Ipsum is simply dummy text of the printing.
                          </p>
                          <a href="#"
                            >Buy Now<img src="assets/img/arrow-rt.png"
                          /></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="list_load text-center">
                    <a href="#" class="theme_btn"> Show me More </a>
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="order"
                role="tabpanel"
                aria-labelledby="order-tab"
              >
              {{-- @dd($productslatest) --}}
              @if ($productslatest)
              @foreach ($productslatest as $key=> $item)

              <div class="order_box">
                  <div class="order_view_deliver">
                    <div class="order_view_text">
                      <h5># {{$item->Order_Number}}</h5>
                      <p>
                      {{$item->order_date}}
                        <span>Confirmed</span>
                        <span>{{$item->PaymentStatus}}</span>
                      </p>
                    </div>
                    <div class="view_orderbtn">
                      <a href="" class="theme_btn">View Order</a>
                    </div>
                  </div>
                  <ul class="order_deliver_list">
                    <li>
                      <div class="row">
                        <div class="col-md-2">
                          <div class="order_img">
                          <a href="{{ route('single.product', $item->id) }}"> <img src="{{ asset('/upload/product/'.$item->title.'/Single_image/'. $item->image) }}" alt="" /></a>
                          </div>
                        </div>
                        <div class="col-md-10">
                          <div class="order_cards">
                            <div
                              class="order-detailed_price d-flex align-items-center justify-content-between"
                            >
                              <div class="order_deatiled_left">
                                <h5>{{$item->title}}</h5>
                                <p>Watch</p>
                              </div>
                              <div class="order_deatiled_rght">
                                <h4 class="mb-0">${{$item->Grandtotal}}</h4>
                              </div>
                            </div>
                            <div
                              class="quantity_review d-flex align-items-center justify-content-between"
                            >
                              <p>Quanity 1</p>
                              <a href="">Leave review</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>

                  </ul>
                </div>

              @endforeach
              @else

              <h1> No Order Found</h1>
              @endif

              </div>
              <div
                class="tab-pane fade"
                id="passcode"
                role="tabpanel"
                aria-labelledby="passcode-tab" >
                <div class="passowrd_form">
                  <div class="acc_form-head">
                    <h4>Update your password</h4>
                  </div>
                  @include('profile.update-profile-change-password-form')
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="billing"
                role="tabpanel"
                aria-labelledby="billing-tab"
              >
                <div class="billing_form">
                  <div class="acc_form-head">
                    <h4>Payments & payouts</h4>
                  </div>
                  <div class="billing_content">
                    <p>
                      When you receive a payment for a order, we call that
                      payment to you a "payout." Our secure payment system
                      supports several payout methods, which can be set up
                      below. Go to FAQ.
                    </p>
                    <p>
                      To get paid, you need to set up a payout method releases
                      payouts about 24 hours after a guest's scheduled time. The
                      time it takes for the funds to appear in your account
                      depends on your payout method. <a href="#">Learn more</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>


</x-app-layout>

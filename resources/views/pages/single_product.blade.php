<x-app-layout>
        <div class="wrapper">
        <section class="single_product_sec py_8">
            <div class="container">
              <div class="row">
                <div class="col-md-5">
                  <div class="product_slidenav">
                    <div class="sp_slider slider-for">
                        @foreach (json_decode( $single_product->product_multiple_image) as $product_multiple_image )
                        <div class="single_product_img">
                            <img src="{{ asset('/upload/product/'.$single_product->title.'/mutliple/'. $product_multiple_image) }}" />
                          </div>
                        @endforeach

                    </div>
                    <div class="sm_slider slider-nav">
                        @foreach (json_decode( $single_product->product_multiple_image) as $product_multiple_image )
                      <div class="single_product_img">
                        <img src="{{ asset('/upload/product/'.$single_product->title.'/mutliple/'. $product_multiple_image) }}" />
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="single_product_details">
                  
                    <h4>{{ $single_product->title }}</h4>
                    <div class="review_star d-flex align-items-center">
                      <img src="{{ asset('frontend/assets/img/star.png') }}" />
                      <img src="{{ asset('frontend/assets/img/star.png') }}" />
                      <img src="{{ asset('frontend/assets/img/star.png') }}" />
                      <img src="{{ asset('frontend/assets/img/star.png') }}" />
                      <img src="{{ asset('frontend/assets/img/star.png') }}" />
                    </div>
                    <h3>
                    <span class="new-price">
                    @if($single_product->special_price > '0.00')
                    <del>$ {{ $single_product->price }}</del> <ins>$ {{ $single_product->special_price }}</ins>
                    @else
                    $ {{ $single_product->price }}
                    @endif
                    </span>
                    <div class="col-12 d-flex align-items-center testing" >
                                        <span class="">Total Price:</span>
                                        <div class="product-price for-total-price">
                                        @if($single_product->special_price > '0.00')
                                        <h5 class="chosen_price  mb-1" >$ <span id="product_quantity_price__{{$single_product->id}}" >{{ floatval($single_product->special_price) }}</span>  </h5>
                                        @else
                                        <h5 class="chosen_price  mb-1" >$ <span id="product_quantity_price__{{$single_product->id}}" >{{ floatval($single_product->price) }}</span>  </h5>

                                        @endif
                                        </div>
                                    </div>
                    </h3>
                    <p>
                        {{ $single_product->summary }}
                    </p>
                    <div class="quanity_wishlist_sec d-flex align-items-center">
                      <div class="qty-input">
                        <button class="qty-count qty-count--minus"  data-action="minus" type="button"  >
                          -
                        </button>
                        <input  class="product-qty" type="number" name="product-qty" min="1" value="1"  product_oid ="{{$single_product->id}}"  product__price ="{{$single_product->special_price > '0.00' ? floatval($single_product->special_price) :  floatval($single_product->price) }}" />
                        <button
                          class="qty-count qty-count--add"
                          data-action="add"
                          type="button" >
                          +
                        </button>
                      </div>
                      <div class="whis_icon">
                        <a href=""> <img src="{{ asset('frontend/assets/img/whis.png') }}" /></a>
                      </div>
                    </div>
                    <input type="hidden" name="product_sale_price" id="product_sale_price{{$single_product->id}}" value="{{ floatval($single_product->special_price) }}">
                    <input type="hidden" name="product_id" id="product_id__{{$single_product->id}}" value="{{$single_product->id}}">
                    <input type="hidden" name="ajax_url" id="ajax_url" value="{{ route('cart.store')}}">
                    <input type="hidden" name="product_quntity" id="product_quntity__{{$single_product->id}}" value="1">
                    <input type="hidden" name="product_price" id="product_price__{{$single_product->id}}" value="{{$single_product->special_price > '0.00' ? floatval($single_product->special_price) :  floatval($single_product->price) }}">
                    <div class="cart_buy_bttns">
                      <a href="javascript:void(0)" class="add_cartbttn theme_btn" id="addto_cart" product_uid ="{{$single_product->id}}" >Add To Cart</a>
                      <a href="#" class="buy_bttn theme_btn">Buy Now</a>
                    </div>
                  </div>
                  <div class="faq_sec faq_box">
                    <div class="faq_accordion" id="accordionExample">
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
                              Product Description
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
                                {{ $single_product->description }}.
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
                              Features
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
                              {{ $single_product->product_Features }}.
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
                              Warranty
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
                              {{ $single_product->warrenty }} Months
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="product_sec related_products pro_serv">
            <div class="container">
              <div class="title_head text-center">
                <h2>Related Products</h2>
                <p>
                  Lorem Ipsum is simply dummy text of the printing and typesetting
                  industry. Lorem Ipsum has been the industry's standard.
                </p>
              </div>
              <div class="row">
                @foreach ( $related_products as $related_products )
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
                        <li><a href="{{ route('single.product', $related_products->id) }}">{{ $related_products->title }}</a></li>
                        <li>${{$related_products->price}}</li>
                        </ul>
                        <p>Lorem Ipsum is simply dummy text of the printing.</p>
                        <a href="#">Buy Now<img src="{{ asset('frontend/assets/img/arrow-rt.png') }}" /></a>
                      </div>
                    </div>
                  </div>
                @endforeach


              </div>
            </div>
          </section>
    </div>
</x-app-layout>

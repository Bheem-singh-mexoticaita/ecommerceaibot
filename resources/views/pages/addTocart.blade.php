<x-app-layout>

    <section class="cart_page py_8">
        <div class="container">
            
      <div class="main_cart">
        <div class="product_details">
            <div class="cart_head">
                <h3>Shopping Cart</h3>
            </div>
            @php 
        $subtotal = 0; 
      @endphp
                  @if($CartSession)
                  @foreach($CartSession as $id => $details)
                  @php
                  $subtotal = $subtotal + $details->product_total_price
        @endphp

          <div class="basket-product" id="remove_data_id__{{$details->product_id}}">
            <div class="product_items">
              <div class="product-image">
              <img src="{{ asset('/upload/product/'.$details->title.'/Single_image/'. $details->image) }}"  class="product-frame"/>
              </div>
              <div class="product-details">
                <h4>{{ $details->title}}</h4>
                <!-- <p><span>Color:</span>Black</p> -->
                
              </div>
            </div>
            <input type="hidden" name="product_id" id="product_id" value="{{$details->product_id}}">
            <input type="hidden" name="ajax_url" id="ajax_url" value="{{ route('cart.destroy', $details->id) }}">
            <input type="hidden" name="update_ajax_url" id="update_ajax_url" value="{{ route('cart.update', $details->id) }}">
                <input type="hidden" name="user_session_oid" id="user_session_oid" value="{{$details->session}}">
             <input type="hidden" name="product_quntity" id="product_quntity__{{$details->product_id}}" value="1">
              <input type="hidden" name="product_price"id="product_price__{{$details->product_id}}" value="{{ $details->product_total_price}}">           
              <div class="quantity qty-input">
                <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                <input  class="product-qty" type="number" name="product-qty" min="1" value="{{ $details->product_quantity}}"  product_oid ="{{$details->product_id}}"  product__price ="{{$details->product_price}}" />
                <!-- <input class="product-qty" type="number" name="product-qty" min="0" max="" value="{{ $details->product_quantity}}"> -->
                <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
            </div>
            <div class="price">
            <h6>$ <span id="product_quantity_price__{{$details->product_id}}">{{ $details->product_total_price }}</span></h6>

      </div>
            <div class="remove_stock_box">
                <div class="in_stock">
                    <span><img src="{{ asset('frontend/assets/img/stock.png') }}">Stock</span>
                </div>
                <div class="remove">
              

                    <button class="remove-from-cart" id="remove_cart" remove_product_oid = "{$details->product_id}}">Remove</button>
                  </div>
            </div>
                                                                               
          </div>
          @endforeach
  @else 
  YOU DON'T HAVE ANY ITEMS IN YOUR CART.

           @endif

        
          <div class="coupon_update_sec">
            <div class="coupon">
                <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Discount code"> 
                <button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply </button>
            </div>
          </div>
        </div>
        <div class="product_cart_totals">
          <div class="pro_cart_summary">
            <div class="pro_sum_head"><h5>Order Summary</h5></div>
            <div class="summary-subtotal order_summary_details d-flex align-items-center justify-content-between">
              <div class="subtotal-title">Subtotal</div>
              <div class="subtotal-value" > $<span id="subtotal">{{ $subtotal }}</span></div>
            </div>
            <div class="summary-total order_summary_details d-flex align-items-center justify-content-between">
                <div class="subtotal-title">Total</div>
                <div class="subtotal-value" > $ <span id="basket-total">{{ $subtotal}}</span></div>

            </div>
            <div class="summary-checkout">
                <button class="checkout-cta"> <a href="{{route('checkout')}}">Proceed To Checkout</a> </button>
            </div>
        </div>
        </div>
      </div>
    </div>
</section>
</x-app-layout>

<div class="row summary mb-4">

<div class="col-sm-12 text-left">
<div class="payment accordion radio-type mt-3">
    <div class="summary-subtitle">Payment Methods</div>
    <ul class="payment-metho-radio d-flex">
                                <li>
                                    <div class="radio-item_1">
                                        <input id="cashOnDelivery" value="cod" name="payment_method" type="radio" checked="">
                                        <label for="cashOnDelivery" class="radio-label_1">Cash on
                                            Delivery</label>
                                    </div>
                                </li>
                              
                                <!-- <li>
                                    <div class="radio-item_1">
                                        <input id="stripe" value="stripe" name="payment_method" type="radio" required="">
                                        <label for="stripe" class="radio-label_1">Stripe Payment</label>
                                    </div>
                                </li> -->
                                <li>
                                    <div class="radio-item_1">
                                        <input id="paypal" value="paypal" name="payment_method" type="radio" required="">
                                        <label for="paypal" class="radio-label_1">Paypal Payment</label>
                                    </div>
                                </li>
                            </ul>
                            <div class="payment"> </div>
                            <hr>
                            <div class="col-sm-12">
                            <ul class="total-summary-list">
                            <li class="charges ">
                                <span class="key">SUBTOTAL (1 ITEMS): </span>
                                <span class="value">${{$subtotal}}</span>
                            </li>

                            <li class="charges ">
                                <span class="key">Coupon Discount:</span>
                                <span class="value" id="Coupon_descount" data-value="0">$0.00</span>
                            </li>
                            @if($shippiung_details)
                            <li class="charges">
                            <span class="key" id="{{$shippiung_details->shippingid}}">Shipping Fee:</span>
                                <span class="value" id="Shipping_Fee" data-value="{{$shippiung_details->Shippingdelivery_charge}}" >${{$shippiung_details->Shippingdelivery_charge}}</span>
                                <input type="hidden" name="shiiping_charge_fee" id="shiiping_charge_fee" value="{{$shippiung_details->Shippingdelivery_charge}}">
                                </li>
                            <li class="grand-total">
                                <span class="key">GRAND TOTAL:</span>
                                <span class="value" id="GRAND_total" >${{$subtotal +$shippiung_details->Shippingdelivery_charge}}</span>
                                <input type="hidden" name="total" id="total" value="">

                            </li>

                            @else
                            <li class="charges">
                                <span class="key">Shipping Fee:</span>
                                <span class="value" id="Shipping_Fee" data-value="0" >$0.00</span>
                            </li>
                            <li class="grand-total">
                                <span class="key">GRAND TOTAL:</span>
                                <span class="value" id="GRAND_total" >${{$subtotal}}</span>
                            </li>
                            @endif
                        </ul>
                            </div>

</div>


</div>

</div>
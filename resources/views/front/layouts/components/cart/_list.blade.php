            <div class="col-12">
                <div class="table-content table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="cart-product-name">Description</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (get_cart() as $order)
                                <tr>
                                    @include('front.layouts.components.cart._item')
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row"  id="cart-page-checkout-section">
                    <div class="col-md-5 ml-auto">
                        <div class="cart-page-total">
                            <h2>Cart totals</h2>
                            <ul class="mb-20">
                                <li>Subtotal <span>{{ format_amount(get_cart_subtotal_euro()) }}</span></li>
                                <li>Total <span>{{ format_amount(get_cart_subtotal_euro()) }}</span></li>
                            </ul>
                            {{-- <a class="edu-border-btn" href="javascript:void(0);">Proceed to checkout</a> --}}
                        </div>
                    </div>
                </div>
            </div>

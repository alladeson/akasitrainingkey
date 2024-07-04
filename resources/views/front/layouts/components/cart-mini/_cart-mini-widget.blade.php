<div class="cartmini__widget">
    <div class="cartmini__widget_content">
        @if (count(get_cart()) > 0)
            <div class="cartmini__inner">
                <ul>
                    @foreach (get_cart() as $order)
                        @include('front.layouts.components.cart-mini._cart-mini-item')
                    @endforeach
                </ul>
            </div>
            <div class="cartmini__checkout">
                <div class="cartmini__checkout-title mb-30">
                    <h4>Subtotal:</h4>
                    <span>{{ format_amount(get_cart_subtotal_euro()) }}</span>
                </div>
            </div>
            <div class="cartmini__viewcart">
                <a href="{{route('cart.show')}}" class="edu-sec-btn cart-mini-btn has-spinner" data-load-text="{{ __('Loading') }}">View cart</a>
                <a href="{{route('cart.show')}}#cart-page-checkout-section" class="edu-sec-btn cart-mini-btn has-spinner" data-load-text="{{ __('Loading') }}">Checkout</a>
            </div>
        @else
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="content-error-item text-center">
                        <div class="error-thumb">
                            @include('front.layouts.components.cart-mini.__empty-cart-svg')
                        </div>
                        <div class="section-title">
                            <h6 class="mb-20">Oops! No seats reserved yet.</h6>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- loader area start -->
    @include('front.layouts.components._loader')
    <!-- loader area end -->
    <br> <br> <br>

    <!-- cart item number area start -->
    <input type="hidden" id="cart-mini-item-number" value="{{count(get_cart())}}">
    <!-- cart item number area end -->

</div>

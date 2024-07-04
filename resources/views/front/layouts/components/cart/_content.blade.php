<div class="cart-page-content">
    @if (count(get_cart()) > 0)
        <!-- Cart Area Start-->
        <section class="cart-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    @include('front.layouts.components.cart._list')
                </div>
                <!-- Paiement Mode Area Start-->
                <div class="row">
                    <div class="col-md-12 ml-auto cart-page-total">
                        <h2>Choose a payment method to proceed checkout :</h2>
                        <form id="payment-form" class="mb-20 ml-20">
                            <fieldset class="mt-20">
                                <label class="d-block ml-20 mb-5" for="fedapay_btn_radio" style="cursor: pointer;" data-bs-toggle="tooltip" title="Mtn, Moov, Celtiis Cash, Orange, T-Money, Free, Airtel, BMO, etc.">
                                    <input type="radio" name="payment_option" value="Fedapay" id="fedapay_btn_radio">
                                        Mobile Money
                                </label>
                                <label class="d-block ml-20" for="stripe_btn_radio" style="cursor: pointer;">
                                    <input type="radio" name="payment_option" value="Stripe" id="stripe_btn_radio">
                                    Credit Card / Bank Card
                                </label>
                            </fieldset>
                        </form>
                        <a class="edu-btn cart-paiement-btn Kkaipay d-none has-spinner" id="cart-paiement-btn-Kkaipay"
                            href="javascript:void(0);" data-load-text="{{ __('Loading') }}">Proceed to checkout</a>
                        <form action="{{ route('cart.paiement.fedapay') }}" method="POST">
                            @csrf
                            <a class="edu-btn cart-paiement-btn Fedapay d-none has-spinner" id="cart-paiement-btn-Fedapay"
                                href="javascript:void(0);" data-load-text="{{ __('Loading') }}">Proceed to checkout</a>
                        </form>
                        <a class="edu-btn cart-paiement-btn Stripe d-none has-spinner" id="cart-paiement-btn-Stripe"
                            href="javascript:void(0);" data-load-text="{{ __('Loading') }}">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Cart Area End-->
    @else
        <!-- content-error-area -->
        <div class="content-error-area pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="content-error-item text-center">
                            <div class="error-thumb">
                                @include('front.layouts.components.cart-mini.__empty-cart-svg')
                            </div>
                            <div class="section-title">
                                <h2 class="mb-20">Oops! No seats re served yet.</h2>
                            </div>
                            <div class="error-btn">
                                <a class="edu-btn" href="{{ route('home') }}">Back to homepage</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-error-end -->
    @endif

    <!-- cart item number area start -->
    <input type="hidden" id="cart-page-item-number" value="{{ count(get_cart()) }}">
    <!-- cart item number area end -->

    <!-- cart subtotal area start -->
    <input type="hidden" id="cart-page-subtotal-euro" value="{{ get_cart_subtotal_euro() }}">
    <input type="hidden" id="cart-page-subtotal-fcfa" value="{{ get_cart_subtotal_fcfa() }}">
    <!-- cart subtotal area end -->
</div>

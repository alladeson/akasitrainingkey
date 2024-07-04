@if (count_completed_order() > 0)
    <div class="row">
        <div class="col-12">
            <div class="table-content table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="cart-product-name">Descripton</th>
                            <th class="product-quantity">Course code</th>
                            <th class="product-price">Payment Date</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-subtotal">Total amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (get_completed_orders() as $order)
                            <tr>
                                @include('front.layouts.components.profile._orders-item')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@else
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="content-error-item text-center">
                <div class="error-thumb">
                    <img src="{{ asset_own('front/img/bg/error-thumb.png') }}" alt="image not found">
                </div>
                <div class="section-title">
                    <h2 class="mb-20">Oops! Nothing to show.</h2>
                </div>
            </div>
        </div>
    </div>
@endif

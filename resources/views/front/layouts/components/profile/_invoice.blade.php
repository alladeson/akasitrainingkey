@if (count(get_student_invoice()) > 0)
    <div class="row">
        <div class="col-12">
            <div class="table-content table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="cart-product-name">Invoice number</th>
                            <th class="product-price">Date due</th>
                            <th class="product-subtotal">Amount due</th>
                            <th class="product-quantity">Invoice</th>
                            <th class="product-quantity">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (get_student_invoice() as $invoice)
                            <tr>
                                <td class="product-quantity">{{$invoice->number}}</td>
                                <td class="product-price"><span class="amount">{{ date('F d, Y', strtotime($invoice->updated_at)) }}</span></td>
                                <td class="product-subtotal"><span class="amount">{{ format_amount($invoice->total_amount) }}</span></td>
                                <td class="product-quantity">
                                    <a href="{{asset_own('storage/invoice/'.$invoice->file_path)}}"  target='_blank' class="btn btn-light text-center"><i class="fas fa-download"></i> Pdf</a>
                                </td>
                                <td class="product-quantity">
                                    <a href="{{route('cart.show')}}#cart-page-checkout-section" class="btn btn-primary text-center has-spinner" data-load-text="{{ __('Loading') }}">Checkout</a>
                                </td>
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

@extends('front.layouts.global')

@section('title', 'Courses Catalog')

@section('third_party_stylesheets')
    <style>
        .course-price {
            font-size: 25px;
            color: #1e73be;
        }

        .course-title {
            color: #1e73be;
        }

        .course-level {
            margin-left: 5px;
        }

        .checkout-form-legend {
            font-size: 18px;
        }
    </style>
@endsection

@section('main')

    <!-- hero-area-start -->
    <div class="hero-arera course-item-height cart-page-hero-area"
        data-background="{{ asset_own('front/img/slider/course-slider.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-course-1-text">
                        <h2>My Cart</h2>
                    </div>
                    <div class="course-title-breadcrumb">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><span>Cart</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero-area-end -->

    @include('front.layouts.components.cart._content')

@endsection

@section('third_party_scripts')
    @if (Auth::check())
        @php($auth_check = 1)
    @else
        @php($auth_check = 0)
    @endif
    <script src="https://cdn.kkiapay.me/k.js"></script>
    <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>
    <script>
        $(document).ready(function() {
            //
            renewMyCartItemBtnEvent(1);

        });

        function renewMyCartItemBtnEvent(is_cart_page) {
            // 14. Cart Quantity Js
            $(".cart-page-minus").click(function() {
                var $input = $(this).parent().find("input");
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $(".cart-page-plus").click(function() {
                var $input = $(this).parent().find("input");
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });

            // Update cart item quantity
            $('input.cart-page-input').change(function() {
                if ($.isNumeric($(this).val())) { // If quantity is a number
                    updateMyCartPageOrderQuantity($(this).data('orderId'), $(this).val(), is_cart_page)
                } else {
                    // Show message error
                    Toast.fire({
                        icon: 'error',
                        title: 'The quantity must be a number.. Please try again!'
                    })
                }
            });

            // Delete cart item
            $("a.cart-page-del").on("click", function() {
                deleteMyCartOrder($(this).data('orderId'), is_cart_page);
            });

            // Update cart icon number
            $('div.cart-wrapper span.item-number').text($('input#cart-page-item-number').val());
            // Gestion de la section hero si le panier devient vide
            if (!$('input#cart-page-item-number').val()) {
                $('div.cart-page-hero-area').hide();
            } else {
                $('div.cart-page-hero-area').show();
            }
            //
            var fedapayBtn = $('a#cart-paiement-btn-Fedapay');
            fedaPay($('input#cart-page-subtotal-fcfa').val(), fedapayBtn);
            //
            $('input[name="payment_option"]').change(function() {
                //
                if ($(this).val() == 'Kkaipay') {
                    $('a.cart-paiement-btn').addClass('d-none');
                    $('a#cart-paiement-btn-Kkaipay').removeClass('d-none');
                    $('a#cart-paiement-btn-Kkaipay').on("click", function(event) {
                        var btn = $(this);
                        $(btn).buttonLoader('start');
                        kkiapayPaiement($('input#cart-page-subtotal-fcfa').val(), btn);
                    });
                }
                //
                if ($(this).val() == 'Fedapay') {
                    $('a.cart-paiement-btn').addClass('d-none');
                    $('a#cart-paiement-btn-Fedapay').removeClass('d-none');
                    $(fedapayBtn).on("click", function(event) {
                        $(fedapayBtn).buttonLoader('start');
                    });
                }
                //
                if ($(this).val() == 'Stripe') {
                    $('a.cart-paiement-btn').addClass('d-none');
                    $('a#cart-paiement-btn-Stripe').removeClass('d-none');
                    $('a#cart-paiement-btn-Stripe').on("click", function(event) {
                        var btn = $(this);
                        $(btn).buttonLoader('start');
                        // setTimeout(function() {
                        //     $(btn).buttonLoader('stop');
                        // }, 5000);
                        location.href = "{{ route('cart.paiement.stripe') }}";
                    });
                }
            });
        }

        function updateMyCartPageOrderQuantity(order_id, quantity, is_cart_page) {
            if ({{ $auth_check }}) {
                var url = '{{ route('order.update_quantity', ['order_id' => 'order_id', 'qte' => 'qte']) }}';
                $.ajax({
                    url: url.replace('order_id', order_id).replace('qte', quantity),
                    method: "patch",
                    data: {
                        'is_cart_page': is_cart_page,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(result) {
                        // to do with result
                        // Cart page section
                        $('div.cart-page-content').replaceWith(result);

                        // Renew renewMyCartItemBtnEvent
                        renewMyCartItemBtnEvent(is_cart_page);
                    },
                    error: function(error) {
                        // to do with error
                        console.log(error);
                        var error_message = "An error has occurred. Please try again!"
                        if (error.status == 401)
                            var error_message = "You are not authorized to perform this operation."
                        // Show message error
                        Toast.fire({
                            icon: 'error',
                            title: error_message,
                        })
                    },
                    beforeSend: function() {
                        //
                    },
                    complete: function(data) {
                        //
                    },
                });
            } else {
                Toast.fire({
                    icon: 'warning',
                    title: 'Please <strong class="text-info"><a href="{{ route('login') }}">log in</a></strong> first or <strong class="text-info"><a href="{{ route('register') }}">register</a></strong> to continue.'
                })
            }
        }

        function deleteMyCartOrder(order_id, is_cart_page) {
            if ({{ $auth_check }}) {
                var url = '{{ route('order.delete_cart_order', ['order_id' => 'order_id']) }}';
                $.ajax({
                    url: url.replace('order_id', order_id),
                    method: "delete",
                    data: {
                        'is_cart_page': is_cart_page,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(result) {
                        // to do with result
                        // Cart page section
                        $('div.cart-page-content').replaceWith(result);

                        // Renew renewMyCartItemBtnEvent
                        renewMyCartItemBtnEvent(is_cart_page);
                    },
                    error: function(error) {
                        // to do with error
                        console.log(error);
                        var error_message = "An error has occurred. Please try again!"
                        if (error.status == 401)
                            var error_message = "You are not authorized to perform this operation."
                        // Show message error
                        Toast.fire({
                            icon: 'error',
                            title: error_message,
                        })
                    },
                    beforeSend: function() {
                        //
                    },
                    complete: function(data) {
                        //
                    },
                });
            } else {
                Toast.fire({
                    icon: 'warning',
                    title: 'Please <strong class="text-info"><a href="{{ route('login') }}">log in</a></strong> first or <strong class="text-info"><a href="{{ route('register') }}">register</a></strong> to continue.'
                })
            }
        }

        function kkiapayPaiement(amount, btn) {
            openKkiapayWidget({
                amount: amount,
                position: "center",
                callback: "{{ route('cart.paiement.kkiapay') }}",
                data: "",
                theme: "#0095ff",
                key: "d9da5d50d3a311edb532ad421d393c9e",
                sandbox: "true"
            })
            addSuccessListener(response => {
                console.log(response);
                $(btn).buttonLoader('stop');
            });
            addFailedListener(error => {
                console.log(error);
                $(btn).buttonLoader('stop');
            });
        }

        function fedaPay(amount, btn) {
            return FedaPay.init('#cart-paiement-btn-Fedapay', {
                public_key: "pk_sandbox_JdGVRn3qrEYxZ667W50h5e55",
                transaction: {
                    amount: parseInt(amount),
                    description: "Training seat reservation on Akasi Learning Key",
                },
                customer: {
                    email: "{{ $user->email }}",
                    lastname: "{{ $profile->last_name }}",
                    firstname: "{{ $profile->first_name }}",
                },
                submit_form_on_failed: false,
                onComplete: (response) => {
                    console.log(response.transaction);
                    console.log(response.transaction.status);

                    if (response.transaction.status == "approved") {
                        $(btn).buttonLoader('stop');
                    } else {
                        $(btn).buttonLoader('stop');
                    }
                },
            });
        }
    </script>
@endsection

<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Akasi Learning Key - @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset_own('front/img/customized/favicon.png') }}">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset_own('front/css/preloader.css') }}">
    <link rel="stylesheet" href="{{ asset_own('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset_own('front/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset_own('front/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset_own('front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset_own('front/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset_own('front/css/backToTop.css') }}">
    <link rel="stylesheet" href="{{ asset_own('front/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset_own('front/css/huicalendar.css') }}">
    <link rel="stylesheet" href="{{ asset_own('front/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset_own('front/css/fontAwesome5Pro.css') }}">
    <link rel="stylesheet" href="{{ asset_own('front/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset_own('front/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset_own('front/css/style.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="https://adminlte.io/themes/v3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/toastr/toastr.min.css">
    <!--  jQuery Button Loader plugin -->
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- btn loading indicator-->
    <link
        href="{{ asset_own('plugins/jQuery-Plugin-For-Built-In-Loading-Indicator-In-Buttons-Button-Loader/buttonLoader.css') }}"
        rel="stylesheet">

    <style>
        .schedule-get-btn {
            padding: 0 20px !important;
            font-size: 16px !important;
        }
    </style>

    @yield('third_party_stylesheets')

    @yield('loader_stylesheets')

    @stack('page_css')
</head>

<body>


    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->

    <!-- pre loader area start -->
    @include('front.layouts.components._pre-loader')
    <!-- pre loader area end -->

    <!-- cart mini area start -->
    @include('front.layouts.components._cart-mini')
    <!-- cart mini area end -->

    <!-- side toggle start -->
    @include('front.layouts.components._side-toggle')
    <!-- side toggle end -->

    <header>
        <!-- header-top start-->
        @include('front.layouts.components._header-top')
        <!-- .header-are-start -->
        @include('front.layouts.components._header-area' . (isset($header) ? '-' . $header : ''))
        <!-- header-area-end -->
    </header>

    <main>
        @yield('main')
    </main>

    <!-- footer-area-start -->
    @include('front.layouts.components.footer')
    <!-- footer-area-end -->


    <!-- back to top start -->
    @include('front.layouts.components._back-to-top')
    <!-- back to top end -->

    <!-- logout modal start -->
    @include('front.layouts.components._logout-modal')
    <!-- logout modal top end -->

    @if (Auth::check())
        @php($auth_check = 1)
    @else
        @php($auth_check = 0)
    @endif

    @php($message_type = '')
    @php($message = '')
    @if (session('error'))
        @php($message_type = 'error')
        @php($message = session('error'))
    @endif
    @if (session('success'))
        @php($message_type = 'success')
        @php($message = session('success'))
    @endif
    @if (session('info'))
        @php($message_type = 'info')
        @php($message = session('info'))
    @endif
    @if (session('warning'))
        @php($message_type = 'warning')
        @php($message = session('warning'))
    @endif
    <!-- JS here -->
    <script src="{{ asset_own('front/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset_own('front/js/vendor/waypoints.min.js') }}"></script>
    <script src="{{ asset_own('front/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset_own('front/js/meanmenu.js') }}"></script>
    <script src="{{ asset_own('front/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset_own('front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset_own('front/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset_own('front/js/huicalendar.js') }}"></script>
    <script src="{{ asset_own('front/js/parallax.min.js') }}"></script>
    <script src="{{ asset_own('front/js/backToTop.js') }}"></script>
    <script src="{{ asset_own('front/js/nice-select.min.js') }}"></script>
    <script src="{{ asset_own('front/js/counterup.min.js') }}"></script>
    <script src="{{ asset_own('front/js/ajax-form.js') }}"></script>
    <script src="{{ asset_own('front/js/wow.min.js') }}"></script>
    <script src="{{ asset_own('front/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset_own('front/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset_own('front/js/main.js') }}"></script>
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://adminlte.io/themes/v3/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="https://adminlte.io/themes/v3/plugins/toastr/toastr.min.js"></script>
    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });
    </script>
    {{-- Google recaptcha --}}
    <script src='https://www.google.com/recaptcha/api.js?hl={{ str_replace('_', '-', app()->getLocale()) }}'></script>
    <!--  jQuery Button Loader plugin -->
    <script
        src="{{ asset_own('plugins/jQuery-Plugin-For-Built-In-Loading-Indicator-In-Buttons-Button-Loader/jquery.buttonLoader.js') }}">
    </script>

    {{-- Manage logout modal --}}
    <script>
        function logout(event) {
            if (event)
                event.preventDefault();
            $('#logoutModal').modal('show');

            if (false) {
                event.preventDefault();
                $(this).closest('form').submit();
            }
        }

        function logoutConfirmation(event) {
            if (event)
                event.preventDefault();
            $('form#logout-form').submit()
        }
    </script>

    <script>
        let message_type = '{{$message_type}}'
        let message = '{{$message}}'
        $(document).ready(function() {

            // add event to reserve seat btn
            toggleMinicart();

            // Show message
            if(message_type && message){
                Toast.fire({
                    icon: message_type,
                    title: message,
                })
            }

            //Initialize Select2 Elements
            $('.select2').select2();

        });

        function toggleMinicart() {
            // Add item to carte or show carte
            $(".cart-toggle-btn").on("click", function(event) {
                // Prevent propagation of click event twice
                event.stopImmediatePropagation();
                // Code to hide spinner.
                $('.loader').hide();
                addToCart($(this).data('scheduleId'));
            });
        }

        function renewCartItemBtnEvent(is_cart_page) {
            // Cart Quantity Js
            $(".cart-mini-minus").click(function() {
                var $input = $(this).parent().find("input");
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $(".cart-mini-plus").click(function() {
                var $input = $(this).parent().find("input");
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });

            // Update cart item quantity
            $('.cartmini__content input.cart-mini-input').change(function() {
                if ($.isNumeric($(this).val())) { // If quantity is a number
                    updateCartMiniOrderQuantity($(this).data('orderId'), $(this).val(), is_cart_page)
                } else {
                    // Show message error
                    Toast.fire({
                        icon: 'error',
                        title: 'The quantity must be a number.. Please try again!'
                    })
                }
            });

            // Delete cart item
            $("a.cart-mini-del").on("click", function() {
                deleteCartOrder($(this).data('orderId'), is_cart_page);
            });

            // Update cart icon number
            $('div.cart-wrapper span.item-number').text($('input#cart-mini-item-number').val());

            //BtnLoader
            $('a.cart-mini-btn').on("click", function(event) {
                var btn = $(this);
                $(btn).buttonLoader('start');
                setTimeout(function() {
                    $(btn).buttonLoader('stop');
                }, 5000);
            });
        }

        function addToCart(schedule_id) {
            if ({{ $auth_check }}) {
                var url = '{{ route('student.add_to_cart', ['schedule_id' => 'schedule_id']) }}';
                $.ajax({
                    url: url.replace('schedule_id', schedule_id),
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(result) {
                        // to do with result
                        $('div.cartmini__widget').replaceWith(result);

                        // Renew renewCartItemBtnEvent
                        renewCartItemBtnEvent(0);
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
                        // Code to hide cartmini__widget_content.
                        $('div.cartmini__widget_content').hide();
                        // Code to display spinner
                        $('.loader').show();
                        // Code to show cart mini
                        $(".cartmini__wrapper").addClass("opened");
                        $(".body-overlay").addClass("opened");
                    },
                    complete: function(data) {
                        // Code to hide spinner.
                        $('.loader').hide();
                        // Code to show courses list
                        $('div.cartmini__widget_content').show();
                    },
                });
            } else {
                var url = '{{ route('student.add_cart_to_cookie', ['schedule_id' => 'schedule_id']) }}';
                $.ajax({
                    url: url.replace('schedule_id', schedule_id),
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(result) {
                        // to do with result
                        if(result == 1)
                            location.href = "{{route('login')}}";
                    },
                    error: function(error) {
                        // to do with error
                        console.log(error);
                        var error_message = "An error has occurred. Please try again!"
                        // Show message error
                        Toast.fire({
                            icon: 'error',
                            title: error_message,
                        })
                    },
                    beforeSend: function() {
                    Toast.fire({
                        icon: 'info',
                        title: 'Operation in progress... <br/> Please wait!'
                    })
                    },
                    complete: function(data) {
                    },
                });
                // Toast.fire({
                //     icon: 'warning',
                //     title: 'Please <strong class="text-info"><a href="{{ route('login') }}">log in</a></strong> first or <strong class="text-info"><a href="{{ route('register') }}">register</a></strong> to continue.'
                // })
            }
        }

        function updateCartMiniOrderQuantity(order_id, quantity, is_cart_page) {
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
                        $('div.cartmini__widget').replaceWith(result);

                        // Renew renewCartItemBtnEvent
                        renewCartItemBtnEvent(is_cart_page);
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
                        // Code to hide spinner.
                        $('.loader').hide();
                        // Code to show courses list
                        $('div.cartmini__widget_content').show();
                    },
                });
            } else {
                Toast.fire({
                    icon: 'warning',
                    title: 'Please <strong class="text-info"><a href="{{ route('login') }}">log in</a></strong> first or <strong class="text-info"><a href="{{ route('register') }}">register</a></strong> to continue.'
                })
            }
        }

        function deleteCartOrder(order_id, is_cart_page) {
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
                        $('div.cartmini__widget').replaceWith(result);

                        // Renew renewCartItemBtnEvent
                        renewCartItemBtnEvent(is_cart_page);
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
                        // Code to hide spinner.
                        $('.loader').hide();
                        // Code to show courses list
                        $('div.cartmini__widget_content').show();
                    },
                });
            } else {
                Toast.fire({
                    icon: 'warning',
                    title: 'Please <strong class="text-info"><a href="{{ route('login') }}">log in</a></strong> first or <strong class="text-info"><a href="{{ route('register') }}">register</a></strong> to continue.'
                })
            }
        }
    </script>
    @yield('third_party_scripts')
    @stack('page_scripts')
</body>

</html>

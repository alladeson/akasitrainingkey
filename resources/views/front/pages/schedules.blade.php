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

        .courses-tag__close .icon {
            width: 8px;
            height: 8px;
            margin-left: 5px;
            transition: transform 1s;
        }
        .courses-tag__close .icon:hover {
            transform: rotate(90deg);
        }
    </style>
@endsection

@section('main')
    <!-- hero-area-start -->
    <div class="hero-arera course-item-height" data-background="{{ asset_own('front/img/slider/course-slider.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-course-1-text">
                        <h2>{{__("schedule.key1") }}</h2>
                    </div>
                    <div class="course-title-breadcrumb">
                        <nav>
                            <ol class="breadcrumb" id="courses-catalog">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{__("schedule.key2") }}</a></li>
                                <li class="breadcrumb-item"><span>{{__("schedule.key3") }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero-area-end -->

    <!-- course-barup-area -->
    <div class="course-bar-up-area pt-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    @include('front.layouts.components.catalog._top-filter')
                </div>
            </div>
        </div>
    </div>
    <!-- course-barup-area-end -->
    <!-- course-content-start -->
    <div class="course-content-area pb-90">
        <div class="container">
            <div class="row mb-10">
                <div class="col-xl-4 col-lg-4 col-md-8">
                    @include('front.layouts.components.catalog._sidebar-filter')
                </div>
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <!-- loader area start -->
                    @include('front.layouts.components._loader')
                    <!-- loader area end -->

                    <!-- courses-list area start -->
                    <div class="course-list-wrapper">
                        @include('front.layouts.components.schedules._list')
                    </div>
                    <!-- courses-list area end -->

                </div>
            </div>
        </div>
    </div>
    <!-- course-content-end -->
@endsection

@section('third_party_scripts')
    <script>

        $(document).ready(function() {
            // Code to hide spinner.
            $('.loader').hide();

            $('input.category').change(function(event) {
                // Prevent propagation of click event twice
                event.stopImmediatePropagation();
                // handle filter sidebar function
                handleFilterSidebar($(this));
            });

            //
            $('div.item-total-number-showing').find('h3.courses-number').text($('#total-number').val() + ' classes');
        });

    </script>

    @include('front.layouts.components.catalog._sidebar-filter-js')

    <script>
        function getCourses(event) {
            if (event)
                event.preventDefault();

            // Code to display spinner
            $(document).scrollTop($("#courses-catalog").offset().top);
            $.ajax({
                url: '{{route('trainings.schedule.list')}}',
                method: "POST",
                data: {
                    search: $('#search').val(),
                    categories: categories,
                    certifications: certifications,
                    vendors: vendors,
                    learning_mode: learning_mode,
                    levels: levels,
                    level_all: level_all,
                    prices: prices,
                    price_all: price_all,
                    durations: durations,
                    duration_hours: duration_hours,
                    duration_weeks: duration_weeks,
                    filter_status: filter_status,
                    _token: '{{ csrf_token() }}',
                },
                success: function(result) {
                    // to do with result
                    $('div.course-list-wrapper').find('div.row').replaceWith(result);
                    // add event to reserve seat btn
                    toggleMinicart();
                },
                error: function(error) {
                    // to do with error
                    console.log(error);
                },
                beforeSend: function() {
                    // Code to hide courses list
                    $('div.course-list-wrapper').hide();
                    // Code to display spinner
                    $('.loader').show();
                },
                complete: function() {
                    setTimeout(function() {
                        // Code to hide spinner.
                        $('.loader').hide();
                        // Code to show courses list
                        $('div.course-list-wrapper').show();
                        // Code to show course-result-showing and course-result-number
                        $('span.course-result-showing').text($('#number-displayed').val());
                        $('span.course-result-number').text($('#total-number').val());
                        $('div.item-total-number-showing').find('h3.courses-number').text($('#total-number').val() + ' classes');
                    }, 2000);
                },
            });
        }
    </script>
@endsection

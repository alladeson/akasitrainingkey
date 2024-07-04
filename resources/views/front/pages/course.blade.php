@extends('front.layouts.global')

@section('title', 'Cours Datails')

@section('third_party_stylesheets')
    <style>
        .primary-color {
            color: rgb(255, 14, 13) !important;
        }

        .secondary-color {
            color: rgb(0, 93, 174) !important;
        }

        .edu-btn-custom {
            height: 40px;
            line-height: 40px;
            font-size: 16px;
            padding: 0 20px;
        }

        .event-box-text span {
            margin-right: 0px !important;
        }

        /* .schedule-get-btn {
            padding: 0 10px !important;
            font-size: 14px !important;
            /* max-width: 110px!important;
        } */

        .schedule-icon {
            margin-right: 2px !important;
        }

        .header-social a {
            color: inherit !important;
            font-size: 18px !important;
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
                        <h2>{{__("course_details.key1") }}</h2>
                    </div>
                    <div class="course-title-breadcrumb">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{__("course_details.key2") }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('courses.catalog') }}">{{__("course_details.key3") }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $course->name_en }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero-area-end -->
    <!-- course-details-area-start -->
    <section class="course-detalis-area pb-90">
        <div class="container" style="max-width: 1400px!important;">
            <div class="row">
                <div class=" col-xxl-7 col-xl-7">
                    <div class="course-detalis-wrapper mb-30">
                        <div class="course-heading mb-20">
                            <h2>{{ $course->name_en }}</h2>
                            <div class="course-star">
                                <span>{{__("course_details.key4") }} <strong>{{ $course->code }}</strong></span>
                            </div>
                        </div>
                        <div class="course-detelis-meta">
                            <div class="row">
                                <div class="col-md-3">
                                    <a class="">
                                        <svg width="14" height="14" class="course-title" x="0" y="0"
                                            viewBox="0 0 533.886 533.886" aria-hidden="true" role="img">
                                            <use
                                                href="{{ asset_own('front/img/customized/courses/icon-sprite.svg#intermediate') }}">
                                            </use>
                                        </svg>
                                        <strong>{{ $course->level_en }}</strong>
                                    </a>
                                </div>
                                <div class="col-md-3 d-flex justify-content-center">
                                    <a>
                                        <svg width="14" height="14" class="course-title" x="0" y="0"
                                            viewBox="0 0 533.886 533.886" aria-hidden="true" role="img">
                                            <use
                                                href="{{ asset_own('front/img/customized/courses/icon-sprite.svg#clock') }}">
                                            </use>
                                        </svg>
                                        <strong>{{ $course->duration_en }}</strong>
                                    </a>
                                </div>
                                <div class="col-md-2 p-0 d-flex justify-content-end">
                                    <a href="{{ route('courses.pdf', ['id' => $course->id]) }}" target="_blank">
                                        <svg width="14" height="14" class="course-title" x="0" y="0"
                                            viewBox="0 0 533.886 533.886" aria-hidden="true" role="img">
                                            <use
                                                href="{{ asset_own('front/img/customized/courses/icon-sprite.svg#file-pdf') }}">
                                            </use>
                                        </svg>
                                        PDF
                                    </a>
                                </div>
                                <div class="col-md-2 p-0 d-flex justify-content-end">
                                    <a href="javascript:void(0);" id="wishlist-link"
                                        class="@if ($wishlist != null && $wishlist->status == true) text-success @endif">
                                        <svg width="25" height="25" viewBox="0 0 24 24"
                                            fill="@if ($wishlist != null && $wishlist->status == true) #198754 @else none @endif"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14.6923 6.08088C14.6923 5.48393 14.2618 5 13.7308 5H7.96154C7.4305 5 7 5.48393 7 6.08088V16.5294L7.76923 15.9529M10.2692 7.47059H16.0385C16.5695 7.47059 17 7.95452 17 8.55147V19L13.1538 16.1176L9.30769 19V8.55147C9.30769 7.95452 9.73819 7.47059 10.2692 7.47059Z"
                                                stroke="#464455" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <strong>{{__("course_details.key5") }}</strong>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        <svg width="20" height="20" viewBox="0 0 24 24" opacity=".50" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="24" height="24" fill="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M14 6C14 3.79086 15.7909 2 18 2C20.2091 2 22 3.79086 22 6C22 8.20914 20.2091 10 18 10C16.7961 10 15.7164 9.46813 14.9831 8.62655L9.91209 11.1621C9.96969 11.4323 10 11.7126 10 12C10 12.2874 9.96969 12.5678 9.91208 12.838L14.9831 15.3735C14.9831 15.3735 16.7961 14 18 14C20.2091 14 22 15.7909 22 18C22 20.2091 20.2091 22 18 22C15.7909 22 14 20.2091 14 18C14 17.7126 14.0303 17.4322 14.0879 17.162L9.01694 14.6265C8.28363 15.4681 7.20393 16 6 16C3.79086 16 2 14.2091 2 12C2 9.79086 3.79086 8 6 8C7.20395 8 8.28367 8.53191 9.01698 9.37354L14.0879 6.83807C14.0303 6.56781 14 6.28744 14 6Z"
                                                fill="#323232" />
                                        </svg>
                                        <strong>{{__("course_details.key6") }}</strong>
                                    </a>
                                </div>
                                <div class="col-md-12">
                                    <a>
                                        <svg width="14" height="14" class="course-title" x="0" y="0"
                                            viewBox="0 0 533.886 533.886" aria-hidden="true" role="img">
                                            <use
                                                href="{{ asset_own('front/img/customized/courses/icon-sprite.svg#units') }}">
                                            </use>
                                        </svg>
                                        {{__("course_details.key7") }} <strong>{{ $course_data['category']->name_en }}</strong>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="course-description pt-45 pb-30">
                            <div class="course-Description">
                                <h4 class="primary-color">{{__("course_details.key8") }}</h4>
                            </div>
                            <p>{{ $course->description_en }}</p>
                        </div>
                        <div class="course-learn-wrapper">
                            <div class="course-learn">
                                <div class="course-leranm-tittle">
                                    <h4 class="mb-15 primary-color">{{__("course_details.key9") }}</h4>
                                </div>
                                <div class="row">
                                    @forelse ($course_data['goals'] as $goal)
                                        <div class="col-xl-12">
                                            <div class="course-leran-text">
                                                <ul>
                                                    <li>{{ $goal->description_en }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    @empty
                                        <li style="list-style: none">-</li>
                                    @endforelse

                                </div>
                            </div>
                        </div>
                    @if(count($course_data['targeted_audiences']) > 0)
                        <div class="course-requirements pt-45">
                            <h4 class="primary-color">{{__("course_details.key10") }}</h4>
                            <div class="course-requirements-text">
                                <ul>
                                    @foreach ($course_data['targeted_audiences'] as $targeted_audience)
                                        <li>• {{ $targeted_audience->description_en }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    @if(count($course_data['included_materials']) > 0)
                        <div class="course-requirements pt-45">
                            <h4 class="primary-color">Materials Included</h4>
                            <div class="course-requirements-text">
                                <ul>
                                    @foreach ($course_data['included_materials'] as $included_material)
                                        <li>• {{ $included_material->description_en }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="course-requirements pt-45">
                        <h4 class="primary-color">{{__("course_details.key11") }}</h4>
                        <div class="course-requirements-text">
                            <ul>
                                @forelse ($course_data['pre_requisites'] as $pre_requisite)
                                    <li>• {{ $pre_requisite->description_en }}</li>
                                @empty
                                    <li style="list-style: none">• None</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <div class="course-curriculum pt-40 pb-50">
                        <div class="course-curriculam">
                            <h4 class="primary-color">{{__("course_details.key12") }}</h4>
                        </div>
                        <div class="course-curriculam-accodion mt-30">
                            <div class="accordion" id="accordionExample">
                                @forelse ($course_data['modules'] as $module)
                                    <div class="accordion-item">
                                        <div class="accordion-body" id="heading{{ $module->id }}">
                                            <button
                                                class="accordion-button  @if (!$loop->first) collapsed @endif"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $module->id }}" aria-expanded="true"
                                                aria-controls="collapse{{ $module->id }}">
                                                <span class="accordion-header">
                                                    <span class="accordion-tittle">
                                                        <span> Module {{ $loop->iteration }}:
                                                            {{ $module->title_en }}</span>
                                                    </span>
                                                </span>
                                            </button>
                                        </div>
                                        <div id="collapse{{ $module->id }}"
                                            class="accordion-collapse collapse @if ($loop->first) show @endif"
                                            aria-labelledby="heading{{ $module->id }}"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                @forelse  ($course_data['module_lessons']['module_' . $module->id] as $lesson)
                                                    <div
                                                        class="course-curriculum-content d-sm-flex justify-content-between align-items-center">
                                                        <div class="course-curriculum-info">
                                                            <i class="flaticon-list"></i>
                                                            <h4>{{ $lesson->title_en }}</h4>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <li style="list-style: none">-</li>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <h4 class="">{{__("course_details.key13") }}</h4>
                                @endforelse

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-5 col-xl-5 col-lg-8 col-md-8">
                <div class="course-video-widget mb-30">
                    <div class="course-widget-wrapper mb-30">
                        <div class="course-video-price d-flex justify-content-between">
                            <h4>{{__("course_details.key14") }} </h4>
                            <span class="primary-color">{{ format_amount($course->price_euro) }}</span>
                        </div>
                        <hr>
                        <div class="course-video-body p-0">
                            <div class="portfolio-button float-none d-flex justify-content-around">
                                <button data-filter=".c-1" class="btn btn-light m-0">{{__("course_details.key15") }}</button>
                                <button data-filter=".c-2" class="btn btn-light m-0">{{__("course_details.key16") }}</button>
                                <button data-filter=".c-3" class="btn btn-light m-0">{{__("course_details.key17") }}</button>
                            </div>
                            <br>

                            <div class="row grid course-main-items">
                                <div class="col-12 grid-item c-1">
                                    @include('front.layouts.components.courses-details._course-schedule-standard')
                                </div>
                                <div class="col-12 grid-item c-2 d-none">
                                    @include('front.layouts.components.courses-details._course-schedule-government')
                                </div>
                                <div class="col-12 grid-item c-3 d-none">
                                    @include('front.layouts.components.courses-details._course-schedule-team')
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('front.layouts.components.courses-details._share-modal')
@include('front.layouts.components.courses-details._share-modal-mail')
@endsection

@section('third_party_scripts')
@if (Auth::check())
    @php($auth_check = 1)
@else
    @php($auth_check = 0)
@endif
<script>
    $(document).ready(function() {
        // Code to hide spinner.
        $('.portfolio-button button').click(function() {
            $('.course-main-items div').removeClass('d-none');
        });
        $('#wishlist-link').click(function() {
            setWishlist();
        });
    });

    function setWishlist() {
        if ({{ $auth_check }}) {
            $.ajax({
                url: '{{ route('course.wishlist', ['id' => $course->id]) }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(result) {
                    // to do with result
                    if (result == 1) {
                        $('#wishlist-link').addClass('text-success');
                        $('#wishlist-link').find('svg').attr('fill', '#198754');
                    } else {
                        $('#wishlist-link').removeClass('text-success');
                        $('#wishlist-link').find('svg').attr('fill', 'none');
                    }
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
                    // Code
                    Toast.fire({
                        icon: 'info',
                        title: 'Operation in progress. <br/> Please wait!'
                    })
                },
                complete: function(data) {
                    if (data.status == 200) {
                        Toast.fire({
                            icon: (data.responseText == 1) ? 'success' : 'error',
                            title: 'Operation completed. <br/> ' + ((data.responseText == 1) ?
                                'The course was successfully added to wishlist.' :
                                'The course has been successfully removed from the wishlist.')
                        })
                    }
                },
            });
        } else {
            Toast.fire({
                icon: 'warning',
                title: 'Please <strong class="text-info"><a href="{{ route('login') }}">log in</a></strong> first or <strong class="text-info"><a href="{{ route('register') }}">register</a></strong> to continue.'
            })
        }
    }

    function shareCourseLinkViaMail(event) {
        if (event)
            event.preventDefault();

        //
        if ({{ $auth_check }}) {
            var mails_input = $('form#share-mail-form input[name="mails"]');
            if (!$(mails_input).val()) {
                Toast.fire({
                    icon: 'error',
                    title: 'Please enter at least one email to continue or dismiss this operation!'
                });
                return false;
            }
            var btn = $('div#shareMailModal button.share-btn-modal');
            //BtnLoader
            $(btn).buttonLoader('start');
            $.ajax({
                url: '{{ route('course.share_link', ['course_id' => $course->id]) }}',
                method: "post",
                data: {
                    course_id: $(mails_input).data('courseId'),
                    mails: $(mails_input).val(),
                    _token: '{{ csrf_token() }}',
                },
                success: function(result) {
                    // to do with result

                },
                error: function(error) {
                    // Code to stop bttonLoader
                    $(btn).buttonLoader('stop');
                    // to do with error
                    console.log(error);
                    // Show message error
                    Toast.fire({
                        icon: 'error',
                        title: 'An error has occurred. Please try again!'
                    })
                },
                beforeSend: function() {
                    // Code to start bttonLoader
                    $(btn).buttonLoader('start');
                    // Code
                    Toast.fire({
                        icon: 'info',
                        title: 'Operation in progress. <br/> Please wait!'
                    })
                },
                complete: function(data) {
                    // Code to stop bttonLoader
                    $(btn).buttonLoader('stop');
                    // Code to hide the modal
                    $('div#shareMailModal').modal('hide');
                    //
                    if (data.status == 200) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Operation completed. <br/> The training link has been sent successfully.',
                        })
                    }
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

@endsection

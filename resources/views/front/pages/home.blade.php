@extends('front.layouts.global')

@section('title', 'Accueil')

@section('third_party_stylesheets')
    <style>
        .hero-area:before {
            position: absolute;
            width: 100%;
            height: 100%;
            /* background: #005dae; */
            background: #010a2e;
            /* rgb(0,93,174) */
            content: "";
            opacity: 0.1;
        }

        .trainings-img {
            border-radius: 8px;
            box-shadow: 0px 10px 10px rgb(0 0 0 / 30%);
            border: 2px solid transparent;
            background-color: rgb(251, 251, 251);
        }

        .teacher-title,
        .top-course-title,
        .certification-topic-title {
            height: 52px;
        }

        /* .top-course-title {
                    height: 78px;
                } */

        .testimonial-items {
            height: 321.39px;
        }

        .course-price {
            font-size: 25px;
            color: #1e73be;
        }

        .course-title {
            color: #1e73be;
        }

        .schedule-icon {
            margin-right: 2px !important;
        }
    </style>
@endsection

@section('main')
    <!-- hero-area-sart -->
    @include('front.layouts.components.home._banner')
    <!-- hero-area end-->


    <!-- training-area-start -->
    @include('front.layouts.components.home._training-topics')
    <!-- training-area-end -->



    <!-- schedule-area-start -->
    <div class="event-area pt-110 pb-90">
        <div class="event-shape-wrapper position-relative">
            <div class="event-shape">
                {{-- <img src="{{asset_own('front/img/shape/feedback-img.png') }}" alt="image not found"> --}}
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 d-flex align-items-center">
                    <div class="title-wrapper">
                        <div class="section-title mb-30">
                            <h2 class="text-center">{{__("home.key38") }} <span class="down-mark-line"><span
                                        style="color: #005dae">Akasi</span><span
                                        style="color: #ff0e0d">LearningKey</span></span>
                            </h2>
                            <p class="text-center fw-bold fs-4">{{__("home.key39") }}</p>
                        </div>
                        <div class="about-img position-relative">
                            <div class="about-main-img">
                                <img src="{{ asset_own('front/img/customized/home/training-calendar.png') }}" alt="about">
                            </div>
                            <img class="about-shape-1" src="{{ asset_own('front/img/shape/education-shape-01.png') }}"
                                alt="about">
                            <img class="about-shape-2" src="{{ asset_own('front/img/shape/education-shape-02.png') }}"
                                alt="about">
                            <img class="about-shape-3" src="{{ asset_own('front/img/shape/education-shape-05.png') }}"
                                alt="about">
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-12">
                    <div class="section-title mb-45">
                        <h2 class="text-center">{{__("home.key40") }}</h2>
                    </div>
                    <div class="schedule-wrapper overflow-auto" style="max-height: 430px;">
                        @foreach ($schedules as $schedule)
                            @include('front.layouts.components.schedules._item')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- schedule-area-end -->

    <!-- education-area-start -->
    <section class="about-area p-relative pt-90 pb-70">
        <div class="container">
            <img class="about-shape" src="{{ asset_own('front/img/shape/education-shape-03.png') }}" alt="shape">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="about-img position-relative mb-50">
                        <div class="about-main-img">
                            <img src="{{ asset_own('front/img/about/about-img-1.png') }}" alt="about">
                        </div>
                        <img class="about-shape-1" src="{{ asset_own('front/img/shape/education-shape-01.png') }}"
                            alt="about">
                        <img class="about-shape-2" src="{{ asset_own('front/img/shape/education-shape-02.png') }}"
                            alt="about">
                        <img class="about-shape-3" src="{{ asset_own('front/img/shape/education-shape-05.png') }}"
                            alt="about">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="about-content mb-50">
                        <div class="section-title mb-30">
                            <h2>{{__("home.key41") }} <br>
                                {{__("home.key42") }} <span class="down-mark-line"><span
                                        style="color: #005dae">Akasi</span><span
                                        style="color: #ff0e0d">LearningKey</span></span>
                            </h2>
                        </div>
                        <div class="student-choose-list">
                            <p class=" mb-30">{{__("home.key43") }}</p>
                            <ul>
                                <li><i class="fas fa-check-circle"></i>{{__("home.key44") }} </li>
                                <li><i class="fas fa-check-circle"></i>{{__("home.key45") }}</li>
                                <li><i class="fas fa-check-circle"></i>{{__("home.key46") }}</li>
                            </ul>
                        </div>
                        <a class="edu-btn" href="{{route('contact')}}">{{__("home.key47") }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- education-area-end -->

    <!-- features-area-start-->
    <div class="features-area pt-45 pb-15" data-background="{{ asset_own('front/img/fact/fact.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="features-wrapper d-flex align-items-center mb-30">
                        <div class="features-icon">
                            <i class="flaticon-online-course"></i>
                        </div>
                        <div class="features-content">
                            <h3>{{__("home.key48") }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="features-wrapper d-flex align-items-center mb-30">
                        <div class="features-icon">
                            <i class="flaticon-certificate"></i>
                        </div>
                        <div class="features-content">
                            <h3>{{__("home.key49") }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="features-wrapper d-flex align-items-center mb-30">
                        <div class="features-icon">
                            <i class="flaticon-laptop"></i>
                        </div>
                        <div class="features-content">
                            <h3>{{__("home.key50") }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fact-area-end-->

    <!-- certification-area start -->
    @include('front.layouts.components.home._certifications')
    <!-- certification-area end -->

    <!-- member-area-start -->
    {{-- <section class="member-area pt-90 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-20">
                    <div class="section-title mb-30">
                        <h2> {{__("home.key51") }}<span class="down-mark-line-2">{{__("home.key52") }}</span></h2>
                        <div>{{__("home.key53") }}</div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="member-main-wrapper mb-30">
                        <div class="member-body text-center">
                            <div class="member-item">
                                <div class="member-thumb">
                                    <a href="javascript:void(0);"><img
                                            src="{{ asset_own('front/img/customized/instructors/pierrehoudagba.png') }}"
                                            alt="member-img"></a>
                                </div>
                                <div class="member-content">
                                    <h4 class=""><a href="javascript:void(0);">Pierre Houdagba</a></h4>
                                    <span class="text-primary m-0 teacher-title">Doctor of Engineering</span>
                                    <strong class="">{{__("home.key54") }}</strong>
                                    <span class="m-0 top-course-title">It Project Management</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="member-main-wrapper mb-30">
                        <div class="member-body text-center">
                            <div class="member-item">
                                <div class="member-thumb">
                                    <a href="javascript:void(0);"><img src="{{ asset_own('front/img/customized/instructors/I1.jpg') }}"
                                            alt="member-img"></a>
                                </div>
                                <div class="member-content">
                                    <h4 class=""><a href="javascript:void(0);">Is Dine Boukari</a></h4>
                                    <span class="text-primary m-0 teacher-title">Engineer in Business Intelligence</span>
                                    <strong class="">{{__("home.key54") }}</strong>
                                    <span class="m-0 top-course-title">Project Management Fundamentals</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="member-main-wrapper mb-30">
                        <div class="member-body text-center">
                            <div class="member-item">
                                <div class="member-thumb">
                                    <a href="javascript:void(0);"><img src="{{ asset_own('front/img/customized/instructors/I3.jpg') }}"
                                            alt="member-img"></a>
                                </div>
                                <div class="member-content">
                                    <h4 class=""><a href="javascript:void(0);">Alexandre Alle</a></h4>
                                    <span class="text-primary m-0 teacher-title">Senior Marketing Analyst</span>
                                    <strong class="">{{__("home.key54") }}</strong>
                                    <span class="m-0 top-course-title">Building Batch Data Analytics Solutions On
                                        AWS</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="member-main-wrapper mb-30">
                        <div class="member-body text-center">
                            <div class="member-item">
                                <div class="member-thumb">
                                    <a href="javascript:void(0);"><img src="{{ asset_own('front/img/customized/instructors/II5.jpg') }}"
                                            alt="member-img"></a>
                                </div>
                                <div class="member-content">
                                    <h4 class=""><a href="javascript:void(0);">Chérif Ligan</a></h4>
                                    <span class="text-primary m-0 teacher-title">IT Development</span>
                                    <strong class="">{{__("home.key54") }}</strong>
                                    <span class="m-0 top-course-title">Developping Java Web Applications</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-btn text-center mt-50">
                <a class="edu-btn" href="javascript:void(0);">All Instructors</a>
            </div>
        </div>
    </section> --}}
    <!-- member-area-end -->

    <!-- teacher-area-start -->
    {{-- <section class="teacher-area position-relative pt-120 pb-50 fix">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xxl-4 col-xl-5 col-lg-5">
                    <div class="teacher-img position-relative">
                        <img class="teacher-main-img" src="{{ asset_own('front/img/teacher/teacher.png') }}"
                            alt="image not found">
                        <img class="teacher-shape" src="{{ asset_own('front/img/teacher/teacher-shape-01.png') }}"
                            alt="image not found">
                        <img class="teacher-shape-02" src="{{ asset_own('front/img/teacher/teacher-shape-02.png') }}"
                            alt="image not found">
                        <img class="teacher-shape-03" src="{{ asset_own('front/img/teacher/teacher-shape-03.png') }}"
                            alt="image not found">
                        <img class="teacher-shape-04" src="{{ asset_own('front/img/teacher/teacher-shape-04.png') }}"
                            alt="image not found">
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-5 col-lg-5">
                    <div class="teacher-content mr-20">
                        <div class="section-title mb-30">
                            <h2>{{__("home.key55") }}<span class="down-mark-line-2">{{__("home.key56") }}</span> {{__("home.key57") }}</h2>
                        </div>
                        <p>{{__("home.key58") }}</p>
                        <a class="edu-btn btn-transparent mt-25" href="{{route('register', ['role' => 'Instructor'])}}">{{__("home.key59") }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- teacher-area-end -->


    <!-- student-choose-area start -->
    <div class="student-choose-area fix pt-90 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="student-wrapper">
                        <div class="section-title">
                            <h2>{{__("home.key60") }} <span class="down-mark-line">{{__("home.key61") }}</span>
                                <span style="color: #005dae">Akasi</span>
                                <span style="color: #ff0e0d">Learning Key</span> {{__("home.key62") }}
                            </h2>
                        </div>
                        <div class="sitdent-choose-content">
                            <p>{{__("home.key63") }}
                            </p>
                        </div>
                        <div class="student-choose-list">
                            <ul>
                                <li><i class="fas fa-check-circle"></i>{{__("home.key64") }}</li>
                                <li><i class="fas fa-check-circle"></i>{{__("home.key65") }}</li>
                                <li><i class="fas fa-check-circle"></i>{{__("home.key66") }}</li>
                                <li><i class="fas fa-check-circle"></i>{{__("home.key67") }}</li>
                                <li><i class="fas fa-check-circle"></i>{{__("home.key68") }}</li>
                                <li><i class="fas fa-check-circle"></i>{{__("home.key69") }}</li>
                                <li><i class="fas fa-check-circle"></i>{{__("home.key70") }}</li>
                            </ul>
                        </div>
                        {{-- <div class="student-btn">
                            <a class="edu-sec-btn" href="about.html">More about us</a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1">
                    <div class="student-wrapper position-relative">
                        <div class="shap-01">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="student-choose-wrapper position-relative">
                        <div class="shap-02">
                        </div>
                        <div class="shap-03">
                            <img src="{{ asset_own('front/img/shape/student-shape-03.png') }}" alt="image not found">
                        </div>
                        <div class="shap-04">
                            <img src="{{ asset_own('front/img/shape/student-shape-04.png') }}" alt="image not found">
                        </div>
                        <div class="shap-05">
                            <img src="{{ asset_own('front/img/shape/student-shape-05.png') }}" alt="image not found">
                        </div>
                        <div class="shap-06">
                            <img src="{{ asset_own('front/img/shape/student-shape-06.png') }}" alt="image not found">
                        </div>
                        <div class="shap-07">
                            <img src="{{ asset_own('front/img/shape/student-shape-07.png') }}" alt="image not found">
                        </div>
                        <div class="student-choose-thumb">
                            <img src="{{ asset_own('front/img/student-choose/student.png') }}" alt="image not found">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex flex-column-reverse flex-lg-row mt-20">
                <div class="col-xl-6 col-lg-6">
                    <div class="about-img position-relative">
                        <div class="about-main-img">
                            <img src="{{ asset_own('front/img/teacher/education.png') }}" alt="about">
                        </div>
                        <img class="about-shape-1" src="{{ asset_own('front/img/shape/education-shape-01.png') }}"
                            alt="about">
                        <img class="about-shape-2" src="{{ asset_own('front/img/shape/education-shape-02.png') }}"
                            alt="about">
                        <img class="about-shape-3" src="{{ asset_own('front/img/shape/education-shape-05.png') }}"
                            alt="about">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="about-content">
                        <div class="student-choose-list">
                            <p class=" mb-30">{{__("home.key71") }}</p>
                            <ul>
                                <li><i class="fas fa-check-circle"></i>{{__("home.key72") }}</li>
                                <li><i class="fas fa-check-circle"></i>{{__("home.key73") }}</li>
                                <li><i class="fas fa-check-circle"></i>{{__("home.key74") }}</li>
                                <li><i class="fas fa-check-circle"></i>{{__("home.key75") }}
                                </li>
                                <li><i class="fas fa-check-circle"></i>{{__("home.key76") }}</li>
                                <li><i class="fas fa-check-circle"></i>{{__("home.key77") }}</li>
                                <li><i class="fas fa-check-circle"></i>{{__("home.key78") }}</li>
                                <li><i class="fas fa-check-circle"></i>{{__("home.key79") }}/li>
                            </ul>
                        </div>
                        {{-- <a class="edu-btn" href="javascript:void(0);">Contact-us</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- student-choose-area end -->

    <!-- testimonial-area-start -->
    <div class="testimonial-area pb-120" id="testimonies">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-title text-center mb-55">
                        <h2>{{__("home.key80") }} <span class="down-mark-line">
                                <span style="color: #005dae">Akasi</span>
                                <span style="color: #ff0e0d">Learning Key</span>
                            </span></h2>
                    </div>
                </div>
            </div>
            <!-- Slider main container -->
            <div class="swiper-container testimonial-active">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @include('front.layouts.components.home._testimonies')
                </div>
                <!-- If we need pagination -->
                <div class="testimonial-pagination text-center"></div>
            </div>
        </div>
    </div>
    <!-- testimonial-area-end -->



@endsection

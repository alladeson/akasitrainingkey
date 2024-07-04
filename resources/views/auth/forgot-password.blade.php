@extends('front.layouts.global')

@section('title', 'Courses Catalog')

@section('third_party_stylesheets')
    <style>
    </style>
@endsection

@section('main')

    <!-- hero-area-start -->
    <div class="hero-arera course-item-height" data-background="{{ asset_own('front/img/slider/course-slider.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-course-1-text">
                        <h2>{{__("forget-password.key1") }}</h2>
                    </div>
                    <div class="course-title-breadcrumb" id="auth-form-anchor">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{__("forget-password.key2") }}</a></li>
                                <li class="breadcrumb-item"><span>{{__("forget-password.key3") }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero-area-end -->

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <!-- sigin-area sart-->
    <div class="signin-page-area pt-120 pb-120">
        <div class="signin-page-area-wrapper">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="signup-box text-center">
                                        <div class="signup-text">
                                            <h3>{{__("forget-password.key4") }}</h3>
                                        </div>
                                        <div class="signup-thumb">
                                            <img src="{{ asset_own('front/img/sing-up/sign-up.png') }}" alt="image not found">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="signup-form-wrapper">
                                        <p class='mb-25'>{{__("forget-password.key5") }}</p>
                                        <div class="signup-wrapper">
                                            <x-input-error :messages="$errors->get('email')" class="" />
                                            <input type="email" placeholder="{{__("forget-password.key6") }}" id="email" name="email" :value="old('email')" required autofocus >
                                        </div>
                                        <div class="sign-button mb-20">
                                            <button type='submit' class="sign-btn">{{__("forget-password.key7") }}</button>
                                        </div>
                                        <div class="registered wrapper">
                                            <div class="not-register">
                                                <span>{{__("forget-password.key8") }}</span><span><a href="{{route('login')}}">{{__("forget-password.key9") }}</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sigin-area end-->

@endsection

@section('third_party_scripts')
    <script>
        $(document).ready(function() {
            $(document).scrollTop( $("#auth-form-anchor").offset().top );
        });
    </script>
@endsection

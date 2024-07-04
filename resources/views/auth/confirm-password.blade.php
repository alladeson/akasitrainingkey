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
                        <h2>Confirm Password</h2>
                    </div>
                    <div class="course-title-breadcrumb" id="auth-form-anchor">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><span>Confirm Password</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero-area-end -->

    <!-- sigin-area sart-->
    <div class="signin-page-area pt-120 pb-120">
        <div class="signin-page-area-wrapper">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10">
                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="signup-box text-center">
                                        <div class="signup-text">
                                            <h3>Confirm Password</h3>
                                        </div>
                                        <div class="signup-thumb">
                                            <img src="{{ asset_own('front/img/sing-up/sign-up.png') }}" alt="image not found">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="signup-form-wrapper">
                                        <p class='mb-25'>
                                            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                                        </p>

                                        <div class="signup-wrapper">
                                            <x-input-error :messages="$errors->get('password')" class="text-danger" />
                                            <input id="password" type="password" name="password" required
                                                autocomplete="current-password" placeholder="Password">
                                        </div>
                                        <div class="sign-button mb-20">
                                            <button type='submit' class="sign-btn">Confirm</button>
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

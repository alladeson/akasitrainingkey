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
                        <h2>{{__("login.key1") }}</h2>
                    </div>
                    <div class="course-title-breadcrumb" id="auth-form-anchor">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{__("login.key2") }}</a></li>
                                <li class="breadcrumb-item"><span>{{__("login.key3") }}</span></li>
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
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form id="auth-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="signup-box text-center">
                                        <div class="signup-text">
                                            <h3>{{__("login.key4") }}</h3>
                                        </div>
                                        <div class="signup-thumb">
                                            <img src="{{ asset_own('front/img/sing-up/sign-up.png') }}" alt="image not found">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="signup-form-wrapper">
                                        <div class="signup-wrapper">
                                            <x-input-error :messages="$errors->get('email')" class="text-danger" />
                                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                                placeholder="{{__("login.key5") }}" required autofocus autocomplete="username">
                                        </div>
                                        <div class="signup-wrapper">
                                            <x-input-error :messages="$errors->get('password')" class="text-danger" />
                                            <input id="password" type="password" name="password" required
                                                autocomplete="current-password" placeholder="{{__("login.key6") }}">
                                        </div>
                                        <div class="signup-action">
                                            <div class="course-sidebar-list">
                                                <input class="signup-checkbo" type="checkbox" id="remember_me"
                                                    name="remember">
                                                <label class="sign-check" for="sing-in"><span>{{__("login.key7") }}</span></label>
                                            </div>
                                        </div>
                                        <div class="mb-2 d-flex justify-content-center">
                                            <x-input-error :messages="!$recaptcha_success? 'Please check that you are not a robot' : ''" class="text-danger" />

                                        </div>
                                        <div class="g-recaptcha mb-2 d-flex justify-content-center"
                                            data-sitekey="6LdADAspAAAAACOnIZaCy7FrW6RZPRlazSkNeBcW">

                                        </div>
                                        <div class="sing-buttom mb-20">
                                            <x-primary-button>
                                                {{__("login.key8") }}
                                            </x-primary-button>
                                        </div>
                                        <div class="registered wrapper">
                                            <div class="not-register">
                                                @if (Route::has('register'))
                                                    <span>{{__("login.key9") }}</span>
                                                    <span>
                                                        <a href="{{ route('register') }}">{{__("login.key10") }}</a>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="forget-password">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}">
                                                        {{__("login.key11") }}
                                                    </a>
                                                @endif
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

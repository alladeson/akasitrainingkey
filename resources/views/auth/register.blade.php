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
                        <h2>{{__("register.key1") }}</h2>
                    </div>
                    <div class="course-title-breadcrumb" id="auth-form-anchor">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{__("register.key2") }}</a></li>
                                <li class="breadcrumb-item"><span>{{__("register.key3") }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero-area-end -->

    <!-- signup-area-start -->
    <div class="signup-page-area pt-120 pb-120">
        <div class="signup-page-area-wrapper">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10">
                        <form method="POST" action="{{ route('register') }}" id="auth-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="signup-box text-center">
                                        <div class="signup-text">
                                            <h3>{{__("register.key4") }}</h3>
                                        </div>
                                        <div class="signup-message">
                                            <img src="{{ asset_own('front/img/sing-up/sign-up-message.png') }}"
                                                alt="image not found">
                                        </div>
                                        <div class="signup-thumb">
                                            <img src="{{ asset_own('front/img/sing-up/sign-up.png') }}" alt="image not found">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="signup-form-wrapper">
                                        <!-- User role  -->
                                        <input type="hidden" name="role" value="{{ $role }}">

                                        <x-input-error :messages="$errors->get('firs_tname')" class="text-danger" />
                                        <x-input-error :messages="$errors->get('last_name')" class="text-danger" />
                                        <div class="signup-input-wrapper">
                                            <input type="text" placeholder="{{__("register.key5") }}" id="first_name" name="first_name"
                                                value="{{ old('first_name') }}" required autofocus autocomplete="first_name">
                                            <input type="text" placeholder="{{__("register.key6") }}" id="last_name" name="last_name"
                                                value="{{ old('last_name') }}" required autofocus autocomplete="last_name">
                                        </div>

                                        <div class="signup-wrapper">
                                            <x-input-error :messages="$errors->get('email')" class="text-danger" />
                                            <input type="text" placeholder="{{__("register.key7") }}" id="email" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">
                                        </div>

                                        <div class="signup-wrapper">
                                            <x-input-error :messages="$errors->get('password')" class="text-danger" />
                                            <input id="password" type="password" name="password" required
                                                autocomplete="new-password" placeholder="{{__("register.key8") }}">
                                        </div>

                                        <div class="signup-wrapper">
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger" />
                                            <input id="password_confirmation" type="password" name="password_confirmation"
                                                required autocomplete="new-password" placeholder="{{__("register.key9") }}">
                                        </div>
                                        <div class="signup-action">
                                            <div class="course-sidebar-list">
                                                <input class="signup-checkbo" type="checkbox" id="sing-up">
                                                <label class="sign-check" for="sing-up"><span>{{__("register.key10") }}
                                                        <a href="javascript:void();">{{__("register.key11") }}</a></span></label>
                                            </div>
                                        </div>
                                        <div class="mb-2 d-flex justify-content-center">
                                            <x-input-error :messages="!$recaptcha_success? 'Please check that you are not a robot' : ''" class="text-danger" />

                                        </div>
                                        <div class="g-recaptcha mb-2 d-flex justify-content-center"
                                            data-sitekey="6LdADAspAAAAACOnIZaCy7FrW6RZPRlazSkNeBcW">

                                        </div>
                                        <div class="sign-button mb-20">
                                            <x-primary-button>
                                                {{__("register.key12") }}
                                            </x-primary-button>
                                        </div>
                                        <div class="acount-login text-center">
                                            <span>{{__("register.key13") }} <a href="{{ route('login') }}">{{__("register.key14") }}</a></span>
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
    <!-- signup-area-start -->

@endsection

@section('third_party_scripts')
    <script>
        $(document).ready(function() {
            $(document).scrollTop( $("#auth-form-anchor").offset().top );
        });
    </script>
@endsection

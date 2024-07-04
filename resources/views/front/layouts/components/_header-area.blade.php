<div class="header-area-2 sticky-header">
    <div class="container-fluid">
        <div class="header-main-wrapper">
            <div class="row align-items-center">
                <div class="col-3 col-lg-3 col-md-3 col-sm-3 col-3">
                    <div class="header-logo d-none d-sm-block">
                        <a href="{{route('home')}}"><img src="{{ asset_own('front/img/customized/logo/alek-logo.png') }}" alt="logo"></a>
                    </div>
                    <div class="header-logo d-block d-sm-none">
                        <a href="{{route('home')}}"><img src="{{ asset_own('front/img/customized/favicon.png') }}" alt="logo" width="40" height="40"></a>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
                    <div class="header-main-right  d-flex justify-content-end">
                        <div class="main-menu mr-30">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="menu-item-has-children"><a href="{{route('courses.catalog')}}">{{__("header-area.key_Trainings") }}</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('courses.catalog')}}">{{__("header-area.key_Catalogue") }}</a>
                                            </li>
                                            <li><a href="{{route('courses.catalog')}}">{{__("header-area.key_Certifications") }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('trainings.schedule')}}">{{__("header-area.key_Schedule") }}</a></li>
                                    <li class="menu-item-has-children"><a href="#">{{__("header-area.key_Resources") }}</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('faq')}}">{{__("header-area.key_FAQ") }}</a></li>
                                            <li><a href="{{route('location')}}">{{__("header-area.key_Locations") }}</a></li>
                                            {{-- <li><a href="#">{{__("header-area.key_Release") }}</a></li> --}}
                                            <li><a href="{{route('courses.catalog.webinars')}}">{{__("header-area.key_Webinars") }}</a></li>
                                            <li><a href="#">{{__("header-area.key_Certified") }}</a></li>
                                            <li><a href="{{route('testimonies')}}">{{__("header-area.key_Testimonies") }}</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="https://akasigroup.net/" target="_blank">{{__("header-area.key_Consulting") }}</a></li>
                                    <li><a href="{{route('contact')}}">{{__("header-area.key_Contact") }}</a></li>

                                </ul>
                            </nav>
                        </div>
                        <div class="header-btn">
                            <div class="cart-wrapper">
                                <a href="javascript:void(0);" class="cart-toggle-btn" data-schedule-id="0">
                                    <div class="header__cart-icon p-relative">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19.988" height="19.988"
                                            viewBox="0 0 19.988 19.988">
                                            <g id="trolley-cart" transform="translate(-1 -1)">
                                                <path id="Path_36" data-name="Path 36"
                                                    d="M1.666,2.333H3.8L6.159,12.344a1.993,1.993,0,0,0,.171,3.98H17.656a.666.666,0,1,0,0-1.333H6.33a.666.666,0,0,1,0-1.333H17.578a1.992,1.992,0,0,0,1.945-1.541l1.412-6a2,2,0,0,0-1.946-2.456H5.486L4.98,1.514A.666.666,0,0,0,4.331,1H1.666a.666.666,0,0,0,0,1.333ZM18.989,5a.677.677,0,0,1,.649.819l-1.412,6a.662.662,0,0,1-.648.514H7.524L5.8,5Z"
                                                    transform="translate(0 0)" fill="#141517" />
                                                <path id="Path_37" data-name="Path 37"
                                                    d="M20,27a2,2,0,1,0,2-2A2,2,0,0,0,20,27Zm2.665,0A.666.666,0,1,1,22,26.333.666.666,0,0,1,22.665,27Z"
                                                    transform="translate(-6.341 -8.01)" fill="#141517" />
                                                <path id="Path_38" data-name="Path 38"
                                                    d="M9,27a2,2,0,1,0,2-2A2,2,0,0,0,9,27Zm2.665,0A.666.666,0,1,1,11,26.333.666.666,0,0,1,11.665,27Z"
                                                    transform="translate(-2.67 -8.01)" fill="#141517" />
                                            </g>
                                        </svg>
                                        <span class="item-number">{{count(get_cart())}}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="header-btn ml-20">
                                <div class="cart-wrapper">
                                    @auth
                                        <a href="{{ Auth::user()->hasRole(['Admin', 'Commercial']) ? route('dashboard') : url('/profile') }}" class="header-2 border-0 p-0">
                                            <div class="header__cart-icon p-relative">
                                                <svg width="32" height="32" viewBox="0 0 56 56" fill="#141517" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M 27.9999 51.9063 C 41.0546 51.9063 51.9063 41.0781 51.9063 28 C 51.9063 14.9453 41.0312 4.0937 27.9765 4.0937 C 14.8983 4.0937 4.0937 14.9453 4.0937 28 C 4.0937 41.0781 14.9218 51.9063 27.9999 51.9063 Z M 27.9999 47.9219 C 16.9374 47.9219 8.1014 39.0625 8.1014 28 C 8.1014 16.9609 16.9140 8.0781 27.9765 8.0781 C 39.0155 8.0781 47.8983 16.9609 47.9219 28 C 47.9454 39.0625 39.0390 47.9219 27.9999 47.9219 Z M 27.9999 26.6875 C 31.3983 26.7109 34.1171 23.8047 34.1171 19.9844 C 34.1171 16.4219 31.3983 13.4453 27.9999 13.4453 C 24.6014 13.4453 21.8827 16.4219 21.8827 19.9844 C 21.8827 23.8047 24.6014 26.6641 27.9999 26.6875 Z M 17.0780 39.9766 L 38.8983 39.9766 C 39.8358 39.9766 40.3046 39.3437 40.3046 38.5 C 40.3046 35.8750 36.3671 29.1016 27.9999 29.1016 C 19.6327 29.1016 15.6952 35.8750 15.6952 38.5 C 15.6952 39.3437 16.1640 39.9766 17.0780 39.9766 Z"/>                                            </svg>
                                            </div>
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}" class="header-2 border-0 p-0">
                                            <div class="header__cart-icon p-relative">
                                                <svg width="32" height="32" viewBox="0 0 56 56" fill="#141517" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M 27.9999 51.9063 C 41.0546 51.9063 51.9063 41.0781 51.9063 28 C 51.9063 14.9453 41.0312 4.0937 27.9765 4.0937 C 14.8983 4.0937 4.0937 14.9453 4.0937 28 C 4.0937 41.0781 14.9218 51.9063 27.9999 51.9063 Z M 27.9999 47.9219 C 16.9374 47.9219 8.1014 39.0625 8.1014 28 C 8.1014 16.9609 16.9140 8.0781 27.9765 8.0781 C 39.0155 8.0781 47.8983 16.9609 47.9219 28 C 47.9454 39.0625 39.0390 47.9219 27.9999 47.9219 Z M 27.9999 26.6875 C 31.3983 26.7109 34.1171 23.8047 34.1171 19.9844 C 34.1171 16.4219 31.3983 13.4453 27.9999 13.4453 C 24.6014 13.4453 21.8827 16.4219 21.8827 19.9844 C 21.8827 23.8047 24.6014 26.6641 27.9999 26.6875 Z M 17.0780 39.9766 L 38.8983 39.9766 C 39.8358 39.9766 40.3046 39.3437 40.3046 38.5 C 40.3046 35.8750 36.3671 29.1016 27.9999 29.1016 C 19.6327 29.1016 15.6952 35.8750 15.6952 38.5 C 15.6952 39.3437 16.1640 39.9766 17.0780 39.9766 Z"/>                                            </svg>
                                            </div>
                                        </a>
                                    @endauth
                                </div>
                            </div>
                            {{-- <a class="edu-four-btn d-none d-lg-block" href="course-details.html">Enroll now</a> --}}
                            <div class="menu-bar ml-20">
                                <a class="side-toggle header-2" href="javascript:void(0)">
                                    <div class="bar-icon">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

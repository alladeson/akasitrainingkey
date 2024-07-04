<footer>
    <div class="footer-area pt-100">
        <div class="container">
            <div class="footer-main ">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget f-w1 mb-40">
                            <div class="footer-img">
                                <a href="{{route('home')}}"> <img src="{{ asset_own('front/img/customized/logo/alek-logo.png') }}"
                                        alt="footer-logo"></a>
                                <p>{{__("footer.key1") }}</p>
                            </div>
                            <div class="footer-icon">
                                <a href="https://www.facebook.com/profile.php?id=61550846039048" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://twitter.com/Akasi_LearningK" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.instagram.com/akasi_learningk/" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.linkedin.com/company/akasi-learning-key" target="_blank"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget f-w2 mb-40">
                            <h3>{{__("footer.key2") }}</h3>
                            <ul>
                                {{-- <li><a href="javascript:void(0);">{{__("footer.key3") }}</a></li> --}}
                                <li><a href="{{route('testimonies')}}">{{__("footer.key4") }}</a></li>
                                <li><a href="{{route('contact')}}">{{__("footer.key5") }}</a></li>
                                <li><a href="{{route('location')}}">{{__("footer.key6") }}</a></li>
                                <li><a href="{{route('faq')}}">{{__("footer.key7") }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget f-w3 mb-40">
                            <h3>{{__("footer.key8") }}</h3>
                            <ul>
                                <li><a href="{{route('courses.catalog')}}">{{__("footer.key9") }}</a></li>
                                <li><a href="javascript:void(0);">{{__("footer.key10") }}</a></li>
                                <li><a href="{{route('register')}}">{{__("footer.key11") }}</a></li>
                                {{-- <li><a href="{{route('register', ['role' => 'Instructor'])}}">{{__("footer.key12") }}</a></li> --}}
                                <li><a href="javascript:void(0);">{{__("footer.key12") }}</a></li>
                                <li><a href="{{route('courses.catalog.webinars')}}">{{__("footer.key13") }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget f-w4 mb-40">
                            <h3>{{__("footer.key14") }}</h3>
                            <ul>
                                <li><a href="{{route('courses.catalog')}}">{{__("footer.key15") }}</a></li>
                                <li><a href="{{route('courses.catalog')}}">{{__("footer.key16") }}</a></li>
                                <li><a href="{{route('courses.catalog')}}">{{__("footer.key17") }}</a></li>
                                <li><a href="{{route('courses.catalog')}}">{{__("footer.key18") }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="university-sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-5">
                    <div class="sub-footer-text">
                        <span>© Copyrighted & Designed by <a href="https://akasigroup.net/">AKASI GROUP</a>
                        </span>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-7">
                    <div class="sub-footer-link">
                        {{-- <ul>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Condition</a></li>
                            <li><a href="#">Sitemap</a></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

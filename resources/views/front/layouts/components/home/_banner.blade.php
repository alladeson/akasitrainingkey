<div id="bannerCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="3000">
            <div class="hero-area d-flex align-items-center position-relative"
                data-background="{{ asset_own('front/img/customized/banner/industry_certifications.jpg') }}"
                style="background: #edeff5 url({{ asset_own('front/img/customized/banner/industry_certifications.jpg') }}) no-repeat fixed center; background-size: cover;">
                <img class="hero-shape-5" src="{{ asset_own('front/img/shape/shape-02.png') }}" alt="shape">
                <img class="hero-shape-1" src="{{ asset_own('front/img/shape/shape-03.png') }}" alt="shape">
                <img class="hero-shape-6" src="{{ asset_own('front/img/shape/shape-01.png') }}" alt="shape">
                <img class="hero-shape-7" src="{{ asset_own('front/img/shape/shape-10.png') }}" alt="shape">

                <div class="container">
                    <div class="hero-2-content-wrpapper position-relative">

                        <div class="hero-shape-2 d-none d-xl-block mt-100">
                            <img src="{{ asset_own('front/img/shape/shape-09.png') }}" alt="shape">
                        </div>
                        <div class="hero-shape-4 d-none d-lg-block">
                            <img src="{{ asset_own('front/img/shape/shape-8.png') }}" alt="shape">
                        </div>

                        <div class="row justify-content-center text-white">
                            <div class="col-xl-8 col-lg-8 col-md-10">
                                <div class="slider-content-wrapper">
                                    <div class="hero-tittle-info text-center mb-45 mx-0">
                                        <h2>{{__("home.key1") }} <br> {{__("home.key2") }}  <span
                                                class="down-mark-line">{{__("home.key3") }} </span></h2>
                                        <div>{{__("home.key4") }}  </div>
                                    </div>
                                    <div class="slider-search ">
                                        <form action="{{ route('courses.catalog') }}" method="GET">
                                            <div class="slider-search-icon position-relative">
                                                <input type="text" name="search" placeholder="{{__("home.keySeach") }}">
                                                <button type="submit"><i class="far fa-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="slider-course-content text-center">
                                        <ul>
                                            <li><i class="fas fa-check-circle"></i><span><b>2.5M+</b>
                                                {{__("home.key5") }}</span></li>
                                            <li><i class="fas fa-check-circle"></i><span><b>500+</b> {{__("home.key6") }}</span>
                                            </li>
                                            <li><i class="fas fa-check-circle"></i><span><b>65,000+</b>
                                                {{__("home.key7") }}</span></li>
                                            <li><i class="fas fa-check-circle"></i><span><b>600+</b> {{__("home.key8") }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hero-btn text-center mt-50">
                            <a class="edu-btn" href="{{route('courses.catalog')}}">{{__("home.key9") }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="3000">
            <div class="hero-area d-flex align-items-center position-relative"
                data-background="{{ asset_own('front/img/customized/banner/training_world.jpg') }}"
                style="background: #edeff5 url({{ asset_own('front/img/customized/banner/training_world.jpg') }}) no-repeat fixed center; background-size: cover;">
                <img class="hero-shape-5" src="{{ asset_own('front/img/shape/shape-02.png') }}" alt="shape">
                <img class="hero-shape-1" src="{{ asset_own('front/img/shape/shape-03.png') }}" alt="shape">
                <img class="hero-shape-6" src="{{ asset_own('front/img/shape/shape-01.png') }}" alt="shape">
                <img class="hero-shape-7" src="{{ asset_own('front/img/shape/shape-10.png') }}" alt="shape">

                <div class="container">
                    <div class="hero-2-content-wrpapper position-relative">

                        <div class="hero-shape-2 d-none d-xl-block mt-100">
                            <img src="{{ asset_own('front/img/shape/shape-09.png') }}" alt="shape">
                        </div>
                        <div class="hero-shape-4 d-none d-lg-block">
                            <img src="{{ asset_own('front/img/shape/shape-8.png') }}" alt="shape">
                        </div>

                        <div class="row justify-content-center text-white">
                            <div class="col-xl-8 col-lg-8 col-md-10">
                                <div class="slider-content-wrapper">
                                    <div class="hero-tittle-info text-center mb-45 mx-0">
                                        <h2>{{__("home.key10") }} <span class="down-mark-line">{{__("home.key11") }}</span><br>
                                            {{__("home.key12") }}</h2>
                                        <div>{{__("home.key13") }}</div>
                                    </div>
                                    <div class="slider-search ">
                                        <form action="{{ route('courses.catalog') }}" method="GET">
                                            <div class="slider-search-icon position-relative">
                                                <input type="text" name="search" placeholder="{{__("home.keySeach") }}">
                                                <button type="submit"><i class="far fa-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="slider-course-content text-center">
                                        <ul>
                                            <li><i class="fas fa-check-circle"></i><span><b>2.5M+</b>
                                                {{__("home.key14") }}</span></li>
                                            <li><i class="fas fa-check-circle"></i><span><b>500+</b> {{__("home.key15") }}</span>
                                            </li>
                                            <li><i class="fas fa-check-circle"></i><span><b>65,000+</b>
                                                {{__("home.key16") }}</span></li>
                                            <li><i class="fas fa-check-circle"></i><span><b>600+</b> {{__("home.key17") }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hero-btn text-center mt-50">
                            <a class="edu-btn" href="{{route('courses.catalog')}}">{{__("home.key18") }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="3000">
            <div class="hero-area d-flex align-items-center position-relative"
                data-background="{{ asset_own('front/img/customized/banner/technologie_3d.jpg') }}"
                style="background: #edeff5 url({{ asset_own('front/img/customized/banner/technologie_3d.jpg') }}) no-repeat fixed center; background-size: cover;">
                <img class="hero-shape-5" src="{{ asset_own('front/img/shape/shape-02.png') }}" alt="shape">
                <img class="hero-shape-1" src="{{ asset_own('front/img/shape/shape-03.png') }}" alt="shape">
                <img class="hero-shape-6" src="{{ asset_own('front/img/shape/shape-01.png') }}" alt="shape">
                <img class="hero-shape-7" src="{{ asset_own('front/img/shape/shape-10.png') }}" alt="shape">

                <div class="container">
                    <div class="hero-2-content-wrpapper position-relative">

                        <div class="hero-shape-2 d-none d-xl-block mt-100">
                            <img src="{{ asset_own('front/img/shape/shape-09.png') }}" alt="shape">
                        </div>
                        <div class="hero-shape-4 d-none d-lg-block">
                            <img src="{{ asset_own('front/img/shape/shape-8.png') }}" alt="shape">
                        </div>

                        <div class="row justify-content-center text-white">
                            <div class="col-xl-8 col-lg-8 col-md-10">
                                <div class="slider-content-wrapper">
                                    <div class="hero-tittle-info text-center mb-45 mx-0">
                                        <h2>{{__("home.key19") }}<br> {{__("home.key20") }} <span
                                                class="down-mark-line">{{__("home.key21") }}</span><br></h2>
                                        <div>{{__("home.key22") }}
                                        </div>
                                    </div>
                                    <div class="slider-search ">
                                        <form action="{{ route('courses.catalog') }}" method="GET">
                                            <div class="slider-search-icon position-relative">
                                                <input type="text" name="search" placeholder="{{__("home.keySeach") }}">
                                                <button type="submit"><i class="far fa-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="slider-course-content text-center">
                                        <ul>
                                            <li><i class="fas fa-check-circle"></i><span><b>2.5M+</b>
                                                {{__("home.key23") }}</span></li>
                                            <li><i class="fas fa-check-circle"></i><span><b>500+</b> {{__("home.key24") }}</span>
                                            </li>
                                            <li><i class="fas fa-check-circle"></i><span><b>65,000+</b>
                                                {{__("home.key25") }}</span></li>
                                            <li><i class="fas fa-check-circle"></i><span><b>600+</b> {{__("home.key26") }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hero-btn text-center mt-50">
                            <a class="edu-btn" href="{{route('courses.catalog')}}">{{__("home.key27") }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">{{__("home.key28") }}</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">{{__("home.key29") }}</span>
    </button>
</div>

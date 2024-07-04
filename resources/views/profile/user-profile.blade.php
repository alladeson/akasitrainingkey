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

        .student-profile-author-img img, .student-profile-setting-author-img img {
            border: 1px solid rgb(0, 0, 0, 0.175);
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
                        <h2>{{__("profil.key1") }}</h2>
                    </div>
                    <div class="course-title-breadcrumb">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{__("profil.key2") }}</a></li>
                                <li class="breadcrumb-item"><span>{{ $user->name }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero-area-end -->

    <!-- User Profile Start-->
    <div class="course-details-area pt-120 pb-100">
        <div class="container">
            <div class="student-profile-author pb-30">
                <div class="student-profile-author-img">
                    <img src="{{ asset_own('front/img/customized/profile/user-placeholder.png') }}" alt="img not found" />
                </div>
                <div class="student-profile-author-text">
                    <span>{{__("profil.key3") }}</span>
                    <h3 class='student-profile-author-name'>{{ $user->name }}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="student-profile-sidebar mb-30">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true"><i
                                        class="fas fa-tachometer-alt-fast"></i>
                                        {{__("profil.key4") }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false"><i
                                        class="fas fa-user"></i> {{__("profil.key5") }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                    type="button" role="tab" aria-controls="contact" aria-selected="false"><i
                                        class="fas fa-graduation-cap"></i>{{__("profil.key6") }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="wishlist-tab" data-bs-toggle="tab" data-bs-target="#wishlist"
                                    type="button" role="tab" aria-controls="wishlist" aria-selected="false"><i
                                        class="fas fa-bookmark"></i> {{__("profil.key7") }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="invoice-tab" data-bs-toggle="tab" data-bs-target="#invoice"
                                    type="button" role="tab" aria-controls="invoice" aria-selected="false"><i
                                        class="fas fa-money-bill"></i> {{__("profil.key8_0") }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="history-tab" data-bs-toggle="tab" data-bs-target="#history"
                                    type="button" role="tab" aria-controls="history" aria-selected="false"><i
                                        class="fas fa-cart-plus"></i> {{__("profil.key8") }}</button>
                            </li>                            
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="setting-tab" data-bs-toggle="tab" data-bs-target="#setting"
                                    type="button" role="tab" aria-controls="setting" aria-selected="false"><i
                                        class="fas fa-cog"></i> {{__("profil.key9") }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" type="button" onclick="logout(event);"><i
                                    class="fas fa-sign-out-alt"></i>
                                    {{__("profil.key9&") }}</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="student-profile-content">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <h4 class='mb-25'>{{__("profil.key10") }}</h4>
                                <div class="student-profile-content-fact">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-6 col-md-4">
                                            <div class="counter-wrapper text-center mb-30">
                                                <div class="counter-icon">
                                                    <div class="counter-icon-wrap">

                                                        <svg id="online-course" xmlns="http://www.w3.org/2000/svg"
                                                            width="80" height="90" viewBox="0 0 51.549 56.553">
                                                            <path id="Path_7050" data-name="Path 7050"
                                                                d="M220.4,404.2h8.315v8.63H220.4Z"
                                                                transform="translate(-198.783 -358.613)" fill="#726b93" />
                                                            <path id="Path_7051" data-name="Path 7051"
                                                                d="M102.177,357.3v1.612a1.535,1.535,0,0,1-1.53,1.53H56.83a1.535,1.535,0,0,1-1.53-1.53V357.3Z"
                                                                transform="translate(-52.964 -317.19)" fill="#988fc4" />
                                                            <path id="Path_7052" data-name="Path 7052"
                                                                d="M102.177,77.142v29.021H55.3V77.142a1.535,1.535,0,0,1,1.53-1.53h7.042l-.993.5a1.831,1.831,0,0,0-1.016,1.635,1.81,1.81,0,0,0,1.016,1.635l3.959,1.974v7.661a2.825,2.825,0,0,0,2.242,2.756,47.052,47.052,0,0,0,19.34,0,2.825,2.825,0,0,0,2.242-2.756V81.357l1.144-.572v7.521a1.168,1.168,0,0,0,2.336,0V79.617l.479-.245a1.831,1.831,0,0,0,1.016-1.635A1.81,1.81,0,0,0,94.621,76.1l-.993-.5h7.042A1.548,1.548,0,0,1,102.177,77.142Zm-6.563,25.132a1.171,1.171,0,0,0-1.168-1.168H70.634a1.168,1.168,0,1,0,0,2.336H94.446A1.164,1.164,0,0,0,95.614,102.274ZM83.468,96.656A1.171,1.171,0,0,0,82.3,95.488H70.622a1.168,1.168,0,0,0,0,2.336H82.3A1.157,1.157,0,0,0,83.468,96.656Zm-16.934,0a1.171,1.171,0,0,0-1.168-1.168H63.031a1.168,1.168,0,1,0,0,2.336h2.336A1.157,1.157,0,0,0,66.535,96.656Zm0,5.617a1.171,1.171,0,0,0-1.168-1.168H63.031a1.168,1.168,0,1,0,0,2.336h2.336A1.157,1.157,0,0,0,66.535,102.274Z"
                                                                transform="translate(-52.964 -68.389)" fill="#e3fbff" />
                                                            <path id="Path_7053" data-name="Path 7053"
                                                                d="M193.229,134.9v6.493a.491.491,0,0,1-.374.479,44.718,44.718,0,0,1-18.382,0,.479.479,0,0,1-.374-.479V134.9l8.747,4.379a1.882,1.882,0,0,0,1.635,0Z"
                                                                transform="translate(-157.89 -120.763)" fill="#726b93" />
                                                            <path id="Path_7054" data-name="Path 7054"
                                                                d="M164.718,41.349l-13.909,6.96L136.9,41.349,150.809,34.4Z"
                                                                transform="translate(-125.035 -32)" fill="#988fc4" />
                                                            <path id="Path_7055" data-name="Path 7055"
                                                                d="M86.849,22.6V55.571a3.87,3.87,0,0,1-3.866,3.866H67.568v8.63h4.158a1.168,1.168,0,1,1,0,2.336h-21.3a1.168,1.168,0,1,1,0-2.336h4.158v-8.63H39.166A3.87,3.87,0,0,1,35.3,55.571V22.6a3.87,3.87,0,0,1,3.866-3.866H50.879l9.378-4.695a1.83,1.83,0,0,1,1.635,0l9.378,4.683H82.983A3.88,3.88,0,0,1,86.849,22.6ZM84.513,55.571V53.96H37.636v1.612a1.535,1.535,0,0,0,1.53,1.53H82.983A1.528,1.528,0,0,0,84.513,55.571Zm0-3.947V22.6a1.535,1.535,0,0,0-1.53-1.53H75.941l.993.5A1.831,1.831,0,0,1,77.95,23.21a1.81,1.81,0,0,1-1.016,1.635l-.479.245v8.689a1.168,1.168,0,0,1-2.336,0V26.247l-1.144.572V34.48a2.813,2.813,0,0,1-2.242,2.756,47.533,47.533,0,0,1-9.67,1,47.533,47.533,0,0,1-9.67-1,2.825,2.825,0,0,1-2.242-2.756V26.819l-3.959-1.974a1.831,1.831,0,0,1-1.016-1.635,1.81,1.81,0,0,1,1.016-1.635l.993-.5H39.166a1.535,1.535,0,0,0-1.53,1.53V51.624ZM61.074,30.159,74.983,23.21,61.074,16.25,47.165,23.2Zm9.565,4.309V27.975l-8.747,4.379a1.882,1.882,0,0,1-1.635,0L51.51,27.975v6.493a.491.491,0,0,0,.374.479,44.718,44.718,0,0,0,18.382,0A.479.479,0,0,0,70.639,34.468Zm-5.407,33.6v-8.63H56.917v8.63Z"
                                                                transform="translate(-35.3 -13.85)" />
                                                            <path id="Path_7056" data-name="Path 7056"
                                                                d="M201.58,294a1.168,1.168,0,0,1,0,2.336H177.768a1.168,1.168,0,0,1,0-2.336Z"
                                                                transform="translate(-160.098 -261.283)" />
                                                            <path id="Path_7057" data-name="Path 7057"
                                                                d="M189.346,245.9a1.168,1.168,0,1,1,0,2.336H177.668a1.168,1.168,0,0,1,0-2.336Z"
                                                                transform="translate(-160.01 -218.8)" />
                                                            <path id="Path_7058" data-name="Path 7058"
                                                                d="M115,245.9a1.168,1.168,0,0,1,0,2.336h-2.336a1.168,1.168,0,0,1,0-2.336Z"
                                                                transform="translate(-102.601 -218.8)" />
                                                            <path id="Path_7059" data-name="Path 7059"
                                                                d="M115,294a1.168,1.168,0,0,1,0,2.336h-2.336a1.168,1.168,0,0,1,0-2.336Z"
                                                                transform="translate(-102.601 -261.283)" />
                                                        </svg>
                                                    </div>
                                                    <div class="count-number">
                                                        <span class="">{{ count_enrolled_course() }}</span>
                                                        <p>{{__("profil.key11") }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-4">
                                            <div class="counter-wrapper text-center mb-30">
                                                <div class="counter-icon">
                                                    <div class="counter-icon-wrap">
                                                        <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                                        <svg version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 512 512" width="80" height="90"
                                                            xml:space="preserve">
                                                            <path style="fill:#F2F2F2;" d="M400.431,29.681H171.462c-13.151,0-23.851,10.699-23.851,23.851v366.774
                                                                c0,13.152,10.7,23.851,23.851,23.851h228.969c13.151,0,23.851-10.699,23.851-23.851V53.532
                                                                C424.282,40.38,413.582,29.681,400.431,29.681z" />
                                                            <path style="fill:#CCCCCC;" d="M424.282,53.532c0-13.152-10.7-23.851-23.851-23.851H171.462c-13.151,0-23.851,10.699-23.851,23.851
                                                                v16.254h276.671V53.532z" />
                                                            <path style="fill:#E5E5E5;" d="M147.611,69.786v350.521c0,13.152,10.7,23.851,23.851,23.851h228.969
                                                                c13.151,0,23.851-10.699,23.851-23.851V69.786H147.611z" />
                                                            <g>
                                                                <path style="fill:#FCB16B;"
                                                                    d="M302.907,0h-33.921c-4.392,0-7.95,3.56-7.95,7.95v80.563c0,4.391,3.559,7.95,7.95,7.95h33.921
                                                                    c4.392,0,7.95-3.56,7.95-7.95V7.95C310.857,3.56,307.299,0,302.907,0z" />
                                                                <path style="fill:#FCB16B;"
                                                                    d="M379.23,0h-33.921c-4.392,0-7.95,3.56-7.95,7.95v80.563c0,4.391,3.559,7.95,7.95,7.95h33.921
                                                                    c4.392,0,7.95-3.56,7.95-7.95V7.95C387.18,3.56,383.622,0,379.23,0z" />
                                                                <path style="fill:#FCB16B;"
                                                                    d="M226.584,0h-33.921c-4.392,0-7.95,3.56-7.95,7.95v80.563c0,4.391,3.559,7.95,7.95,7.95h33.921
                                                                    c4.392,0,7.95-3.56,7.95-7.95V7.95C234.534,3.56,230.976,0,226.584,0z" />
                                                            </g>
                                                            <g>
                                                                <path style="fill:#FB9D46;"
                                                                    d="M268.986,88.513V7.95c0-4.391,3.559-7.95,7.95-7.95h-7.95c-4.392,0-7.95,3.56-7.95,7.95v80.563
                                                                    c0,4.391,3.559,7.95,7.95,7.95h7.95C272.544,96.464,268.986,92.904,268.986,88.513z" />
                                                                <path style="fill:#FB9D46;"
                                                                    d="M345.309,88.513V7.95c0-4.391,3.559-7.95,7.95-7.95h-7.95c-4.392,0-7.95,3.56-7.95,7.95v80.563
                                                                    c0,4.391,3.559,7.95,7.95,7.95h7.95C348.867,96.464,345.309,92.904,345.309,88.513z" />
                                                                <path style="fill:#FB9D46;"
                                                                    d="M192.663,88.513V7.95c0-4.391,3.559-7.95,7.95-7.95h-7.95c-4.392,0-7.95,3.56-7.95,7.95v80.563
                                                                    c0,4.391,3.559,7.95,7.95,7.95h7.95C196.221,96.464,192.663,92.904,192.663,88.513z" />
                                                            </g>
                                                            <g>
                                                                <path style="fill:#808080;"
                                                                    d="M379.23,172.787H268.986c-4.392,0-7.95-3.56-7.95-7.95s3.559-7.95,7.95-7.95H379.23
                                                                    c4.392,0,7.95,3.56,7.95,7.95S383.622,172.787,379.23,172.787z" />
                                                                <path style="fill:#808080;"
                                                                    d="M379.23,257.59H268.986c-4.392,0-7.95-3.56-7.95-7.95s3.559-7.95,7.95-7.95H379.23
                                                                    c4.392,0,7.95,3.56,7.95,7.95S383.622,257.59,379.23,257.59z" />
                                                                <path style="fill:#808080;"
                                                                    d="M379.23,342.393H268.986c-4.392,0-7.95-3.56-7.95-7.95c0-4.391,3.559-7.95,7.95-7.95H379.23
                                                                    c4.392,0,7.95,3.56,7.95,7.95C387.18,338.834,383.622,342.393,379.23,342.393z" />
                                                            </g>
                                                            <g>
                                                                <path style="fill:#FF7452;" d="M226.584,189.747h-33.921c-4.392,0-7.95-3.56-7.95-7.95v-33.921c0-4.391,3.559-7.95,7.95-7.95
                                                                    h33.921c4.392,0,7.95,3.56,7.95,7.95v33.921C234.534,186.188,230.976,189.747,226.584,189.747z M200.613,173.847h18.021v-18.021
                                                                    h-18.021V173.847z" />
                                                                <path style="fill:#FF7452;" d="M226.584,274.551h-33.921c-4.392,0-7.95-3.56-7.95-7.95v-33.921c0-4.391,3.559-7.95,7.95-7.95
                                                                    h33.921c4.392,0,7.95,3.56,7.95,7.95V266.6C234.534,270.991,230.976,274.551,226.584,274.551z M200.613,258.65h18.021v-18.021
                                                                    h-18.021V258.65z" />
                                                                <path style="fill:#FF7452;" d="M226.584,359.354h-33.921c-4.392,0-7.95-3.56-7.95-7.95v-33.921c0-4.391,3.559-7.95,7.95-7.95
                                                                    h33.921c4.392,0,7.95,3.56,7.95,7.95v33.921C234.534,355.794,230.976,359.354,226.584,359.354z M200.613,343.453h18.021v-18.021
                                                                    h-18.021V343.453z" />
                                                            </g>
                                                            <path style="fill:#CCCCCC;" d="M424.282,420.306v-70.191c-8.168-3.762-16.895-5.719-25.798-5.719c-8.126,0-16.16,1.622-23.877,4.819
                                                                c-25.766,10.672-43.078,37.112-43.078,65.79c0,9.304,2.421,18.99,7.305,29.151h61.598
                                                                C413.582,444.157,424.282,433.458,424.282,420.306z" />
                                                            <path style="fill:#E24642;"
                                                                d="M472.113,363.906c-15.867-6.572-32.889-4.05-46.771,6.614c-13.883-10.665-30.907-13.187-46.771-6.614
                                                                c-19.896,8.241-33.262,28.776-33.262,51.1c0,17.762,12.933,39.384,38.44,64.264c18.244,17.796,36.211,30.705,36.967,31.246
                                                                c1.383,0.99,3.005,1.484,4.626,1.484c1.621,0,3.244-0.495,4.626-1.484c0.756-0.541,18.722-13.45,36.967-31.246
                                                                c25.508-24.879,38.44-46.501,38.44-64.264C505.375,392.683,492.009,372.147,472.113,363.906z" />
                                                            <path style="fill:#C42725;"
                                                                d="M410.25,479.8c-25.508-24.88-38.44-46.502-38.44-64.264c0-22.323,13.366-42.86,33.262-51.1
                                                                c1.777-0.736,3.569-1.341,5.368-1.85c-10.297-3.376-21.337-3.044-31.869,1.32c-19.896,8.241-33.262,28.776-33.262,51.1
                                                                c0,17.762,12.933,39.384,38.44,64.264c18.244,17.796,36.211,30.705,36.967,31.246c1.383,0.99,3.005,1.484,4.626,1.484
                                                                c1.621,0,3.244-0.495,4.626-1.484c0.306-0.219,3.446-2.475,8.287-6.266C431.167,498.672,420.758,490.05,410.25,479.8z" />
                                                            <circle style="fill:#FB9D46;" cx="464.563" cy="409.706"
                                                                r="15.901" />
                                                            <path style="fill:#333333;" d="M14.576,202.468c-4.392,0-7.95-3.56-7.95-7.95V62.012c0-13.152,10.7-23.851,23.851-23.851h18.021
                                                                c4.392,0,7.95,3.56,7.95,7.95s-3.559,7.95-7.95,7.95H30.476c-4.384,0-7.95,3.566-7.95,7.95v132.505
                                                                C22.526,198.908,18.967,202.468,14.576,202.468z" />
                                                            <path style="fill:#458FDE;" d="M124.29,41.872C124.29,18.784,105.506,0,82.418,0S40.547,18.784,40.547,41.872v152.999h83.743V41.872
                                                                z" />
                                                            <path style="fill:#FB9D46;"
                                                                d="M42.289,441.173l33.921,42.402c1.508,1.886,3.793,2.984,6.208,2.984s4.7-1.098,6.208-2.984
                                                                l33.921-42.402c1.127-1.41,1.743-3.161,1.743-4.966H40.547C40.547,438.012,41.161,439.763,42.289,441.173z" />
                                                            <path style="fill:#4C4C4C;" d="M82.418,512c-4.392,0-7.95-3.56-7.95-7.95v-25.441c0-4.391,3.559-7.95,7.95-7.95s7.95,3.56,7.95,7.95
                                                                v25.441C90.369,508.44,86.81,512,82.418,512z" />
                                                            <rect x="40.547" y="194.867" style="fill:#FFD652;"
                                                                width="83.743" height="241.34" />
                                                            <path style="fill:#4F5AA8;" d="M98.054,3.04C93.219,1.087,87.944,0,82.418,0C59.331,0,40.547,18.784,40.547,41.872v152.999h31.271
                                                                V41.872C71.818,24.31,82.691,9.249,98.054,3.04z" />
                                                            <rect x="40.547" y="194.867" style="fill:#FB9D46;"
                                                                width="31.271" height="241.34" />
                                                            <circle style="fill:#89DCFC;" cx="89.839" cy="36.571"
                                                                r="11.66" />
                                                        </svg>
                                                    </div>
                                                    <div class="count-number">
                                                        <span class="">{{ count_wishlist() }}</span>
                                                        <p>{{__("profil.key12") }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-4">
                                            <div class="counter-wrapper text-center mb-30">
                                                <div class="counter-icon">
                                                    <div class="counter-icon-wrap">
                                                        <svg width="80" height="90" viewBox="0 0 512 512"
                                                            id="Layer_1" version="1.1" xml:space="preserve"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                                            <style type="text/css">
                                                                .st0 {
                                                                    fill: #D3D9D9;
                                                                }

                                                                .st1 {
                                                                    fill: #333333;
                                                                }

                                                                .st2 {
                                                                    fill: #E8EAEA;
                                                                }

                                                                .st3 {
                                                                    fill: #A8B2B4;
                                                                }

                                                                .st4 {
                                                                    fill: #D3F0FD;
                                                                }

                                                                .st5 {
                                                                    fill: #7BDE9E;
                                                                }

                                                                .st6 {
                                                                    fill: #A8B1B3;
                                                                }

                                                                .st7 {
                                                                    fill: #7C8B8D;
                                                                }

                                                                .st8 {
                                                                    fill: #FB8A8A;
                                                                }

                                                                .st9 {
                                                                    fill: #FCB1B1;
                                                                }

                                                                .st10 {
                                                                    fill: #F96363;
                                                                }
                                                            </style>
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <g>
                                                                                        <path class="st0"
                                                                                            d="M409.6,71.8V33.4c0-16.5-13.4-29.9-29.9-29.9H130.4c-16.5,0-29.9,13.4-29.9,29.9v38.4H409.6z" />
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <path class="st1"
                                                                                d="M297.1,41.6h-84.2c-2.2,0-4-1.8-4-4s1.8-4,4-4h84.2c2.2,0,4,1.8,4,4S299.3,41.6,297.1,41.6z" />
                                                                        </g>
                                                                        <g>
                                                                            <path class="st1"
                                                                                d="M321.3,41.6h-6.2c-2.2,0-4-1.8-4-4s1.8-4,4-4h6.2c2.2,0,4,1.8,4,4S323.5,41.6,321.3,41.6z" />
                                                                        </g>
                                                                        <g>
                                                                            <path class="st0"
                                                                                d="M100.4,439.2v38.4c0,16.5,13.4,29.9,29.9,29.9l249.3,0c16.5,0,29.9-13.4,29.9-29.9v-38.4L100.4,439.2z" />
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <g>
                                                                                        <path class="st2"
                                                                                            d="M160.6,507.5h-30.3c-16.5,0-29.9-13.4-29.9-29.9v-38.4h30.3v38.4C130.7,494.1,144.1,507.5,160.6,507.5z" />
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <g>
                                                                                        <path class="st3"
                                                                                            d="M409.6,439.2v38.4c0,16.5-13.4,29.9-29.9,29.9h-30.3c16.5,0,30-13.4,30-29.9v-38.4H409.6z" />
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <g>
                                                                                        <path class="st2"
                                                                                            d="M160.7,3.5c-16.5,0-29.9,13.4-29.9,29.9v38.4h-30.3V33.4c0-16.5,13.4-29.9,29.9-29.9H160.7z" />
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <g>
                                                                                        <path class="st3"
                                                                                            d="M409.6,33.4v38.4h-30.3V33.4c0-16.5-13.4-29.9-29.9-29.9h30.3C396.2,3.5,409.6,16.9,409.6,33.4z" />
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path class="st1"
                                                                                    d="M278.2,473.4c0,12.8-10.4,23.2-23.2,23.2c-12.8,0-23.2-10.4-23.2-23.2c0-12.8,10.4-23.2,23.2-23.2       C267.8,450.2,278.2,460.5,278.2,473.4z" />
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <g>
                                                                                        <rect class="st4"
                                                                                            height="367.5" width="309.1"
                                                                                            x="100.4" y="74.9" />
                                                                                    </g>
                                                                                    <g>
                                                                                        <rect class="st4"
                                                                                            height="307.5" width="253.1"
                                                                                            x="128.4" y="106.9" />
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <path class="st1"
                                                                        d="M413.6,33.4c0-18.7-15.2-33.9-33.9-33.9H130.4c-18.7,0-33.9,15.2-33.9,33.9l0,444.2    c0,18.7,15.2,33.9,33.9,33.9h249.3c18.7,0,33.9-15.2,33.9-33.9V33.4z M104.4,435.2V75.8h301.1v359.5H104.4z M130.4,7.5h249.3    c14.3,0,25.9,11.6,25.9,25.9v34.4H104.4V33.4C104.4,19.1,116.1,7.5,130.4,7.5z M379.6,503.5H130.3c-14.3,0-25.9-11.6-25.9-25.9    v-34.4h301.1v34.4C405.6,491.9,393.9,503.5,379.6,503.5z" />
                                                                </g>
                                                                <g>
                                                                    <path class="st5"
                                                                        d="M362.5,363.1v32c0,8.4-6.8,15.3-15.2,15.3H162.7c-8.4,0-15.3-6.8-15.3-15.3v-32c0-8.4,6.8-15.2,15.3-15.2    h184.6C355.7,347.9,362.5,354.7,362.5,363.1z" />
                                                                    <path class="st1"
                                                                        d="M347.3,414.4H162.7c-10.6,0-19.3-8.6-19.3-19.3v-32c0-10.6,8.6-19.2,19.3-19.2h184.6    c10.6,0,19.2,8.6,19.2,19.2v32C366.5,405.8,357.9,414.4,347.3,414.4z M162.7,351.9c-6.2,0-11.3,5-11.3,11.2v32    c0,6.2,5.1,11.3,11.3,11.3h184.6c6.2,0,11.2-5.1,11.2-11.3v-32c0-6.2-5-11.2-11.2-11.2H162.7z" />
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <path class="st6"
                                                                                    d="M325.6,301.2c0,8.1-6.6,14.7-14.7,14.7c-8.1,0-14.7-6.6-14.7-14.7c0-8.1,6.6-14.7,14.7-14.7       C319,286.4,325.6,293,325.6,301.2z" />
                                                                            </g>
                                                                            <g>
                                                                                <path class="st6"
                                                                                    d="M236.2,301.2c0,8.1-6.6,14.7-14.7,14.7c-8.1,0-14.7-6.6-14.7-14.7c0-8.1,6.6-14.7,14.7-14.7       C229.6,286.4,236.2,293,236.2,301.2z" />
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path class="st7"
                                                                                    d="M325.6,301.2c0,8.1-6.6,14.7-14.7,14.7c-6,0-11.2-3.6-13.5-8.7c1.8,0.8,3.9,1.3,6,1.3       c8.1,0,14.7-6.6,14.7-14.7c0-2.1-0.5-4.2-1.3-6C322,290,325.6,295.2,325.6,301.2z" />
                                                                            </g>
                                                                            <g>
                                                                                <path class="st7"
                                                                                    d="M236.2,301.2c0,8.1-6.6,14.7-14.7,14.7c-6,0-11.2-3.6-13.5-8.7c1.8,0.8,3.9,1.3,6,1.3       c8.1,0,14.7-6.6,14.7-14.7c0-2.1-0.5-4.2-1.3-6C232.6,290,236.2,295.2,236.2,301.2z" />
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <path class="st8"
                                                                                d="M364.5,164l-19.2,81.3c-1,4-4.5,6.9-8.7,6.9H205.7c-4.7,0-9,1.9-12.1,5c-1.1,1.1-2,2.3-2.8,3.6l18-107.8      h147C361.6,153,365.8,158.4,364.5,164z" />
                                                                        </g>
                                                                        <g>
                                                                            <path class="st9"
                                                                                d="M229.8,153l-16.6,99.1h-7.6c-4.7,0-9,1.9-12.1,5c-1.1,1.1-2,2.3-2.8,3.6l18-107.8H229.8z" />
                                                                        </g>
                                                                        <g>
                                                                            <path class="st10"
                                                                                d="M364.5,164l-19.2,81.3c-1,4-4.5,6.9-8.7,6.9h-21c4.1,0,7.7-2.8,8.7-6.9l19.2-81.3c1.3-5.6-2.9-11-8.7-11      h21C361.6,153,365.8,158.4,364.5,164z" />
                                                                        </g>
                                                                        <path class="st1"
                                                                            d="M364.5,164L364.5,164L364.5,164z" />
                                                                        <path class="st1"
                                                                            d="M366,153.9c-2.5-3.1-6.2-4.9-10.1-4.9H213.6l4-24.2c0.9-5.5-0.6-11-4.2-15.2c-3.6-4.2-8.8-6.6-14.3-6.6     h-26.8c-2.2,0-4,1.8-4,4s1.8,4,4,4h26.8c3.2,0,6.2,1.4,8.2,3.8s2.9,5.6,2.4,8.7l-22.8,136.3c-1.5,2.9-2.4,6.1-2.4,9.5     c0,11.7,9.5,21.1,21.1,21.1h0.5c-2.1,3-3.4,6.7-3.4,10.7c0,10.3,8.4,18.7,18.7,18.7s18.7-8.4,18.7-18.7c0-4-1.3-7.7-3.4-10.7     h58.8c-2.1,3-3.4,6.7-3.4,10.7c0,10.3,8.4,18.7,18.7,18.7s18.7-8.4,18.7-18.7s-8.4-18.7-18.7-18.7H205.7     c-7.2,0-13.1-5.9-13.1-13.1s5.9-13.1,13.1-13.1h130.9c6,0,11.2-4.1,12.6-9.9l19.2-81.3c0,0,0,0,0,0     C369.3,161,368.4,157,366,153.9z M310.9,290.4c5.9,0,10.7,4.8,10.7,10.7c0,5.9-4.8,10.7-10.7,10.7c-5.9,0-10.7-4.8-10.7-10.7     C300.1,295.2,305,290.4,310.9,290.4z M221.5,290.4c5.9,0,10.7,4.8,10.7,10.7c0,5.9-4.8,10.7-10.7,10.7c-5.9,0-10.7-4.8-10.7-10.7     C210.7,295.2,215.6,290.4,221.5,290.4z M360.6,163l-19.2,81.3c-0.5,2.2-2.5,3.8-4.8,3.8H205.7c-3.2,0-6.2,0.7-9,2l15.6-93.2     h143.6c1.5,0,2.9,0.7,3.8,1.9C360.6,160,361,161.6,360.6,163z" />
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path class="st1"
                                                                                d="M166.8,255h-21.6c-2.2,0-4-1.8-4-4s1.8-4,4-4h21.6c2.2,0,4,1.8,4,4S169,255,166.8,255z" />
                                                                        </g>
                                                                        <g>
                                                                            <path class="st1"
                                                                                d="M173.7,238.4h-28.5c-2.2,0-4-1.8-4-4s1.8-4,4-4h28.5c2.2,0,4,1.8,4,4S175.9,238.4,173.7,238.4z" />
                                                                        </g>
                                                                        <g>
                                                                            <path class="st1"
                                                                                d="M180.6,221.7h-35.3c-2.2,0-4-1.8-4-4s1.8-4,4-4h35.3c2.2,0,4,1.8,4,4S182.8,221.7,180.6,221.7z" />
                                                                        </g>
                                                                        <g>
                                                                            <path class="st1"
                                                                                d="M187.4,205.1h-42.2c-2.2,0-4-1.8-4-4s1.8-4,4-4h42.2c2.2,0,4,1.8,4,4S189.6,205.1,187.4,205.1z" />
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="count-number">
                                                        <span class="">{{ count_completed_order() }}</span>
                                                        <p>{{__("profil.key13") }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h4 class='mb-25'>{{__("profil.key14") }}</h4>
                                <ul class='student-profile-info'>
                                    <li>
                                        <h5>{{__("profil.key15") }}</h5>
                                        <span>{{ date('F d, Y h:i:s A e', strtotime("$profile->created_at")) }}</span>
                                    </li>
                                    <li>
                                        <h5>{{__("profil.key16") }}</h5>
                                        <span>{{ $profile->first_name }}</span>
                                    </li>
                                    <li>
                                        <h5>{{__("profil.key17") }}</h5>
                                        <span>{{ $profile->last_name }}</span>
                                    </li>
                                    <li>
                                        <h5>{{__("profil.key18") }}</h5>
                                        <span>{{ $user->email }}</span>
                                    </li>
                                    <li>
                                        <h5>{{__("profil.key19") }}</h5>
                                        <span>{{ $profile->phone ? $profile->phone : '-' }}</span>
                                    </li>
                                    <li>
                                        <h5>{{__("profil.key20") }}</h5>
                                        <span>{{ $profile->Occupation ? $profile->Occupation : 'Student' }}</span>
                                    </li>
                                    <li>
                                        <h5>{{__("profil.key21") }}</h5>
                                        <span>{{ $profile->biography_en ? $profile->biography_en : '-' }}</span>
                                    </li>
                                </ul>
                            </div>
                            @php ($items_data = $enrolled_courses)
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <h4 class='mb-25'>{{__("profil.key22") }}</h4>
                                <div class="student-profile-enroll">
                                    @include('front.layouts.components.catalog._list')
                                </div>
                            </div>
                            @php ($items_data = $wishlists)
                            <div class="tab-pane fade" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">
                                <h4 class='mb-25'>{{__("profil.key23") }}</h4>
                                <div class="student-profile-wishlist">
                                    @include('front.layouts.components.catalog._list')
                                </div>
                            </div>
                            <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                                <h4 class='mb-25'>{{__("profil.key24_0") }}</h4>
                                <div class="student-profile-orders-wrapper">
                                    @include('front.layouts.components.profile._invoice')
                                </div>
                            </div>
                            <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                                <h4 class='mb-25'>{{__("profil.key24") }}</h4>
                                <div class="student-profile-orders-wrapper">
                                    @include('front.layouts.components.profile._orders-history')
                                </div>
                            </div>
                            <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">
                                <h4 class='mb-25'>{{__("profil.key25") }}</h4>
                                <div class="student-profile-enroll">
                                    <ul class="nav mb-30" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="profileA-tab" data-bs-toggle="tab"
                                                data-bs-target="#profileA" type="button" role="tab"
                                                aria-controls="profileA" aria-selected="true">{{__("profil.key26") }}</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="password-tab" data-bs-toggle="tab"
                                                data-bs-target="#password" type="button" role="tab"
                                                aria-controls="password" aria-selected="false">{{__("profil.key27") }}</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="completedA-tab" data-bs-toggle="tab"
                                                data-bs-target="#completedA" type="button" role="tab"
                                                aria-controls="completedA" aria-selected="false">{{__("profil.key28") }}</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="profileA" role="tabpanel"
                                            aria-labelledby="profileA-tab">
                                            <div class="student-profile-settings">
                                                <div class="student-profile-setting-img mb-40">
                                                    <div class="student-profile-setting-cover-img"
                                                        data-background="{{ asset_own('front/img/slider/course-slider.jpg') }}">
                                                    </div>
                                                    <div class="student-profile-setting-author-img">
                                                        <img src="{{ asset_own('front/img/customized/profile/user-placeholder.png') }}"
                                                            alt="" />
                                                    </div>
                                                </div>
                                                <form method="post" action="{{ route('profile.update') }}"
                                                    class="mt-6 space-y-6">
                                                    @csrf
                                                    @method('patch')

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="hidden" name="name" />
                                                            <div class="contact-from-input mb-20">
                                                                <label htmlFor="first_name">{{__("profil.key29") }}</label>
                                                                <input type="text" placeholder="First Name"
                                                                    id="first_name" name="first_name"
                                                                    value="{{ $profile->first_name }}" required autofocus
                                                                    autocomplete="first_name">
                                                                <x-input-error :messages="$errors->get('firs_tname')"
                                                                    class="text-danger mt-2" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="contact-from-input mb-20">
                                                                <label htmlFor="LastName">{{__("profil.key30") }}</label>
                                                                <input type="text" placeholder="Last Name"
                                                                    id="last_name" name="last_name"
                                                                    value="{{ $profile->last_name }}" required autofocus
                                                                    autocomplete="last_name">
                                                                <x-input-error :messages="$errors->get('last_name')"
                                                                    class="text-danger mt-2" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="contact-from-input mb-20">
                                                                <label htmlFor="Email">{{__("profil.key31") }}</label>
                                                                <input type="text" placeholder="Email" id="email"
                                                                    name="email" value="{{ $user->email }}" required
                                                                    autocomplete="email">
                                                                <x-input-error :messages="$errors->get('email')"
                                                                    class="text-danger mt-2" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="contact-from-input mb-20">
                                                                <label htmlFor="Phone">{{__("profil.key32") }} </label>
                                                                <input type="text" placeholder="Phone" id="phone"
                                                                    name="phone" value="{{ $profile->phone }}"
                                                                    autocomplete="phone">
                                                                <x-input-error :messages="$errors->get('phone')"
                                                                    class="text-danger mt-2" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="contact-from-input mb-20">
                                                                <label htmlFor="occupation">{{__("profil.key33") }} </label>
                                                                <input type="text" placeholder="Occupation"
                                                                    id="occupation" name="occupation"
                                                                    value="{{ $profile->occupation }}"
                                                                    autocomplete="occupation">
                                                                <x-input-error :messages="$errors->get('occupation')"
                                                                    class="text-danger mt-2" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="contact-from-input mb-20">
                                                                <label htmlFor="biography">{{__("profil.key34") }} </label>
                                                                <textarea id='biography' name="biography" placeholder="Biography">
                                                                    {{ $profile->biography_en }}
                                                                </textarea>
                                                                <x-input-error :messages="$errors->get('biography')"
                                                                    class="text-danger mt-2" />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="cont-btn mb-20 mt-10">
                                                                <button type='submit'
                                                                    class="cont-btn">{{__("profil.key41") }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="password" role="tabpanel"
                                            aria-labelledby="password-tab">
                                            <form method="post" action="{{ route('password.update') }}"
                                                class="mt-6 space-y-6">
                                                @csrf
                                                @method('put')

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="contact-from-input mb-20">
                                                            <label htmlFor="current_password">{{__("profil.key35") }}</label>
                                                            <input id='current_password' type="password"
                                                                id="current_password" name="current_password"
                                                                type="password" autocomplete="current-password"
                                                                placeholder="Type password" />
                                                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class=" text-danger mt-2" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="contact-from-input mb-20">
                                                            <label htmlFor="password">{{__("profil.key36") }}</label>
                                                            <input name="password" type="password"
                                                                autocomplete="new-password" />
                                                            <x-input-error :messages="$errors->updatePassword->get('password')" class="text-danger mt-2" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="contact-from-input mb-20">
                                                            <label htmlFor="password_confirmation">{{__("profil.key37") }}</label>
                                                            <input id="password_confirmation" name="password_confirmation"
                                                                type="password" autocomplete="new-password" />
                                                            <x-input-error :messages="$errors->updatePassword->get(
                                                                'password_confirmation',
                                                            )" class="text-danger mt-2" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="cont-btn mb-20 mt-10">
                                                            <button type='submit' class="cont-btn">{{__("profil.key38") }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="completedA" role="tabpanel"
                                            aria-labelledby="completedA-tab">
                                            <div class="student-social-profile-link">
                                                <span class='mb-20'>{{__("profil.key39") }}</span>
                                                <form method="post" action="{{ route('profile.destroy') }}"
                                                    class="p-6">
                                                    @csrf
                                                    @method('delete')

                                                    <div class="row">
                                                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                            {{__("profil.key39&") }}
                                                        </h2>

                                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                            {{__("profil.key39&&") }}
                                                        </p>

                                                        <div class="col-md-12">
                                                            <div class="contact-from-input mb-20">
                                                                <x-input-label for="password"
                                                                    value="{{ __('Password') }}" class="sr-only" />

                                                                <x-text-input name="password" type="password"
                                                                    placeholder="{{__('profil.key39&&&') }}" />

                                                                <x-input-error :messages="$errors->userDeletion->get('password')"
                                                                    class="text-danger mt-2" />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 ">
                                                            <div class="cont-btn mb-20 mt-10">
                                                                <button type='submit' class="cont-btn">{{__("profil.key40") }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- User Profile End-->

@endsection

@section('third_party_scripts')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection

@extends('front.layouts.global')

@section('title', 'Contact')

@section('third_party_stylesheets')
    <style>
    </style>
@endsection

@section('main')
    <div class="banner-area faq position-relative">
        <div class="banner-img">
            <img src="{{ asset_own('front/img/banner/banner.png') }}" alt="image not found">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="course-title-breadcrumb breadcrumb-top">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item white-color"><a href="{{ route('home') }}">{{__("location.key1") }}</a></li>
                            <li class="breadcrumb-item white-color"><a href="course-grid.html">{{__("location.key2") }}</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-xl-8">
                    <div class="banner-tiitle-wrapper text-center">
                        <div class="banner-tittle">
                            <h2>{{__("location.key3") }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-arera-end -->

    <!-- faq-area-start -->
    <div class="faq-topic-area pb-90">
        <div class="container">
            <div class="faq-tabs-area mt-50">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="faq-area pt-30 pb-30">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="faq-tittle-info text-center pt-55 mb-50">
                                        <h1>{{__("location.key4") }}</h1>
                                    </div>
                                </div>

                                <div class="course-curriculam-accodion mt-30">
                                    <div class="accordion" id="accordionAfrique">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-4 mb-30">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="headingOne">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                            aria-expanded="true" aria-controls="collapseOne">
                                                            <span class="accordion-header">
                                                                <span class="accordion-tittle">
                                                                    <span>Abidjan</span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div id="collapseOne" class="accordion-collapse collapse"
                                                        aria-labelledby="headingOne" data-bs-parent="#accordionAfrique">
                                                        <div class="accordion-body">
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Riviera Palmeraie” les Rosiers Program #2
                                                                        Villa 95 – Ivory </h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> Coast Tel: (+225) 59 26 40 41 / 77 08 05 34</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> Email : info@akasigroup.com</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-30">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="headingTwo">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                            aria-expanded="true" aria-controls="collapseTwo">
                                                            <span class="accordion-header">
                                                                <span class="accordion-tittle">
                                                                    <span>Cotonou</span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                                        aria-labelledby="headingTwo" data-bs-parent="#accordionAfrique">
                                                        <div class="accordion-body">
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Rue du College Gaza, Agla
                                                                        72 BP 242 Cotonou – Benin </h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> Tel: (+229) 94 58 39 99 </h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> Email : akasibenin@akasigroup.com</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-30">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="headingTree">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseTree"
                                                            aria-expanded="true" aria-controls="collapseTree">
                                                            <span class="accordion-header">
                                                                <span class="accordion-tittle">
                                                                    <span>Lome</span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div id="collapseTree" class="accordion-collapse collapse"
                                                        aria-labelledby="headingTree" data-bs-parent="#accordionAfrique">
                                                        <div class="accordion-body">
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Maison Face Plan TOGO
                                                                        Lomé – Togo </h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> Tel: (+228) 97 78 41 28, </h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Email : info@akasigroup.com</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-6 col-lg-4 mb-30">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="headingFor">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseFor"
                                                            aria-expanded="true" aria-controls="collapseTree">
                                                            <span class="accordion-header">
                                                                <span class="accordion-tittle">
                                                                    <span>Accra</span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div id="collapseFor" class="accordion-collapse collapse"
                                                        aria-labelledby="headingFor" data-bs-parent="#accordionAfrique">
                                                        <div class="accordion-body">
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Centenary House Office #1
                                                                        4th floor</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> Tel: (+250) 78 50 22 308</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Email : akasibenin@akasigroup.com</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-30">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="headingFive">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                            aria-expanded="true" aria-controls="collapseTree">
                                                            <span class="accordion-header">
                                                                <span class="accordion-tittle">
                                                                    <span>Kampala</span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div id="collapseFive" class="accordion-collapse collapse"
                                                        aria-labelledby="headingFive" data-bs-parent="#accordionAfrique">
                                                        <div class="accordion-body">
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Centenary House, Office #1
                                                                        4th floor</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> Tel: (+250) 78 50 22 308</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Email : akasibenin@akasigroup.com</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-30">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="headingSix">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                                            aria-expanded="true" aria-controls="collapseTree">
                                                            <span class="accordion-header">
                                                                <span class="accordion-tittle">
                                                                    <span>Naîrobi</span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div id="collapseSix" class="accordion-collapse collapse"
                                                        aria-labelledby="headingSix" data-bs-parent="#accordionAfrique">
                                                        <div class="accordion-body">
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Centenary House, Office #1
                                                                        4th floor</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> Tel: (+250) 78 50 22 3088</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Email : akasibenin@akasigroup.com</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-30">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="headingSeven">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                                                            aria-expanded="true" aria-controls="collapseSeven">
                                                            <span class="accordion-header">
                                                                <span class="accordion-tittle">
                                                                    <span>Adidis Ababa</span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div id="collapseSeven" class="accordion-collapse collapse"
                                                        aria-labelledby="headingSeven" data-bs-parent="#accordionAfrique">
                                                        <div class="accordion-body">
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Centenary House, Office #1
                                                                        4th floo</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> Tel: (+250) 78 50 22 308</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Email : akasibenin@akasigroup.com</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-30">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="headingEith">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseEith"
                                                            aria-expanded="true" aria-controls="collapseEith">
                                                            <span class="accordion-header">
                                                                <span class="accordion-tittle">
                                                                    <span>Kigali</span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div id="collapseEith" class="accordion-collapse collapse"
                                                        aria-labelledby="headingEith" data-bs-parent="#accordionAfrique">
                                                        <div class="accordion-body">
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Centenary House, Office #1, 4th floor
                                                                        Kigali – Rwanda</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> Tel: (+250) 78 50 22 308</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Email : akasibenin@akasigroup.com</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-30">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="headingNine">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseNine"
                                                            aria-expanded="true" aria-controls="collapseNine">
                                                            <span class="accordion-header">
                                                                <span class="accordion-tittle">
                                                                    <span>Niamey</span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div id="collapseNine" class="accordion-collapse collapse"
                                                        aria-labelledby="headingNine" data-bs-parent="#accordionAfrique">
                                                        <div class="accordion-body">
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Plots Y and Z, lot 6451
                                                                        BP:13.638 Niamey – Niger</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> Tel: (+227) 94 66 83 38</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Email : akasibenin@akasigroup.com</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-30">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="headingTen">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseTen"
                                                            aria-expanded="true" aria-controls="collapseTen">
                                                            <span class="accordion-header">
                                                                <span class="accordion-tittle">
                                                                    <span>Brazaville</span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div id="collapseTen" class="accordion-collapse collapse"
                                                        aria-labelledby="headingTen" data-bs-parent="#accordionAfrique">
                                                        <div class="accordion-body">
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Centenary House, Office #1
                                                                        4th floor</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Tel: (+250) 78 50 22 308</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Email : akasibenin@akasigroup.com</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-30">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="headingEleven">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseEleven"
                                                            aria-expanded="true" aria-controls="collapseEleven">
                                                            <span class="accordion-header">
                                                                <span class="accordion-tittle">
                                                                    <span>Kinshasha</span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div id="collapseEleven" class="accordion-collapse collapse"
                                                        aria-labelledby="headingEleven"
                                                        data-bs-parent="#accordionAfrique">
                                                        <div class="accordion-body">
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Centenary House, Office #1
                                                                        4th floor</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Tel: (+250) 78 50 22 308</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Email : akasibenin@akasigroup.com</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-30">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="headingTwoleven">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseTwoleven"
                                                            aria-expanded="true" aria-controls="collapseTwoleven">
                                                            <span class="accordion-header">
                                                                <span class="accordion-tittle">
                                                                    <span>Ouagadougou</span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div id="collapseTwoleven" class="accordion-collapse collapse"
                                                        aria-labelledby="headingTwoleven"
                                                        data-bs-parent="#accordionAfrique">
                                                        <div class="accordion-body">
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Centenary House, Office #1
                                                                        4th floor</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Tel: (+250) 78 50 22 308</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Email : akasibenin@akasigroup.com</h4>
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

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="faq-tittle-info text-center pt-55 mb-50">
                                        <h1>{{__("location.key5") }}</h1>
                                    </div>
                                </div>

                                <div class="course-curriculam-accodion mt-30">
                                    <div class="accordion" id="accordionEurope">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-4 mb-30">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="headingThirteen">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseThirteen"
                                                            aria-expanded="true" aria-controls="collapseThirteen">
                                                            <span class="accordion-header">
                                                                <span class="accordion-tittle">
                                                                    <span>Bruxelles</span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div id="collapseThirteen" class="accordion-collapse collapse"
                                                        aria-labelledby="headingThirteen"
                                                        data-bs-parent="#accordionEurope">
                                                        <div class="accordion-body">
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Grand Place 8 </h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> Bruxelles, Belgique</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> Email : info@akasigroup.com</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-30">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="headingForteen">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseForteen"
                                                            aria-expanded="true" aria-controls="collapseForteen">
                                                            <span class="accordion-header">
                                                                <span class="accordion-tittle">
                                                                    <span>Lyon</span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div id="collapseForteen" class="accordion-collapse collapse"
                                                        aria-labelledby="headingForteen"
                                                        data-bs-parent="#accordionEurope">
                                                        <div class="accordion-body">
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>1 Place de la Comédie </h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> Lyon, France </h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> Email : info@akasigroup.com</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-30">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="headingFifteen">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseFifteen"
                                                            aria-expanded="true" aria-controls="collapseFifteen">
                                                            <span class="accordion-header">
                                                                <span class="accordion-tittle">
                                                                    <span>Paris</span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div id="collapseFifteen" class="accordion-collapse collapse"
                                                        aria-labelledby="headingFifteen"
                                                        data-bs-parent="#accordionEurope">
                                                        <div class="accordion-body">
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Place de l’Hôtel de Ville </h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> 75008 Paris, France </h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Email : info@akasigroup.com</h4>
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

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="faq-tittle-info text-center pt-55 mb-50">
                                        <h1>{{__("location.key6") }}</h1>
                                    </div>
                                </div>

                                <div class="course-curriculam-accodion mt-30">
                                    <div class="accordion" id="accordionNorthAmerica">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-4 mb-30">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="headingSixteen">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseSixteen"
                                                            aria-expanded="true" aria-controls="collapseSixteen">
                                                            <span class="accordion-header">
                                                                <span class="accordion-tittle">
                                                                    <span>Montreal</span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div id="collapseSixteen" class="accordion-collapse collapse"
                                                        aria-labelledby="headingSixteen"
                                                        data-bs-parent="#accordionNorthAmerica">
                                                        <div class="accordion-body">
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>987 Ave Rougemont
                                                                        Montreal, QC, H1N2R2</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> (+1) 514 217 2503</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> Email : info@akasigroup.com</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-30">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="headingSenvteen">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseSenvteen"
                                                            aria-expanded="true" aria-controls="collapseSenvteen">
                                                            <span class="accordion-header">
                                                                <span class="accordion-tittle">
                                                                    <span>Nashua</span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div id="collapseSenvteen" class="accordion-collapse collapse"
                                                        aria-labelledby="headingSenvteen"
                                                        data-bs-parent="#accordionNorthAmerica">
                                                        <div class="accordion-body">
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>131 Daniel Webster Hwy #311,Nashua
                                                                        NH 03060 – USA </h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> Tel: (617) 213 0880, Main Fax: (603) 594 3180</h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> Email : info@akasigroup.com</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-30">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="headingEitheen">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseEitheen"
                                                            aria-expanded="true" aria-controls="collapseEitheen">
                                                            <span class="accordion-header">
                                                                <span class="accordion-tittle">
                                                                    <span>Toronto</span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div id="collapseEitheen" class="accordion-collapse collapse"
                                                        aria-labelledby="headingEitheen"
                                                        data-bs-parent="#accordionNorthAmerica">
                                                        <div class="accordion-body">
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Queen St W
                                                                        Toronto, ON M5H 2N2 </h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4> (+1) 514 217 2503 </h4>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course-curriculum-content p-0 d-sm-flex justify-content-between align-items-center">
                                                                <div class="course-curriculum-info">
                                                                    <h4>Email : info@akasigroup.com</h4>
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
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('third_party_scripts')
    <script></script>
@endsection

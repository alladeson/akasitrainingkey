@extends('front.layouts.global')

@section('title', 'Contact')

@section('third_party_stylesheets')
    <style>
        .accordion-bottom-border {
            border-bottom: 1px solid rgba(0,0,0,.125);
        }
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
                            <li class="breadcrumb-item white-color"><a href="{{ route('home') }}">{{__("faq.key1") }}</a></li>
                            <li class="breadcrumb-item white-color"><a href="course-grid.html">{{__("faq.key2") }}</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-xl-8">
                    <div class="banner-tiitle-wrapper text-center">
                        <div class="banner-tittle">
                            <h2>{{__("faq.key3") }}<br>{{__("faq.key4") }}</h2>
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
                                        <h3>{{__("faq.key5") }}</h3>
                                    </div>
                                </div>
                                <div class="course-curriculam-accodion mt-30">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item accordion-bottom-border">
                                            <div class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    <span class="accordion-header">
                                                        <span class="accordion-tittle">
                                                            <span>{{__("faq.key5&") }}</span>
                                                        </span>
                                                    </span>
                                                </button>
                                            </div>
                                            <div id="collapseOne" class="accordion-collapse collapse"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div
                                                        class="course-curriculum-content d-sm-flex justify-content-between align-items-center">
                                                        <div class="course-curriculum-meta">
                                                            <P>{{__("faq.key6") }}</P>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="accordion-item accordion-bottom-border">
                                            <div class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                    aria-expanded="true" aria-controls="collapseTwo">
                                                    <span class="accordion-header">
                                                        <span class="accordion-tittle">
                                                            <span>{{__("faq.key7") }}</span>
                                                        </span>
                                                    </span>
                                                </button>
                                            </div>
                                            <div id="collapseTwo" class="accordion-collapse collapse"
                                                aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div
                                                        class="course-curriculum-content d-sm-flex justify-content-between align-items-center">
                                                        <div class="course-curriculum-meta">
                                                            <p>{{__("faq.key8") }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="accordion-item accordion-bottom-border">
                                            <div class="accordion-header" id="headingTree">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseTree"
                                                    aria-expanded="true" aria-controls="collapseTree">
                                                    <span class="accordion-header">
                                                        <span class="accordion-tittle">
                                                            <span>{{__("faq.key9") }}</span>
                                                        </span>
                                                    </span>
                                                </button>
                                            </div>
                                            <div id="collapseTree" class="accordion-collapse collapse"
                                                aria-labelledby="headingTree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div
                                                        class="course-curriculum-content d-sm-flex justify-content-between align-items-center">
                                                        <div class="course-curriculum-meta">
                                                            <P>{{__("faq.key10") }}</P>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="accordion-item accordion-bottom-border">
                                            <div class="accordion-header" id="headingFor">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseFor"
                                                    aria-expanded="true" aria-controls="collapseFor">
                                                    <span class="accordion-header">
                                                        <span class="accordion-tittle">
                                                            <span>{{__("faq.key11") }}</span>
                                                        </span>
                                                    </span>
                                                </button>
                                            </div>
                                            <div id="collapseFor" class="accordion-collapse collapse"
                                                aria-labelledby="headingFor" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div
                                                        class="course-curriculum-content d-sm-flex justify-content-between align-items-center">
                                                        <div class="course-curriculum-meta">
                                                            <P>{{__("faq.key12") }}</P>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="accordion-item accordion-bottom-border">
                                            <div class="accordion-header" id="headingFive">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                    aria-expanded="true" aria-controls="collapseFor">
                                                    <span class="accordion-header">
                                                        <span class="accordion-tittle">
                                                            <span>{{__("faq.key13") }}</span>
                                                        </span>
                                                    </span>
                                                </button>
                                            </div>
                                            <div id="collapseFive" class="accordion-collapse collapse"
                                                aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div
                                                        class="course-curriculum-content d-sm-flex justify-content-between align-items-center">
                                                        <div class="course-curriculum-meta">
                                                            <P>{{__("faq.key14") }}</P>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="accordion-item accordion-bottom-border">
                                            <div class="accordion-header" id="headingSix">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                                    aria-expanded="true" aria-controls="collapseFor">
                                                    <span class="accordion-header">
                                                        <span class="accordion-tittle">
                                                            <span>{{__("faq.key15") }}</span>
                                                        </span>
                                                    </span>
                                                </button>
                                            </div>
                                            <div id="collapseSix" class="accordion-collapse collapse"
                                                aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div
                                                        class="course-curriculum-content d-sm-flex justify-content-between align-items-center">
                                                        <div class="course-curriculum-meta">
                                                            <P>{{__("faq.key16") }}</P>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="accordion-item accordion-bottom-border">
                                            <div class="accordion-header" id="headingSeven">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                                                    aria-expanded="true" aria-controls="collapseFor">
                                                    <span class="accordion-header">
                                                        <span class="accordion-tittle">
                                                            <span>{{__("faq.key17") }}</span>
                                                        </span>
                                                    </span>
                                                </button>
                                            </div>
                                            <div id="collapseSeven" class="accordion-collapse collapse"
                                                aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div
                                                        class="course-curriculum-content d-sm-flex justify-content-between align-items-center">
                                                        <div class="course-curriculum-meta">
                                                            <P>{{__("faq.key18") }}</P>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="accordion-item accordion-bottom-border">
                                            <div class="accordion-header" id="headingEith">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseEith"
                                                    aria-expanded="true" aria-controls="collapseFor">
                                                    <span class="accordion-header">
                                                        <span class="accordion-tittle">
                                                            <span>{{__("faq.key19") }}</span>
                                                        </span>
                                                    </span>
                                                </button>
                                            </div>
                                            <div id="collapseEith" class="accordion-collapse collapse"
                                                aria-labelledby="headingEith" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div
                                                        class="course-curriculum-content d-sm-flex justify-content-between align-items-center">
                                                        <div class="course-curriculum-meta">
                                                            <P>{{__("faq.key20") }}</P>
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

<div class="categories-area grey-2 pt-110 pb-90 position-relative">
    <div class="category-shap-02">
        <img src="{{ asset_own('front/img/shape/categorey-shap-02.png') }}" alt="image not found">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-20">
                <div class="section-title mb-30">
                    <h2>{{__("home.key35") }} <span class="down-mark-line-2">{{__("home.key36") }}</span></h2>
                    <div>{{__("home.key37") }}</div>
                </div>
            </div>
            <div class="">
                <div class="category-main-wrapper position-relative">
                    <div class="category-shap-01">
                        <img src="{{ asset_own('front/img/shape/categorey-shap-01.png') }}" alt="image not found">
                    </div>
                    <div class="">
                        <div class="category-slide-wrapper position-relative">
                            <div class="swiper-container category-active">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    @foreach ($certifications as $certification)
                                        <div class="swiper-slide">
                                            <a href="{{ route('courses.catalog') }}">
                                                <div class="categories-wrapper text-center mb-30">
                                                    <div class="categiories-thumb">
                                                        <img class="" width="128.484" height="128.228"
                                                            src="{{ asset_own('front/img/customized/certifications/' . $certification->url_tag . '.png') }}"
                                                            alt="{{ $certification->name_en }}">
                                                    </div>
                                                    <div class="categories-content certification-topic-title">
                                                        <h4 class="mt-2">{{ $certification->name_en }}</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                                <!-- If we need pagination -->
                                <div class="swiper-pagination"></div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="category-nav">
                                <div class="category-button-prev"><i class="far fa-long-arrow-left"></i></div>
                                <div class="category-button-next"><i class="far fa-long-arrow-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="top-catagory-area pt-110 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 offset-xl-4 col-lg-6 offset-lg-3 col-md-12 col-sm justify-content-center mb-30">
                <div class="section-title mb-20 text-center">
                    <h2>{{__("home.key30") }} <br> <span class="down-mark-line-2">{{__("home.key31") }}</span> {{__("home.key32") }}</h2>
                    <div>{{__("home.key33") }}</div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($training_topics as $topic)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <a href="{{ route('courses.catalog') }}" class="">
                        <div class="catagory-wrapper mb-30">
                            <div class="catagory-thumb">
                                <img class="trainings-img" width="45" height="45.01"
                                    src="{{ asset_own('front/img/customized/trainings/'. $topic->url_tag . '.png') }}"
                                    alt="{{$topic->name_en}}">
                            </div>
                            <div class="catagory-content">
                                <h3 class="m-0">{{$topic->name_en}}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="hero-btn text-center mt-50">
            <a class="edu-btn" href="{{ route('courses.catalog') }}">{{__("home.key34") }}</a>
        </div>
    </div>
</div>

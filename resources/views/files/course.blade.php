@extends('files.global')

@section('title', 'Cours Datails')

@section('third_party_stylesheets')
    <style>
        .primary-color {
            color: #ff0e0d !important;
        }

        .secondary-color {
            color: #005dae !important;
        }
    </style>
@endsection

@section('main')
    <!-- course-details-area-start -->
    {{-- <div class="logo">
        <img class="img-responsive" alt="logo" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('front/img/customized/logo/alek-logo.png'))) }}"/>
    </div> --}}
    <section class="course-detalis-area pb-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="course-detalis-wrapper mb-30">
                        <div class="course-heading mb-20">
                            <h2>{{ $course->name_en }}</h2>
                            <div class="course-star">
                                <span>Course: <strong>{{ $course->code }}</strong></span>
                            </div>
                        </div>
                        <div class="course-detelis-meta">
                            <div class="row">
                                <div class="col-md-3">
                                    Level: <strong>{{ $course->level_en }}</strong>
                                </div>
                                <div class="col-md-3 d-flex justify-content-center">
                                    Duration: <strong>{{ $course->duration_en }}</strong>
                                </div>

                                <div class="col-md-12">
                                    Category: <strong>{{ $category->name_en }}</strong>
                                </div>

                                <div class="col-md-12">
                                    Price: <strong class="primary-color">{{ format_amount($course->price_euro) }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="course-description pt-45 pb-30">
                            <div class="course-Description">
                                <h4 class="primary-color">About Course</h4>
                            </div>
                            <p>{{ $course->description_en }}</p>
                        </div>
                        <div class="course-learn-wrapper">
                            <div class="course-learn">
                                <div class="course-leranm-tittle">
                                    <h4 class="mb-15 primary-color">What you'll learn</h4>
                                </div>
                                <div class="row">
                                    <ul>
                                        @forelse ($goals as $goal)
                                            <li>{{ $goal->description_en }}</li>
                                        @empty
                                            <li style="list-style: none">-</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @if(count($targeted_audiences) > 0)
                        <div class="course-requirements pt-45">
                            <h4 class="primary-color">Targeted Audience</h4>
                            <div class="course-requirements-text">
                                <ul>
                                    @foreach ($targeted_audiences as $targeted_audience)
                                        <li>{{ $targeted_audience->description_en }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    @if(count($included_materials) > 0)
                        <div class="course-requirements pt-45">
                            <h4 class="primary-color">Materials Included</h4>
                            <div class="course-requirements-text">
                                <ul>
                                    @foreach ($included_materials as $included_material)
                                        <li>{{ $included_material->description_en }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="course-requirements pt-45">
                        <h4 class="primary-color">Pre-Requisites</h4>
                        <div class="course-requirements-text">
                            <ul>
                                @forelse ($pre_requisites as $pre_requisite)
                                    <li>{{ $pre_requisite->description_en }}</li>
                                @empty
                                    <li style="list-style: none">None</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <div class="course-curriculum pt-40">
                        <div class="course-curriculam">
                            <h4 class="primary-color">Curriculum</h4>
                        </div>
                        <div class="course-curriculam-accodion">
                            @forelse ($modules as $module)
                                <h4 class=""> Module {{ $loop->iteration }}: {{ $module->title_en }}</h4>
                                <ul>
                                    @forelse  ($module_lessons['module_' . $module->id] as $lesson)
                                        <li>{{ $lesson->title_en }}</li>
                                    @empty
                                        <li style="list-style: none">-</li>
                                    @endforelse
                                </ul>
                            @empty
                                <h4 class="">-</h4>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

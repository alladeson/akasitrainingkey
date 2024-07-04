@extends('back.layouts.global')

@section('title', 'Create Course')

@section('third_party_stylesheets')
    <style>
        .primary-color {
            color: #ff0e0d !important;
        }

        .secondary-color {
            color: #005dae !important;
        }

        .card-tile-edit-icon {
            display: none;
        }
        .my-card-title:hover .card-tile-edit-icon {
            display: revert;
        }
    </style>
@endsection

@section('main-content')
    <div class="container-fluid">
            <!-- Create course card -->
            <div class="card card-primary">
                <div class="card-header" data-card-widget="collapse" style="cursor: pointer; display: flex;flex-direction: row;justify-content: center;">
                    <h1 class="card-title" style="font-size: 20px;">{{ $page_title }}</h1>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Create course form -->
                    <form action="@if(isset($course) && $course->id){{route('courses.update', ['id'=>$course->id])}}@else{{route('courses.store')}}@endif" method="post" id="about-course-form" class="mb-5">
                        @csrf
                        @isset($course)@method('patch')@endisset
                        <div class="row mb-2">
                            <div class="col-md-2 d-none">
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="number"
                                        value="@if(isset($course)){{ old('code', $course->code) }}@else{{ old('code') }}@endif"
                                        class="form-control form-control-border" step="1" name="code"
                                        id="code" placeholder="course code">
                                        <x-input-error :messages="$errors->get('code')" class="text-danger" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name_en">Title<span class="text-danger">*</span></label>
                                    <input type="text"
                                        value="@if(isset($course)){{ old('name_en', $course->name_en) }}@else{{ old('name_en') }}@endif"
                                        class="form-control form-control-border" name="name_en" id="name_en"
                                        placeholder="enter course title">
                                        <x-input-error :messages="$errors->get('name_en')" class="text-danger" />
                                </div>
                            </div>
                        </div>
                        <!--/.row -->
                        <div class="row">
                            <input type="hidden" name="course_id" id="course_id" value="@isset($course){{ $course->id }}@endisset">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Training Topic<span class="text-danger">*</span></label>
                                    <select class="form-control select2" style="width: 100%;" name="topic_id"
                                        id="topic_id" onchange="hideValidatonMessage(this);getCourseSelectView(this);">
                                        <option value="">select a topic</option>
                                        @foreach ($topics as $topic)
                                            <option value="{{ $topic->id }}"
                                                @if ( (isset($category) && $category->training_topic_id == $topic->id) || $topic->id == old('topic_id') || (session('topic') && (session('topic')->id == $topic->id))) @selected(true) @endif>
                                                {{ $topic->name_en }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('topic_id')" class="text-danger" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                @include('back.pages.courses.categories._select-view')
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Certification</label>
                                    <select class="form-control select2" style="width: 100%;" name="certification_id"
                                        id="certification_id">
                                        <option value="">select a certification</option>
                                        @foreach ($certifications as $certification)
                                            <option value="{{ $certification->id }}"
                                                @if ( (isset($course) && $certification->id == $course->certification_id) || $certification->id == old('certification_id') || (session('course') && (session('course')->certification_id == $certification->id))) @selected(true) @endif>
                                                {{ $certification->name_en }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('certification_id')" class="text-danger" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Vendor</label>
                                    <select class="form-control select2" style="width: 100%;" name="vendor_id"
                                        id="vendor_id">
                                        <option value="">select a vendor</option>
                                        @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}"
                                                @if ( (isset($course) && $vendor->id == $course->vendor_id) || $vendor->id == old('vendor_id') || (session('course') && (session('course')->vendor_id == $vendor->id))) @selected(true) @endif>
                                                {{ $vendor->name_en }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('vendor_id')" class="text-danger" />
                                </div>
                            </div>
                        </div>
                        <!--/.row -->
                        <div class="row d-none">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="url_tag">Tag Url <code>(tag url)</code></label>
                                    <input type="text"
                                        value="@if(isset($course)){{ old('url_tag', $course->url_tag) }}@else{{ old('url_tag') }}@endif"
                                        class="form-control form-control-border" name="url_tag" id="url_tag"
                                        placeholder="course tag url" required>
                                    <x-input-error :messages="$errors->get('url_tag')" class="text-danger" />
                                </div>
                            </div>
                        </div>
                        <!--/.row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description_en">Description (About Course)<span class="text-danger">*</span></code></label>
                                    <textarea class="form-control" name="description_en" id="description_en" rows="5"
                                        placeholder="Enter description about course">@if(isset($course)){{ old('description_en', $course->description_en) }}@else{{ old('description_en') }}@endif</textarea>
                                    <x-input-error :messages="$errors->get('description_en')" class="text-danger" />
                                </div>
                            </div>
                        </div>
                        <!--/.row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Level<span class="text-danger">*</span></label>
                                    <select class="form-control form-control-border" style="width: 100%;" name="level_en"
                                        id="level_en">
                                        <option value="">select a level</option>
                                        <option
                                            @if ( (isset($course) && $course->level_en == 'Beginner') || old('level_en') == 'Beginner') @selected(true) @endif>
                                            Beginner</option>
                                        <option
                                            @if ( (isset($course) && $course->level_en == 'Intermediate') || old('level_en') == 'Intermediate') @selected(true) @endif>
                                            Intermediate</option>
                                        <option
                                            @if ( (isset($course) && $course->level_en == 'Expert') || old('level_en') == 'Expert') @selected(true) @endif>
                                            Expert</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('level_en')" class="text-danger" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Learning Mode<span class="text-danger">*</span></label>
                                    <select class="form-control form-control-border" style="width: 100%;"
                                        name="learning_mode_en" id="learning_mode_en">
                                        <option value="">select a learning mode</option>
                                        <option
                                            @if ( (isset($course) && $course->learning_mode_en == 'In-class') || old('learning_mode_en') == 'In-class') @selected(true) @endif>
                                            In-class</option>
                                        <option
                                            @if ( (isset($course) && $course->learning_mode_en == 'Online') || old('learning_mode_en') == 'Online') @selected(true) @endif>
                                            Online</option>
                                        <option
                                            @if ( (isset($course) && $course->learning_mode_en == 'In-class or Online') || old('learning_mode_en') == 'In-class or Online') @selected(true) @endif>
                                            In-class or Online</option>
                                        <option
                                            @if ( (isset($course) && $course->learning_mode_en == 'Webinar') || old('learning_mode_en') == 'Webinar') @selected(true) @endif>
                                            Webinar</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('learning_mode_en')" class="text-danger" />
                                </div>
                            </div>
                        </div>
                        <!--/.row -->
                        <div class="row">
                            <div class="col-md-6">
                                <label for="duration_type">Duration<span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control form-control-border" style="width: 100%;" name="duration_number"
                                                id="duration_number" onchange="formatCourseDuration(this);">
                                                <option value="">select number</option>
                                                @for ($i = 1; $i <= 100; $i++)
                                                    <option
                                                        @if ( (isset($course) && $course->duration_number == $i) || old('duration_number') == $i) @selected(true) @endif>
                                                        {{$i}}</option>
                                                @endfor
                                            </select>
                                            <x-input-error :messages="$errors->get('duration_number')" class="text-danger" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control form-control-border" style="width: 100%;" name="duration_type"
                                                id="duration_type" onchange="formatCourseDuration(this);">
                                                <option value="">select type</option>
                                                <option value="day"
                                                    @if ( (isset($course) && $course->duration_type == 'day') || old('duration_type') == 'day') @selected(true) @endif>
                                                    day(s)</option>
                                                <option value="hour"
                                                    @if ( (isset($course) && $course->duration_type == 'hour') || (old('duration_type') != null && old('duration_type') == 'hour') ) @selected(true) @endif>
                                                    hour(s)</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('duration_type')" class="text-danger" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>After-course coaching available?<span class="text-danger">*</span></label>
                                    <select class="form-control form-control-border" style="width: 100%;" name="after_course"
                                        id="after_course">
                                        <option value="">select</option>

                                        <option value="1"
                                            @if ( (isset($course) && $course->after_course == 1) || old('after_course') == '1') @selected(true) @endif>
                                            Yes</option>
                                        <option value="0"
                                            @if ( (isset($course) && $course->after_course == 0) || (old('after_course') != null && old('after_course') == '0') ) @selected(true) @endif>
                                            No</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('after_course')" class="text-danger" />
                                </div>
                            </div>
                        </div>
                        <!--/.row -->
                        <div class="row d-none">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="duration_en">Duration<span class="text-danger">*</span></label>
                                    <input type="text"
                                        value="@if(isset($course)){{ old('duration_en', $course->duration_en) }}@else{{ old('duration_en') }}@endif"
                                        pattern="^[0-9]+\s+(hour|day)s?$" class="form-control form-control-border"
                                        name="duration_en" id="duration_en" placeholder="enter duration in English">
                                    <x-input-error :messages="$errors->get('duration_en')" class="text-danger" />
                                </div>
                            </div>
                        </div>
                        <!--/.row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="price_euro">Price(EURO)<span class="text-danger">*</span></label>
                                    <input type="number"
                                        value="@if(isset($course)){{ old('price_euro', $course->price_euro) }}@else{{ old('price_euro') }}@endif"
                                        step="1" class="form-control form-control-border" name="price_euro"
                                        id="price_euro" placeholder="enter price in euro currency">
                                    <x-input-error :messages="$errors->get('price_euro')" class="text-danger" />
                                </div>
                            </div>
                        </div>
                        <!--/.row -->
                    </form>
                    <!-- /.form -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary card-outline card-outline-tabs">
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-four-goals-tab" data-toggle="pill" href="#custom-tabs-four-goals" role="tab" aria-controls="custom-tabs-four-goals" aria-selected="true">Course Goals (What you'll learn)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-audiences-tab" data-toggle="pill" href="#custom-tabs-four-audiences" role="tab" aria-controls="custom-tabs-four-audiences" aria-selected="false">Targeted Audiences</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-materials-tab" data-toggle="pill" href="#custom-tabs-four-materials" role="tab" aria-controls="custom-tabs-four-materials" aria-selected="false">Included Materials</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-pre-requisites-tab" data-toggle="pill" href="#custom-tabs-four-pre-requisites" role="tab" aria-controls="custom-tabs-four-pre-requisites" aria-selected="false">Pre-Requisites</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-modules-tab" data-toggle="pill" href="#custom-tabs-four-modules" role="tab" aria-controls="custom-tabs-four-modules" aria-selected="false">Course Modules & Lessons</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-four-goals" role="tabpanel" aria-labelledby="custom-tabs-four-goals-tab">
                                            @include('back.pages.courses.goals._create-form-list')
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-four-audiences" role="tabpanel" aria-labelledby="custom-tabs-four-audiences-tab">
                                            @include('back.pages.courses.targeted-audiences._create-form-list')
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-four-materials" role="tabpanel" aria-labelledby="custom-tabs-four-materials-tab">
                                            @include('back.pages.courses.included-materials._create-form-list')
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-four-pre-requisites" role="tabpanel" aria-labelledby="custom-tabs-four-pre-requisites-tab">
                                            @include('back.pages.courses.pre-requisites._create-form-list')
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-four-modules" role="tabpanel" aria-labelledby="custom-tabs-four-modules-tab">
                                            @include('back.pages.courses.modules._create-form-list')
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row d-flex justify-content-between">
                        <button type="button" class="btn btn-default" onclick="location.href='{{route('courses.index')}}';"><i class="fas fa-arrow-left"></i> Return To Courses</button>
                        <button type="button" class="btn btn-primary" onclick="$('#about-course-form').submit();">Save Course</button>
                    </div>
                    <!--/.row -->
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->

        <!-- Course metadata -->

        {{-- @if(isset($course))
            <!-- Course goals card -->
            <div class="card card-primary collapsed-card">
                <div class="card-header" data-card-widget="collapse" style="cursor: pointer; display: flex;flex-direction: row;justify-content: center;">
                    <h1 class="card-title" style="font-size: 20px;">Course Goals (What you'll learn)</h1>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                    @include('back.pages.courses.goals._create-form-list')
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.Course goals card -->
            <!-- Course targeted audiences card -->
            <div class="card card-primary collapsed-card">
                <div class="card-header" data-card-widget="collapse" style="cursor: pointer; display: flex;flex-direction: row;justify-content: center;">
                    <h1 class="card-title" style="font-size: 20px;">Targeted Audiences</h1>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                    @include('back.pages.courses.targeted-audiences._create-form-list')
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.Course targeted audiences card -->
            <!-- Course included materials card -->
            <div class="card card-primary collapsed-card">
                <div class="card-header" data-card-widget="collapse" style="cursor: pointer; display: flex;flex-direction: row;justify-content: center;">
                    <h1 class="card-title" style="font-size: 20px;">Included Materials</h1>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                    @include('back.pages.courses.included-materials._create-form-list')
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.Course included materials card -->
            <!-- Course pre-requisites card -->
            <div class="card card-primary collapsed-card">
                <div class="card-header" data-card-widget="collapse" style="cursor: pointer; display: flex;flex-direction: row;justify-content: center;">
                    <h1 class="card-title" style="font-size: 20px;">Pre-Requisites</h1>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                    @include('back.pages.courses.pre-requisites._create-form-list')
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.Course pre-requisites card -->
            <!-- Course modules card -->
            <div class="card card-primary collapsed-card">
                <div class="card-header" data-card-widget="collapse" style="cursor: pointer; display: flex;flex-direction: row;justify-content: center;">
                    <h1 class="card-title" style="font-size: 20px;">Course Modules & Lessons</h1>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                    @include('back.pages.courses.modules._create-form-list')
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.Course modules card -->
            <!-- Course goals card -->
            <div class="card card-primary">
            </div>
            <!-- /.Course goals card -->
        @endif --}}
        <!-- /.Course metadat -->
    </div>
    <!-- /.container-fluid -->
@endsection

@section('third_party_scripts')
    <script>
        $(document).ready(function() {
            showEditField();
        });
    </script>
    <script>
        function hideValidatonMessage(el) {
            if ($(el).val()) {
                $('span#' + $(el).attr('id') + '-error').hide();
            } else {
                $('span#' + $(el).attr('id') + '-error').show();
            }
        }

        function levelChangeManager(el) {
            if ($(el).val()) {
                // Retrive level_en id
                var el_en_id = $(el).attr('id');
                // Define level_fr id
                var el_fr_id = el_en_id.replace("_en", '_fr');
                // Update leve_fr value
                $('#' + el_fr_id).val($(el).val().replace("_en", '_fr'))
            } else {
                alert('Please select a level to continue!');
            }
        }
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            // $.validator.setDefaults({
            //     submitHandler: function(form) {
            //         $(form).submit();
            //         // alert('Success')
            //     }
            // });
            $('#about-course-form').validate({
                rules: {
                    topic_id: {
                        required: true,
                    },
                    category_id: {
                        required: true,
                    },
                    name_en: {
                        required: true,
                    },
                    description_en: {
                        required: true
                    },
                    level_en: {
                        required: true
                    },
                    duration_en: {
                        required: true
                    },
                    duration_type: {
                        required: true
                    },
                    duration_number: {
                        required: true
                    },
                    after_course: {
                        required: true
                    },
                    learning_mode_en: {
                        required: true
                    },
                    price_euro: {
                        required: true,
                        number: true,
                    },
                },
                messages: {
                    topic_id: {
                        required: "Please select a topic",
                    },
                    category_id: {
                        required: "Please select a category",
                    },
                    name_en: {
                        required: "Please enter the course title",
                    },
                    description_en: {
                        required: "Please enter the course description in English",
                    },
                    level_en: {
                        required: "Please select a level",
                    },
                    duration_en: {
                        required: "Please enter the course duration in English",
                    },
                    duration_type: {
                        required: "Please select the type of duration",
                    },
                    duration_number: {
                        required: "Please select the number of duration",
                    },
                    after_course: {
                        required: "Please select Yes or No",
                    },
                    learning_mode_en: {
                        required: "Please enter the course learning mode in English",
                    },
                    price_euro: {
                        required: "Please enter the course price in euro currency",
                        number: "Price must be a number"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
            $('input#name_en').on('change', function(event) {
                var course_name = $(this).val();
                $.ajax({
                    url: "{{ route('courses.url_tag') }}",
                    method: "post",
                    data: {
                        'course_name': course_name,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(result) {
                        // to do with result
                        $('input#url_tag').val(result.url_tag);
                        $('input#url_tag').removeAttr('readonly');
                        $('input#url_tag').attr('required', 'required');
                    },
                    error: function(error) {
                        // to do with error
                        console.log(error);
                        // Show message error
                        // Toast.fire({
                        //     icon: 'error',
                        //     title: 'An error occurred while formatting the course tag URL. Please enter it manually!'
                        // })
                    },
                    beforeSend: function() {
                        // Show message info
                        // Toast.fire({
                        //     icon: 'info',
                        //     title: 'The system is formatting the course url tag. please wait!'
                        // })
                    },
                    complete: function(data) {
                        // Code to hide spinner.
                        // Show message info
                        // Toast.fire({
                        //     icon: 'success',
                        //     title: 'Formatting of the course tag url was successful. You can modify it as you wish!'
                        // })
                    },
                });
            });
        });

         function getCourseSelectView(el) {
            $.ajax({
                url: "{{ route('courses.select_view') }}",
                method: "post",
                data: {
                    'topic_id': $(el).val(),
                    _token: '{{ csrf_token() }}',
                },
                success: function(result) {
                    // to do with result
                    $('div#category-select-view').replaceWith(result);
                    $('div#category-select-view').find('.select2').select2();
                },
                error: function(error) {
                    // to do with error
                    console.log(error);
                    // Show message error
                    Toast.fire({
                        icon: 'error',
                        title: 'An error occurred while charging the course categories. Please try again!'
                    })
                },
                beforeSend: function() {
                    // Show message info
                    Toast.fire({
                        icon: 'info',
                        title: 'The system is charging the course categories. please wait!'
                    })
                },
                complete: function(data) {
                    // Code to hide spinner.
                    // Show message info
                    Toast.fire({
                        icon: 'success',
                        title: 'Charging of the course categories was successful. You can continue your opération!'
                    })
                },
            });
        }

        function formatCourseDuration(el) {
            // Retrive element id
            var el_id = $(el).attr('id');
            var duration = "";
            if(el_id == 'duration_number') {
                $('select#duration_type').val("");
            }
            if(el_id == 'duration_type' && !$("select#duration_number").val()) {
                $('select#duration_type').val("");
                Toast.fire({
                    icon: 'warning',
                    title: 'Please select the number of duration before continue!'
                })
            }

            if($('select#duration_type').val() && $('select#duration_number').val()){
                duration = $('select#duration_number').val() + ' ' + $('select#duration_type').val();
                duration += parseInt($('select#duration_number').val()) > 1 ? 's' : '';
            }

            if(duration)
                $('input#duration_en').val(duration);
            else
                $('input#duration_en').val('');

        }

        function showEditField() {
            $('.card-tile-edit-icon').on('click', function(event){
                // Prevent propagation of click event twice
                event.stopImmediatePropagation();
                // Case of form
                let el = $(this).closest( "form.field-to-show-parent" );
                // Case of card
                if(!el.length) {
                    el = $(this).closest( "div.card" );
                    el.removeClass('collapsed-card');
                    el.find('.card-body').css('display', 'block');
                }
                // Add button
                let add_btn = $('#'+el.data('addBtn'));
                // Add new form
                let add_new_form = $('#'+el.data('addNewForm'));
                // Show or hide fields
                let el_to_show = el.find(".fields-to-show").first()
                if(el_to_show.hasClass( "d-none" )){
                    el_to_show.removeClass('d-none');
                    add_btn.addClass('d-none');
                    add_new_form.addClass('d-none');
                } else {
                    el_to_show.addClass('d-none');
                    add_btn.removeClass('d-none');
                    add_new_form.addClass('d-none');
                }

            });
        }
    </script>

    @include('back.pages.courses.goals._create-form-list-js')

    @include('back.pages.courses.targeted-audiences._create-form-list-js')

    @include('back.pages.courses.included-materials._create-form-list-js')

    @include('back.pages.courses.pre-requisites._create-form-list-js')

    @include('back.pages.courses.modules._create-form-list-js')

    @include('back.pages.courses.lessons._create-form-list-js')
@endsection

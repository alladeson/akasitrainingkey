@extends('back.layouts.global')

@section('title', 'Course Lessons')

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

@section('main-content')
    <div class="container-fluid">
        <!-- Create course form -->
        <form action="@if(isset($lesson) && $lesson->id){{route('courses.lessons.update', ['id'=>$lesson->id])}}@else{{route('courses.lessons.store')}}@endif" method="post" id="about-course-form">
            @csrf
            @isset($lesson)@method('patch')@endisset
            <!-- Create course card -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Course Lessons</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="id" id="id" value="@isset($lesson){{ $lesson->id }}@endisset">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Course</label>
                                <select class="form-control select2" style="width: 100%;" name="course_id"
                                    id="course_id" onchange="hideValidatonMessage(this);getModuleSelectView(this);">
                                    <option value="">select a course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}"
                                            @if ( (isset($module) && $course->id == $module->course_id) || $course->id == old('course_id') || (session('course') && (session('course')->id == $course->id))) @selected(true) @endif>
                                            {{ $course->name_en }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('course_id')" class="text-danger" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="module-select-view">
                                <label>Module</label>
                                <select class="form-control select2" style="width: 100%;" name="module_id"
                                    id="module_id" onchange="hideValidatonMessage(this);">
                                    <option value="">select a module</option>
                                    @foreach ($modules as $module)
                                        <option value="{{ $module->id }}"
                                            @if ( (isset($lesson) && $module->id == $lesson->module_id) || $module->id == old('module_id') || (session('module') && (session('module')->id == $module->id))) @selected(true) @endif>
                                            {{ $module->title_en }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('module_id')" class="text-danger" />
                            </div>
                        </div>
                    </div>
                    <!--/.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title_en">Title In English</label>
                                <input type="text"
                                    value="@if(isset($lesson)){{ old('title_en', $lesson->title_en) }}@else{{ old('title_en') }}@endif"
                                    class="form-control form-control-border" name="title_en" id="title_en"
                                    placeholder="enter lesson title in English">
                                    <x-input-error :messages="$errors->get('title_en')" class="text-danger" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title_fr">Title In French</label>
                                <input type="text"
                                    value="@if(isset($lesson)){{ old('title_fr', $lesson->title_fr) }}@else{{ old('title_fr') }}@endif"
                                    class="form-control form-control-border" name="title_fr" id="title_fr"
                                    placeholder="enter lesson title in French">
                                    <x-input-error :messages="$errors->get('title_fr')" class="text-danger" />
                            </div>
                        </div>
                    </div>
                    <!--/.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer" style="display: flex; flex-direction: row; justify-content: flex-end;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </form>
        <!-- /.form -->
        <!-- Course lessons card -->
        <div class="card card-default">
        </div>
        <!-- /.Course lessons card -->
    </div>
    <!-- /.container-fluid -->
@endsection

@section('third_party_scripts')
    <script>
        $(document).ready(function() {

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

        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            $('#about-course-form').validate({
                rules: {
                    course_id: {
                        required: true
                    },
                    module_id: {
                        required: true
                    },
                    title_en: {
                        required: true
                    },
                    title_fr: {
                        required: true
                    },
                },
                messages: {
                    course_id: {
                        required: "Please select a course to continue",
                    },
                    module_id: {
                        required: "Please select a module to continue",
                    },
                    title_en: {
                        required: "Please enter the course lesson title in English",
                    },
                    title_fr: {
                        required: "Please enter the course lesson title in French",
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
        });

        function getModuleSelectView(el) {
            $.ajax({
                url: "{{ route('courses.modules.select_view') }}",
                method: "post",
                data: {
                    'course_id': $(el).val(),
                    _token: '{{ csrf_token() }}',
                },
                success: function(result) {
                    // to do with result
                    $('div#module-select-view').replaceWith(result);
                    $('div#module-select-view').find('.select2').select2();
                },
                error: function(error) {
                    // to do with error
                    console.log(error);
                    // Show message error
                    Toast.fire({
                        icon: 'error',
                        title: 'An error occurred while charging the course modules. Please try again!'
                    })
                },
                beforeSend: function() {
                    // Show message info
                    Toast.fire({
                        icon: 'info',
                        title: 'The system is charging the course modules. please wait!'
                    })
                },
                complete: function(data) {
                    // Code to hide spinner.
                    // Show message info
                    Toast.fire({
                        icon: 'success',
                        title: 'Charging of the course modules was successful. You can continue your opération!'
                    })
                },
            });
        }
    </script>
@endsection

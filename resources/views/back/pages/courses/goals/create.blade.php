@extends('back.layouts.global')

@section('title', 'Course Goals')

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
        <form action="@if(isset($goal) && $goal->id){{route('courses.goals.update', ['id'=>$goal->id])}}@else{{route('courses.goals.store')}}@endif" method="post" id="about-course-form">
            @csrf
            @isset($goal)@method('patch')@endisset
            <!-- Create course card -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Course Goals</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="id" id="id" value="@isset($goal){{ $goal->id }}@endisset">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Course</label>
                                <select class="form-control select2" style="width: 100%;" name="course_id"
                                    id="course_id" onchange="hideValidatonMessage(this);">
                                    <option value="">select a course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}"
                                            @if ( (isset($goal) && $course->id == $goal->course_id) || $course->id == old('course_id') || (session('course') && (session('course')->id == $course->id))) @selected(true) @endif>
                                            {{ $course->name_en }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('course_id')" class="text-danger" />
                            </div>
                        </div>
                    </div>
                    <!--/.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description_en">Description In English</label>
                                <input type="text"
                                    value="@if(isset($goal)){{ old('description_en', $goal->description_en) }}@else{{ old('description_en') }}@endif"
                                    class="form-control form-control-border" name="description_en" id="description_en"
                                    placeholder="enter goal description in English">
                                    <x-input-error :messages="$errors->get('description_en')" class="text-danger" />
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="description_fr">Description In French</label>
                                <input type="text"
                                    value="@if(isset($goal)){{ old('description_fr', $goal->description_fr) }}@else{{ old('description_fr') }}@endif"
                                    class="form-control form-control-border" name="description_fr" id="description_fr"
                                    placeholder="enter goal description in French">
                                    <x-input-error :messages="$errors->get('description_fr')" class="text-danger" />
                            </div>
                        </div> --}}
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
        <!-- Course goals card -->
        <div class="card card-default">
        </div>
        <!-- /.Course goals card -->
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
                    description_en: {
                        required: true
                    },
                    description_fr: {
                        required: false
                    },
                },
                messages: {
                    course_id: {
                        required: "Please select a course to continue",
                    },
                    description_en: {
                        required: "Please enter the course goal description in English",
                    },
                    description_fr: {
                        required: "Please enter the course goal description in French",
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
    </script>
@endsection

@extends('back.layouts.global')

@section('title', 'Schedule')

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
        <!-- Create schedule form -->
        <form action="@if(isset($schedule) && $schedule->id){{route('schedules.update', ['id'=>$schedule->id])}}@else{{route('schedules.store')}}@endif" method="post" id="about-schedule-form">
            @csrf
            @isset($schedule)@method('patch')@endisset
            <!-- Create schedule card -->
            <div class="card card-primary">
                <div class="card-header" data-card-widget="collapse" style="cursor: pointer; display: flex;flex-direction: row;justify-content: center;">
                    <h1 class="card-title" style="font-size: 20px;">{{ $page_title }}</h1>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="id" id="id" value="@isset($schedule){{ $schedule->id }}@endisset">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Course<span class="text-danger">*</span></label>
                                    <select class="form-control select2" style="width: 100%;" name="course_id"
                                        id="course_id" onchange="hideValidatonMessage(this);">
                                        <option value="">select a course</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}"
                                                @if ( (isset($schedule) && $course->id == $schedule->course_id) || $course->id == old('course_id') || (session('schedule') && (session('schedule')->course_id == $course->id))) @selected(true) @endif>
                                                {{ $course->name_en }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('course_id')" class="text-danger" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="duration_en">Course Duration</label>
                                    <input type="text" value=""
                                        pattern="^[0-9]+\s+(hour|day)s?$" class="form-control"
                                        name="duration_en" id="duration_en" placeholder="select a course to display it duration" readonly>
                                    <x-input-error :messages="$errors->get('duration_en')" class="text-danger" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="location_en">Location<span class="text-danger">*</span></label>
                                    <select class="form-control select2" style="width: 100%;" name="location_en"
                                        id="location_en" onchange="hideValidatonMessage(this);" required>
                                        <option value="">select a location</option>
                                        @foreach ($locations as $location)
                                            <option
                                                @if ( (isset($schedule) && $location->name == $schedule->location_en) || $location->name == old('location_en') || (session('schedule') && (session('schedule')->name == $location->name))) @selected(true) @endif>
                                                {{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('location_en')" class="text-danger" />
                                </div>
                            </div>
                        </div>
                        <!--/.row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Started Date<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="date" pattern="\d{4}-\d{2}-\d{2}" min="2023-11-30" name="started_date" id="started_date"
                                        value="@if(isset($schedule)){{ old('started_date', $schedule->started_date) }}@else{{ old('started_date') }}@endif"
                                        class="form-control"/>
                                    </div>
                                    <x-input-error :messages="$errors->get('started_date')" class="text-danger" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End Date<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="date" min="2023-11-30" pattern="\d{4}-\d{2}-\d{2}" name="end_date" id="end_date"
                                        value="@if(isset($schedule)){{ old('end_date', $schedule->end_date) }}@else{{ old('end_date') }}@endif"
                                        class="form-control" readonly />
                                    </div>
                                    <x-input-error :messages="$errors->get('end_date')" class="text-danger" />
                                </div>
                            </div>
                        </div>
                        <!--/.row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Started Time<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="time" name="started_time" id="started_time" step="1"
                                        value="@if(isset($schedule)){{ old('started_time', $schedule->started_time) }}@else{{ old('started_time') }}@endif"
                                        class="form-control"/>
                                    </div>
                                    <x-input-error :messages="$errors->get('started_time')" class="text-danger" />
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End Time<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="time" name="end_time" id="end_time" step="1"
                                        value="@if(isset($schedule)){{ old('end_time', $schedule->end_time) }}@else{{ old('end_time') }}@endif"
                                        class="form-control"/>
                                    </div>
                                    <x-input-error :messages="$errors->get('end_time')" class="text-danger" />
                                </div>
                            </div>
                        </div>
                        <!--/.row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description_en">Description (About Schedule)</code></label>
                                    <textarea class="form-control" name="description_en" id="description_en" rows="5"
                                        placeholder="Enter description about schedule">@if(isset($schedule)){{ old('description_en', $schedule->description_en) }}@else{{ old('description_en') }}@endif</textarea>
                                    <x-input-error :messages="$errors->get('description_en')" class="text-danger" />
                                </div>
                            </div>
                        </div>
                        <!--/.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer" style="display: flex; flex-direction: row; justify-content: flex-end;">
                    <button type="submit" class="btn btn-primary">@if (isset($schedule)) Edit Schedule @else Create Schedule @endif</button>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </form>
        <!-- /.form -->
        <!-- Schedule metadata -->
            <!-- Schedule goals card -->
            <div class="card card-default">
            </div>
            <!-- /.Schedule goals card -->
        <!-- /.Schedule metadat -->
    </div>
    <!-- /.container-fluid -->
@endsection

@php ($course_id = 0)
@isset($schedule)
    @php ($course_id = $schedule->course_id)
@endisset

@section('third_party_scripts')
    <script>
        let course = {};

        $(document).ready(function() {
            // Retrieve course by id in case of schedule edition
            if({{$course_id}})
                getCourseDetails({{$course_id}});

            //Date set minimum
             $('#started_date, #end_date').attr('min', ((new Date()).toISOString()).slice(0, 10))
             // Retrieve selected course
             $('#course_id').on('change', function() {
                // Retrieve course id
                var course_id = $(this).val();
                // Reset input
                $('#started_date, #end_date, #started_time, #end_time').val('')
                //
                if(course_id) {
                    getCourseDetails(course_id);
                } else {
                    course = {};
                    $('#duration_en').val('');
                }
             });
             // Set end date according to the duration of course
            $('#started_date').on('change', function() {
               if(!$('#course_id').val() || !course) {
                    // Show message error
                    Toast.fire({
                        icon: 'error',
                        title: 'Please select a course to continue!'
                    });
                    $(this).val('');
               }else {
                    if(course.duration_type == 'hour' || (course.duration_type == 'day' && course.duration_number == 1)) {
                        $('#end_date').val($(this).val());
                        // $('#end_time').attr('readonly', 'readonly');
                        // Set end time
                        // $('#started_time').on('change', function() {
                        //     setTime($(this).val(), course.duration_number);
                        // });
                    } else if(course.duration_type == 'day') {
                        // $('#end_time').removeAttr('readonly');
                        // Formatting of end_date
                        // started_date is included in the duration : "course.duration_number - 1"
                        var end_date = addDays(new Date($(this).val()), course.duration_number - 1);
                        // End_date to string
                        var to_string = (end_date.toISOString()).slice(0, 10);
                        $('#end_date').val(to_string);
                    }
               }
            });

        });

        function addDays(date, days) {
            const dateCopy = new Date(date);
            dateCopy.setDate(date.getDate() + days);
            return dateCopy;
        }

        // function setTime(started_time, duration_number) {
        //     console.log(started_time);
        //     console.log(started_time.slice(0, 2));
        //     console.log(started_time.slice(2, 8));
        // }

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

            $('#about-schedule-form').validate({
                rules: {
                    course_id: {
                        required: true,
                    },
                    location_en: {
                        required: true,
                    },
                    started_date: {
                        required: true
                    },
                    end_date: {
                        required: true
                    },
                    started_time: {
                        required: true
                    },
                    end_time: {
                        required: true
                    },
                },
                messages: {
                    course_id: {
                        required: "Please select a course",
                    },
                    location_en: {
                        required: "Please enter the schedule location in English",
                    },
                    started_date: {
                        required: "Please enter the schedule started date",
                    },
                    end_date: {
                        required: "Please enter the schedule end date",
                    },
                    started_time: {
                        required: "Please enter the schedule started time",
                    },
                    end_date: {
                        required: "Please enter the schedule end time",
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

        function getCourseDetails(course_id){
            // Retrieve url for ajax request
            let url = "{{route('courses.show', ['id' => 'id'])}}";
            // Ajax request
            $.ajax({
                type: 'GET',
                url: url.replace('id', course_id),
                success: function (result) {
                    course = result;
                    $('#duration_en').val(course.duration_en);
                },
                error: function(error) {
                    // to do with error
                    console.log(error);
                    // Show message error
                    Toast.fire({
                        icon: 'error',
                        title: 'An error occurred while retrieving the course. Please try again!'
                    });
                },
            });
        }
    </script>
@endsection

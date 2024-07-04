<div class="single-item mb-30">
    <div class="container p-0">
        <div class="row">
            <div class="col-12 col-md-9 col-lg-9">
                <div class="">
                    <h4 class="course-title"><a href="{{ route('course', ['url_tag' => $schedule->url_tag]) }}">{{$schedule->course_name_en}}</a></h4>
                    <div class="event-detalis d-flex align-items-center">
                        <div class="event-time mr-10 d-flex align-items-center">
                            <i class="flaticon-calendar schedule-icon"></i> <small><strong class="primary-color">
                                @if ($schedule->started_date != $schedule->end_date)
                                    {{ date('M d, Y', strtotime("$schedule->started_date")) }} - {{ date('M d, Y', strtotime("$schedule->end_date")) }}
                                @else
                                    {{ date('M d, Y', strtotime("$schedule->started_date")) }}
                                @endif
                            </strong></small>
                        </div>
                        <div class="event-time mr-10 d-flex align-items-center">
                            <i class="flaticon-clock-1 schedule-icon"></i>
                            <small>
                                {{ date('h:i A', strtotime("$schedule->started_time")) }} - {{ date('h:i A e', strtotime("$schedule->end_time")) }}
                            </small>
                        </div>
                        <div class="event-location d-flex align-items-centere">
                            <i class="flaticon-pin schedule-icon"></i><small>{{$schedule->location_en}} or</small>
                            <small class="badge bg-light text-dark mx-2">{{__("schedule.key4") }}</small>
                        </div>
                    </div>
                    <div>
                        <p class="text-break fs-6">{{$schedule->description_en ? $schedule->description_en : substr($schedule->course_description_en, 0, 130) . "..."}}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3 d-flex align-content-center justify-content-center p-0 m-0">
                <div class="d-flex flex-column align-content-center justify-content-center">
                    <h4 class="text-center course-price">{{format_amount($schedule->price_euro)}}</h4>
                    <a class="edu-btn schedule-get-btn cart-toggle-btn text-center" href="javascript:void(0);" data-schedule-id="{{$schedule->id}}">{{__("schedule.key5") }}</a>
                </div>
            </div>
        </div>
    </div>

</div>

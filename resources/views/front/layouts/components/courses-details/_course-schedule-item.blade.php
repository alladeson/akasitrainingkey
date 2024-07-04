<li class="border-0">
    <div class="container m-0 p-0">
        <div class="row m-0 p-0">
            <div class="col-xl-12 col-lg-12 col-12 m-0 p-0">
                <div class="current-event-box">
                    <div class="current-event-date d-flex position-relative">
                        <div class="event-tour m-0 p-1 d-flex justify-content-between secondary-color">
                            <div class="event-box-text">
                                <div class="mt-1">
                                    <i class="flaticon-calendar course-title"></i>
                                    <strong class="primary-color">
                                        @if ($schedule->started_date != $schedule->end_date)
                                            {{ date('M d, Y', strtotime("$schedule->started_date")) }} - {{ date('M d, Y', strtotime("$schedule->end_date")) }}
                                        @else
                                            {{ date('M d, Y', strtotime("$schedule->started_date")) }}
                                        @endif
                                    </strong>
                                </div>
                                <div class="mt-1">
                                    <span>
                                        <i class="fal fa-clock"></i>
                                        {{ date('h:i A', strtotime("$schedule->started_time")) }} - {{ date('h:i A e', strtotime("$schedule->end_time")) }}
                                    </span>
                                </div>
                                <div class="mt-1">
                                    <span><i class="flaticon-place"></i>{{$schedule->location_en}}</span> or
                                    <span class="badge bg-light text-dark">Virtual</span>
                                </div>
                            </div>
                            <div class="cart-wrapper">
                                <a class="edu-btn schedule-get-btn cart-toggle-btn text-center" href="javascript:void(0);" data-schedule-id="{{$schedule->id}}">RESERVE
                                    SEAT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>

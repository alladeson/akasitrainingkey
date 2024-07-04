<ul class="mx-5 secondary-color">
    <li class="border-0">• {{ $course->duration_en }} {{__("course_details.key18") }}</li>
    <li class="border-0">• {{__("course_details.key19") }} @if ($course->after_course) {{__("course_details.key191") }} @else {{__("course_details.key190") }} @endif</li>
</ul>
<br>
{{-- <div class="col-12 d-flex  justify-content-end">
    <div class="courses-date__item-time">
        <span>#{{$course->code}}</span>
    </div>
</div> --}}
<ul>
    @forelse ($schedules as $schedule)
        @include('front.layouts.components.courses-details._course-schedule-item')
    @empty
        <li style="list-style: none">• {{__("course_details.key21") }}</li>
    @endforelse
</ul>

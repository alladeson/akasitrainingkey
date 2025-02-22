<div class="academic-box mb-30">
    <div class="academic-content">
        <div class="academic-content-header">
            <a href="{{route('course', ['url_tag' => $course->url_tag])}}" class="">
                <h3 class="course-title">{{$course->name_en}}</h3>
            </a>
        </div>
        <div class="academic-body">
            <p>{{substr($course->description_en, 0, 180) . "..."}}</p>
        </div>
        <div class="academic-footer">
            <div class="coursee-clock">
                <svg width="14" height="14" class="course-title" x="0" y="0" viewBox="0 0 533.886 533.886" aria-hidden="true" role="img"><use href="{{asset_own('front/img/customized/courses/icon-sprite.svg#intermediate')}}"></use></svg>
                {{-- <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="14" height="14" x="0" y="0" viewBox="0 0 533.886 533.886" xml:space="preserve" class="hovered-paths"><g><path d="M266.942 337.361c-24.213.001-48.418-5.919-70.49-17.757l-159.156-85.37C14.217 221.856-.071 197.918.004 171.763c.076-26.155 14.503-50.009 37.653-62.255l159.557-84.397a149.014 149.014 0 0 1 139.456 0l159.557 84.397c23.15 12.245 37.577 36.099 37.653 62.255.075 26.155-14.213 50.093-37.291 62.471l-159.158 85.37c-22.065 11.838-46.281 17.755-70.489 17.757zm0-287.857a107.349 107.349 0 0 0-50.226 12.477L57.161 146.379c-9.64 5.099-15.415 14.635-15.446 25.506s5.687 20.44 15.298 25.595l159.157 85.369c31.795 17.054 69.755 17.054 101.549 0l159.158-85.369c9.611-5.155 15.329-14.723 15.298-25.595s-5.806-20.407-15.446-25.506L317.168 61.981a107.36 107.36 0 0 0-50.226-12.477zm-59.976-5.958h.01zm130.466 464.792 185.452-99.47c10.15-5.444 13.965-18.086 8.521-28.235-5.444-10.15-18.085-13.965-28.235-8.521l-185.453 99.47c-31.792 17.054-69.753 17.054-101.629-.043L30.636 373.112c-10.176-5.4-22.799-1.529-28.197 8.644-5.4 10.174-1.53 22.797 8.644 28.197l185.37 98.384c22.072 11.839 46.277 17.757 70.49 17.757 24.207.001 48.423-5.919 70.489-17.756zm0-93.845 185.452-99.47c10.15-5.444 13.965-18.086 8.521-28.235-5.444-10.151-18.085-13.964-28.235-8.521l-185.453 99.47c-31.792 17.055-69.753 17.053-101.629-.043L30.636 279.267c-10.176-5.4-22.799-1.529-28.197 8.644-5.4 10.174-1.53 22.797 8.644 28.197l185.37 98.384c22.072 11.839 46.277 17.757 70.49 17.757 24.207 0 48.423-5.919 70.489-17.756z" fill="#1e73be" data-original="#1e73be" class="hovered-path"></path></g></svg> --}}
                <span class="course-title course-level">{{$course->level_en}}</span>
            </div>
            <div class="coursee-clock">
                <i class="flaticon-calendar course-title"></i><span>{{$course->duration_en}}</span>
            </div>
            <div class="coursee-clock">
                <i class="flaticon-online-course-2 course-title"></i><span>{{$course->learning_mode_en}}</span>
            </div>
            <a class=""><small>{{__("catalog.keyStarts") }}</small><strong class="course-price"> {{ format_amount($course->price_euro) }}</strong></a>
        </div>
    </div>
</div>

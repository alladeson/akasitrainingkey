<div class="course-sidebar-widget mb-0 border-0">
    <div class="">
        <h3 class="drop-btn">{{__("catalog.key12") }}</h3>
    </div>
</div>
@foreach ($training_topics as $training)
    <div class="course-sidebar-widget mb-20">
        <div class="course-sidebar-info content-hidden">
            <h3 class="drop-btn">{{ $training->name_en }}</h3>
            <ul>
                @foreach (get_categories_of_training_topic($training->id) as $category)
                    <li>
                        <div class="course-sidebar-list">
                            <label class="edu-check-label"
                                for="category-{{ $category->id }}" data-text="{{ $category->name_en }}">
                                <input class="edu-check-box category" type="checkbox" id="category-{{ $category->id }}"
                                value="{{ $category->id }}" data-type="category">
                                {{ $category->name_en }}
                            </label>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endforeach

<div class="course-sidebar-widget mb-20">
    <div class="course-sidebar-info content-hidden">
        <h3 class="drop-btn">{{__("catalog.key13") }}</h3>
        <ul>
            @foreach ($certifications as $certification)
                <li>
                    <div class="course-sidebar-list">
                        <label class="edu-check-label"
                            for="certification-{{ $certification->id }}" data-text="{{ $certification->name_en }}">
                            <input class="edu-check-box category" type="checkbox" id="certification-{{ $certification->id }}"
                            value="{{ $certification->id }}" data-type="certification">
                            {{ $certification->name_en }}
                        </label>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="course-sidebar-widget mb-20">
    <div class="course-sidebar-info content-hidden  ">
        <h3 class="drop-btn">{{__("catalog.key14") }}</h3>
        <ul>
            @foreach ($vendors as $vendor)
                <li>
                    <div class="course-sidebar-list">
                        <label class="edu-check-label"
                            for="vendor-{{ $vendor->id }}" data-text="{{ $vendor->name_en }}">
                            <input class="edu-check-box category" type="checkbox" id="vendor-{{ $vendor->id }}"
                                value="{{ $vendor->id }}" data-type="vendor">
                            {{ $vendor->name_en }}
                        </label>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- Level -->
<div class="course-sidebar-widget mb-20">
    <div class="course-sidebar-info content-hidden">
        <h3 class="drop-btn">{{__("catalog.key15") }}</h3>
        <ul>
            <li>
                <div class="course-sidebar-list">
                    <label class="edu-check-label" for="e-lave" data-text="{{__("catalog.key16") }}">
                        <input class="edu-check-box category" type="checkbox" id="e-lave" value="All" data-type="level">
                        {{__("catalog.key16") }}
                    </label>
                </div>
            </li>
            <li>
                <div class="course-sidebar-list">
                    <label class="edu-check-label" for="e-beg" data-text="{{__("catalog.key17") }}">
                        <input class="edu-check-box category" type="checkbox" id="e-beg" value="Beginner" data-type="level">
                        {{__("catalog.key17") }}
                    </label>
                </div>
            </li>
            <li>
                <div class="course-sidebar-list">
                    <label class="edu-check-label" for="e-inter" data-text="{{__("catalog.key18") }}">
                        <input class="edu-check-box category" type="checkbox" id="e-inter" value="Intermediate" data-type="level">
                        {{__("catalog.key18") }}
                    </label>
                </div>
            </li>
            <li>
                <div class="course-sidebar-list">
                    <label class="edu-check-label" for="e-exp" data-text="{{__("catalog.key19") }}">
                        <input class="edu-check-box category" type="checkbox" id="e-exp" value="Expert" data-type="level">
                        {{__("catalog.key19") }}
                    </label>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- Duration -->
<div class="course-sidebar-widget mb-20">
    <div class="course-sidebar-info content-hidden">
        <h3 class="drop-btn">{{__("catalog.key24") }}</h3>
        <ul>
            <li>
                <div class="course-sidebar-list">
                    <label class="edu-check-label" for="e-less" data-text="{{__("catalog.key25") }}">
                        <input class="edu-check-box category" type="checkbox" id="e-less" value="hours" data-type="duration">
                        {{__("catalog.key25") }}
                    </label>
                </div>
            </li>
            <li>
                <div class="course-sidebar-list">
                    <label class="edu-check-label" for="e-36" data-text="{{__("catalog.key26") }}">
                        <input class="edu-check-box category" type="checkbox" id="e-36" value="1 day" data-type="duration">
                        {{__("catalog.key26") }}
                    </label>
                </div>
            </li>
            <li>
                <div class="course-sidebar-list">
                    <label class="edu-check-label" for="m-25" data-text="{{__("catalog.key27") }}">
                        <input class="edu-check-box category" type="checkbox" id="m-25" value="2 days" data-type="duration">
                        {{__("catalog.key27") }}
                    </label>
                </div>
            </li>
            <li>
                <div class="course-sidebar-list">
                    <label class="edu-check-label" for="m-32" data-text="{{__("catalog.key28") }}">
                        <input class="edu-check-box category" type="checkbox" id="m-32" value="3 days" data-type="duration">
                        {{__("catalog.key28") }}
                    </label>
                </div>
            </li>
            <li>
                <div class="course-sidebar-list">
                    <label class="edu-check-label" for="m-29" data-text="{{__("catalog.key29") }}">
                        <input class="edu-check-box category" type="checkbox" id="m-29" value="4 days" data-type="duration">
                        {{__("catalog.key29") }}
                    </label>
                </div>
            </li>
            <li>
                <div class="course-sidebar-list">
                    <label class="edu-check-label" for="m-30" data-text="{{__("catalog.key30") }}">
                        <input class="edu-check-box category" type="checkbox" id="m-30" value="5 days" data-type="duration">
                        {{__("catalog.key30") }}
                    </label>
                </div>
            </li>
            <li>
                <div class="course-sidebar-list">
                    <label class="edu-check-label" for="m-31" data-text="{{__("catalog.key31") }}">
                        <input class="edu-check-box category" type="checkbox" id="m-31" value="weeks" data-type="duration">
                        {{__("catalog.key31") }}
                    </label>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- Learning Mode -->
<div class="course-sidebar-widget mb-20">
    <div class="course-sidebar-info content-hidden">
        <h3 class="drop-btn">{{__("Learning Mode") }}</h3>
        <ul>
            <li>
                <div class="course-sidebar-list">
                    <label class="edu-check-label" for="in-class" data-text="{{__("In-Class") }}">
                        <input class="edu-check-box category" type="checkbox" id="in-class" value="In-Class" data-type="learning-mode">
                        {{__("In-Class") }}
                    </label>
                </div>
            </li>
            <li>
                <div class="course-sidebar-list">
                    <label class="edu-check-label" for="online" data-text="{{__("Online") }}">
                        <input class="edu-check-box category" type="checkbox" id="online" value="Online" data-type="learning-mode">
                        {{__("Online") }}
                    </label>
                </div>
            </li>
            <li>
                <div class="course-sidebar-list">
                    <label class="edu-check-label" for="in-class-online" data-text="{{__("In-Class or Online") }}">
                        <input class="edu-check-box category" type="checkbox" id="in-class-online" value="In-Class or Online" data-type="learning-mode">
                        {{__("In-Class or Online") }}
                    </label>
                </div>
            </li>
            <li>
                <div class="course-sidebar-list">
                    <label class="edu-check-label" for="webinar" data-text="{{__("Webinar") }}">
                        <input class="edu-check-box category" type="checkbox" id="webinar" value="Webinar" data-type="learning-mode">
                        {{__("Webinar") }}
                    </label>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- Price -->
<div class="course-sidebar-widget mb-20">
    <div class="course-sidebar-info content-hidden">
        <h3 class="drop-btn">{{__("catalog.key20") }}</h3>
        <ul>
            <li>
                <div class="course-sidebar-list">
                    <label class="edu-check-label" for="e-85" data-text="{{__("catalog.key21") }}">
                        <input class="edu-check-box category" type="radio" id="e-85" name="price" value="All" data-type="price">
                        {{__("catalog.key21") }}
                    </label>
                </div>
            </li>
            <li>
                <div class="course-sidebar-list">
                    <label class="edu-check-label" for="e-all" data-text="{{__("catalog.key22") }}">
                        <input class="edu-check-box category" type="radio" id="e-all" name="price" value="Free" data-type="price">
                        {{__("catalog.key22") }}
                    </label>
                </div>
            </li>
            <li>
                <div class="course-sidebar-list">
                    <label class="edu-check-label" for="f-all" data-text="{{__("catalog.key23") }}">
                        <input class="edu-check-box category" type="radio" id="f-all" name="price" value="Paid" data-type="price">
                        {{__("catalog.key23") }}
                    </label>
                </div>
            </li>
        </ul>
    </div>
</div>

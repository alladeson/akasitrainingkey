@if (count($items_data) > 0)
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            @foreach ($items_data as $course)
                @include('front.layouts.components.catalog._item')
            @endforeach
        </div>
    </div>
@else
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="content-error-item text-center">
                <div class="error-thumb">
                    <img src="{{ asset_own('front/img/bg/error-thumb.png') }}" alt="image not found">
                </div>
                <div class="section-title">
                    <h2 class="mb-20">Oops! Nothing to show.</h2>
                </div>
            </div>
        </div>
    </div>
@endif

<form action="#" class="d-none">
    <input type="number" name="number-displayed" id="number-displayed" value="{{count($items_data)}}">
    <input type="number" name="total-number" id="total-number" value="{{count($items_data)}}">
</form>

{{-- <div class="row">
    <div class="edu-pagination mt-30 mb-20">
        <ul>
            <li><a href="javascript:void(0);" onclick="getCourses(1)"><i class="fal fa-angle-left"></i></a></li>
            <li class="active"><a><span>01</span></a></li>
            <li><a href="javascript:void(0);"><span>02</span></a></li>
            <li><a href="javascript:void(0);" onclick="getCourses(2)"><i class="fal fa-angle-right"></i></a></li>
        </ul>
    </div>
</div> --}}

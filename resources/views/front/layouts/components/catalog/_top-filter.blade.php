<div class="row mb-50 " style="margin-top: -50px;">
    <div class="col-md-3 item-total-number-showing">
        <h3 class="courses-number">{{count($items_data)}} courses</h3>
    </div>
    <div class="col-md-6">
        <div class="row filter-item-wrapper">

        </div>
    </div>
    <div class="col-md-3 text-end">
        <div class="couse-dropdown">
            <div class="course-drop-inner">
                <select onchange="setFilterStatus(event, this);">
                    <option value="popularity">{{ __('catalog.key8') }}</option>
                    <option value="highest_price">{{ __('catalog.key9') }}</option>
                    <option value="lowest_price">{{ __('catalog.key10') }}</option>
                    <option value="new">{{ __('catalog.key11') }}</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="course-main-wrapper mb-30">
    <div class="bar-filter">
        <i class="flaticon-filter"></i>
        <span>{{ __('catalog.key4') }}</span>
        <span id="filter-counter">(0)</span>
    </div>
    <div class="corse-bar-wrapper">
        <div class="bar-search">
            <form action="#" onsubmit="getCourses(event)">
                <div class="bar-secrch-icon position-relative">
                    <input type="text" name="search" id="search" value="{{ $search }}"
                        placeholder="{{ __('catalog.keySearch') }}">
                    <button type="submit"><i class="far fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="course-sidebar-tab">
        <div class="course-sidebar-wrapper">
            <div class="curse-tab-left-wrap">
                <div class="course-results">
                    {{ __('catalog.key5') }} <span class="course-result-showing">{{ count($items_data) }}</span>
                    {{ __('catalog.key6') }} <span class="course-result-number">{{ count($items_data) }}</span>
                    {{ __('catalog.key7') }}
                </div>
            </div>
        </div>
    </div>
</div>

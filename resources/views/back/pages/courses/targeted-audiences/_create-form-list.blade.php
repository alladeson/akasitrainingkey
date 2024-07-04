<div class="course-targeted-audiences-wrapper">

    <div class="row d-flex justify-content-start" style="margin: 20px 0 20px 0;">
        <div class="col-sm-3 col-md-2">
            <a href="javascript:void(0);" class="" onclick="addTargetedAudience(this);" id="targeted-audience-add-new-btn">
                <button type="button" class="btn btn-block btn-info">+ Add Audience</button>
            </a>
        </div>
    </div>
    <form action="{{route('courses.targeted_audiences.store')}}" method="post" onsubmit="targetedAudienceFormSubmit(event, this);" id="targeted-audience-form-add-new" class="d-none">
        @csrf
        <fieldset>
            <h5>New Audience : </h5>
            <div class="row">
                <input type="hidden" name="targeted_audience_id" value="">
                <input type="hidden" name="course_id" value="@isset($course){{ $course->id }}@endisset">
            </div>
            <!--/.row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="description_en">Description</label>
                        <input type="text"
                            class="form-control form-control-border" name="description_en"
                            placeholder="enter audience description" required>
                            <x-input-error :messages="$errors->get('description_en')" class="text-danger" />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Add</label>
                        <div class="" style="display: flex; flex-direction: row; justify-content: flex-left;">
                            <button type="submit" class="btn btn-info">Add Audience</button>
                            <button type="button" class="btn btn-default ml-2" onclick="$('#targeted-audience-form-add-new').addClass('d-none');$('#targeted-audience-add-new-btn').removeClass('d-none');">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.row -->
        </fieldset>
    </form>
    <!-- /.form -->
    @if(isset($course))
        @foreach ($course_data['targeted_audiences'] as $targeted_audience)
            <form action="@if(isset($targeted_audience) && $targeted_audience->id){{route('courses.targeted_audiences.update', ['id'=>$targeted_audience->id])}}@else{{route('courses.targeted_audiences.store')}}@endif" method="post" onsubmit="targetedAudienceFormSubmit(event, this);" class="field-to-show-parent" data-add-btn="targeted-audience-add-new-btn" data-add-new-form="targeted-audience-form-add-new">
                @csrf
                @isset($targeted_audience)@method('patch')@endisset
                <fieldset>
                    <h5 class="my-card-title">Audience {{$loop->iteration}} : {{$targeted_audience->description_en}} <i class="fas fa-pen-square card-tile-edit-icon" style="cursor: pointer;"></i></h5>
                    <div class="row">
                        <input type="hidden" name="targeted_audience_id" value="@isset($targeted_audience){{ $targeted_audience->id }}@endisset">
                        <input type="hidden" name="course_id" value="@isset($course){{ $course->id }}@endisset">
                    </div>
                    <!--/.row -->
                    <div class="row d-none fields-to-show">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="description_en">Description</label>
                                <input type="text"
                                    value="@if(isset($targeted_audience)){{ old('description_en', $targeted_audience->description_en) }}@else{{ old('description_en') }}@endif"
                                    class="form-control form-control-border" name="description_en"
                                    placeholder="enter audience description" required>
                                    <x-input-error :messages="$errors->get('description_en')" class="text-danger" />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Edit</label>
                                <div class="" style="display: flex; flex-direction: row; justify-content: flex-left;">
                                    <button type="submit" class="btn btn-warning">Edit Audience {{$loop->iteration}}</button>
                                    <button type="button" class="btn btn-danger ml-1" title="delete audience" data-item-id="{{$targeted_audience->id}}" onclick="deleteTargetedAudience(this)"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.row -->
                </fieldset>
            </form>
        @endforeach
    @endif
</div>

<div class="course-pre-requisites-wrapper">

    <div class="row d-flex justify-content-start" style="margin: 20px 0 20px 0;">
        <div class="col-sm-3 col-md-3">
            <a href="javascript:void(0);" class="" onclick="addPreRequisite(this);" id="pre-requisite-add-new-btn">
                <button type="button" class="btn btn-block btn-info">+ Add Pre-requisite</button>
            </a>
        </div>
    </div>
    <form action="{{route('courses.pre_requisites.store')}}" method="post" onsubmit="preRequisiteFormSubmit(event, this);" id="pre-requisite-form-add-new" class="d-none">
        @csrf
        <fieldset>
            <h5>New Pre-Requisite : </h5>
            <div class="row">
                <input type="hidden" name="pre_requisite_id" value="">
                <input type="hidden" name="course_id" value="@isset($course){{ $course->id }}@endisset">
            </div>
            <!--/.row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="description_en">Description</label>
                        <input type="text"
                            class="form-control form-control-border" name="description_en"
                            placeholder="enter pre-requisite description" required>
                            <x-input-error :messages="$errors->get('description_en')" class="text-danger" />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Add</label>
                        <div class="" style="display: flex; flex-direction: row; justify-content: flex-left;">
                            <button type="submit" class="btn btn-info">Add Pre-Requisite</button>
                            <button type="button" class="btn btn-default ml-2" onclick="$('#pre-requisite-form-add-new').addClass('d-none');$('#pre-requisite-add-new-btn').removeClass('d-none');">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.row -->
        </fieldset>
    </form>
    <!-- /.form -->
    @if(isset($course))
        @foreach ($course_data['pre_requisites'] as $pre_requisite)
            <form action="@if(isset($pre_requisite) && $pre_requisite->id){{route('courses.pre_requisites.update', ['id'=>$pre_requisite->id])}}@else{{route('courses.pre_requisites.store')}}@endif" method="post" onsubmit="preRequisiteFormSubmit(event, this);" class="field-to-show-parent" data-add-btn="pre-requisite-add-new-btn" data-add-new-form="pre-requisite-form-add-new">
                @csrf
                @isset($pre_requisite)@method('patch')@endisset
                <fieldset>
                    <h5 class="my-card-title">Pre-Requisite {{$loop->iteration}} : {{$pre_requisite->description_en}} <i class="fas fa-pen-square card-tile-edit-icon" style="cursor: pointer;"></i></h5>
                    <div class="row">
                        <input type="hidden" name="pre_requisite_id" value="@isset($pre_requisite){{ $pre_requisite->id }}@endisset">
                        <input type="hidden" name="course_id" value="@isset($course){{ $course->id }}@endisset">
                    </div>
                    <!--/.row -->
                    <div class="row d-none fields-to-show">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="description_en">Description</label>
                                <input type="text"
                                    value="@if(isset($pre_requisite)){{ old('description_en', $pre_requisite->description_en) }}@else{{ old('description_en') }}@endif"
                                    class="form-control form-control-border" name="description_en"
                                    placeholder="enter pre-requisite description" required>
                                    <x-input-error :messages="$errors->get('description_en')" class="text-danger" />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Edit</label>
                                <div class="" style="display: flex; flex-direction: row; justify-content: flex-left;">
                                    <button type="submit" class="btn btn-warning">Edit Pre-Requisite {{$loop->iteration}}</button>
                                    <button type="button" class="btn btn-danger ml-1" title="delete pre-requisite" data-item-id="{{$pre_requisite->id}}" onclick="deletePreRequisite(this)"><i class="fas fa-minus"></i></button>
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

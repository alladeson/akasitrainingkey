<div class="course-included-materials-wrapper">

    <div class="row d-flex justify-content-start" style="margin: 20px 0 20px 0;">
        <div class="col-sm-3 col-md-2">
            <a href="javascript:void(0);" class="" onclick="addIncludedMaterial(this);" id="included-material-add-new-btn">
                <button type="button" class="btn btn-block btn-info">+ Add Material</button>
            </a>
        </div>
    </div>
    <form action="{{route('courses.included_materials.store')}}" method="post" onsubmit="includedMaterialFormSubmit(event, this);" id="included-material-form-add-new" class="d-none">
        @csrf
        <fieldset>
            <h5>New Material : </h5>
            <div class="row">
                <input type="hidden" name="included_material_id" value="">
                <input type="hidden" name="course_id" value="@isset($course){{ $course->id }}@endisset">
            </div>
            <!--/.row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="description_en">Description</label>
                        <input type="text"
                            class="form-control form-control-border" name="description_en"
                            placeholder="enter material description" required>
                            <x-input-error :messages="$errors->get('description_en')" class="text-danger" />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Add</label>
                        <div class="" style="display: flex; flex-direction: row; justify-content: flex-left;">
                            <button type="submit" class="btn btn-info">Add Material</button>
                            <button type="button" class="btn btn-default ml-2" onclick="$('#included-material-form-add-new').addClass('d-none');$('#included-material-add-new-btn').removeClass('d-none');">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.row -->
        </fieldset>
    </form>
    <!-- /.form -->
    @if(isset($course))
        @foreach ($course_data['included_materials'] as $included_material)
            <form action="@if(isset($included_material) && $included_material->id){{route('courses.included_materials.update', ['id'=>$included_material->id])}}@else{{route('courses.included_materials.store')}}@endif" method="post" onsubmit="includedMaterialFormSubmit(event, this);" class="field-to-show-parent" data-add-btn="included-material-add-new-btn" data-add-new-form="included-material-form-add-new">
                @csrf
                @isset($included_material)@method('patch')@endisset
                <fieldset>
                    <h5 class="my-card-title">Material {{$loop->iteration}} : {{$included_material->description_en}} <i class="fas fa-pen-square card-tile-edit-icon" style="cursor: pointer;"></i></h5>
                    <div class="row">
                        <input type="hidden" name="included_material_id" value="@isset($included_material){{ $included_material->id }}@endisset">
                        <input type="hidden" name="course_id" value="@isset($course){{ $course->id }}@endisset">
                    </div>
                    <!--/.row -->
                    <div class="row d-none fields-to-show">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="description_en">Description</label>
                                <input type="text"
                                    value="@if(isset($included_material)){{ old('description_en', $included_material->description_en) }}@else{{ old('description_en') }}@endif"
                                    class="form-control form-control-border" name="description_en"
                                    placeholder="enter material description" required>
                                    <x-input-error :messages="$errors->get('description_en')" class="text-danger" />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Edit</label>
                                <div class="" style="display: flex; flex-direction: row; justify-content: flex-left;">
                                    <button type="submit" class="btn btn-warning">Edit Material {{$loop->iteration}}</button>
                                    <button type="button" class="btn btn-danger ml-1" title="delete material" data-item-id="{{$included_material->id}}" onclick="deleteIncludedMaterial(this)"><i class="fas fa-minus"></i></button>
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

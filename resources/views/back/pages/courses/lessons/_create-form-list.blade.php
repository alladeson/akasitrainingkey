<div class="course-module{{$module->id}}-lessons-wrapper">


    <div class="row d-flex justify-content-start" style="margin: 20px 0 20px 0;">
        <div class="col-sm-3 col-md-2">
            <a href="javascript:void(0);" class="" onclick="addLesson(this);" data-module-id="{{$module->id}}" id="module{{$module->id}}-lesson-add-new-btn">
                <button type="button" class="btn btn-block btn-info">+ Add Lesson</button>
            </a>
        </div>
    </div>
    <form action="{{route('courses.lessons.store')}}" method="post" onsubmit="lessonFormSubmit(event, this);" id="module{{$module->id}}-lesson-form-add-new" class="d-none">
        @csrf
        <fieldset>
            <h5>New Lesson : </h5>
            <div class="row">
                <input type="hidden" name="lesson_id" value="">
                <input type="hidden" name="module_id" value="@isset($module){{ $module->id }}@endisset">
            </div>
            <!--/.row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="title_en">Title</label>
                        <input type="text"
                            class="form-control form-control-border" name="title_en"
                            placeholder="enter lesson title" required>
                            <x-input-error :messages="$errors->get('title_en')" class="text-danger" />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Create</label>
                        <div class="" style="display: flex; flex-direction: row; justify-content: flex-left;">
                            <button type="submit" class="btn btn-info">Create Lesson</button>
                            <button type="button" class="btn btn-default ml-2" onclick="$('#module{{$module->id}}-lesson-form-add-new').addClass('d-none');$('#module{{$module->id}}-lesson-add-new-btn').removeClass('d-none');">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.row -->
        </fieldset>
    </form>
    <!-- /.form -->
    @foreach ($course_data['module_lessons']['module_' . $module->id] as $lesson)
        <form action="@if(isset($lesson) && $lesson->id){{route('courses.lessons.update', ['id'=>$lesson->id])}}@else{{route('courses.lessons.store')}}@endif" method="post" onsubmit="lessonFormSubmit(event, this);" class="field-to-show-parent" data-add-btn="module{{$module->id}}-lesson-add-new-btn" data-add-new-form="module{{$module->id}}-lesson-form-add-new">
            @csrf
            @isset($lesson)@method('patch')@endisset
            <fieldset>
                <h5 class="my-card-title">Lesson {{$loop->iteration}} : {{$lesson->title_en}} <i class="fas fa-pen-square card-tile-edit-icon" style="cursor: pointer;"></i></h5>
                <div class="row">
                    <input type="hidden" name="lesson_id" value="@isset($lesson){{ $lesson->id }}@endisset">
                    <input type="hidden" name="module_id" value="@isset($module){{ $module->id }}@endisset">
                </div>
                <!--/.row -->
                <div class="row d-none fields-to-show">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="title_en">Title</label>
                            <input type="text"
                                value="@if(isset($lesson)){{ old('title_en', $lesson->title_en) }}@else{{ old('title_en') }}@endif"
                                class="form-control form-control-border" name="title_en"
                                placeholder="enter lesson title" required>
                                <x-input-error :messages="$errors->get('title_en')" class="text-danger" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Edit</label>
                            <div class="" style="display: flex; flex-direction: row; justify-content: flex-left;">
                                <button type="submit" class="btn btn-warning">Edit Lesson {{$loop->iteration}}</button>
                                <button type="button" class="btn btn-danger ml-1" title="delete lesson" data-item-id="{{$lesson->id}}" data-module-id="{{$module->id}}" onclick="deleteLesson(this)"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.row -->
            </fieldset>
        </form>
    @endforeach
</div>

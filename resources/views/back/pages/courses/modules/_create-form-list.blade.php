<div class="course-modules-wrapper">


    <div class="row d-flex justify-content-start" style="margin: 20px 0 20px 0;">
        <div class="col-sm-3 col-md-2">
            <a href="javascript:void(0);" class="" onclick="addModule(this);" id="module-add-new-btn">
                <button type="button" class="btn btn-block btn-info">+ Add Module</button>
            </a>
        </div>
    </div>
    <form action="{{route('courses.modules.store')}}" method="post" onsubmit="moduleFormSubmit(event, this);" id="module-form-add-new" class="d-none">
        @csrf
        <fieldset>
            <h5>New Module : </h5>
            <div class="row">
                <input type="hidden" name="module_id" value="">
                <input type="hidden" name="course_id" value="@isset($course){{ $course->id }}@endisset">
            </div>
            <!--/.row -->
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="title_en">Title</label>
                        <input type="text"
                            class="form-control form-control-border" name="title_en"
                            placeholder="enter module title" required>
                            <x-input-error :messages="$errors->get('title_en')" class="text-danger" />
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Add</label>
                        <div class="" style="display: flex; flex-direction: row; justify-content: flex-left;">
                            <button type="submit" class="btn btn-info">Add Module</button>
                            <button type="button" class="btn btn-default ml-2" onclick="$('#module-form-add-new').addClass('d-none');$('#module-add-new-btn').removeClass('d-none');">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.row -->
        </fieldset>
    </form>
    <!-- /.form -->
    @if(isset($course))
        @foreach ($course_data['modules'] as $module)
            <div class="card card-default collapsed-card" data-add-btn="module-add-new-btn" data-add-new-form="module-form-add-new">
                <div class="card-header my-card-title">
                    <h3 class="card-title" style="cursor: pointer;"><span class="card-title-span" data-card-widget="collapse">Module {{$loop->iteration}} : {{$module->title_en}}</span> <i class="fas fa-pen-square card-tile-edit-icon"></i></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                    <form action="@if(isset($module) && $module->id){{route('courses.modules.update', ['id'=>$module->id])}}@else{{route('courses.modules.store')}}@endif" method="post" onsubmit="moduleFormSubmit(event, this);">
                        @csrf
                        @isset($module)@method('patch')@endisset
                        <fieldset>
                            {{-- <h5>Module {{$loop->iteration}} : </h5> --}}
                            <div class="row">
                                <input type="hidden" name="module_id" value="@isset($module){{ $module->id }}@endisset">
                                <input type="hidden" name="course_id" value="@isset($course){{ $course->id }}@endisset">
                            </div>
                            <!--/.row -->
                            <div class="row d-none fields-to-show">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="title_en">Title</label>
                                        <input type="text"
                                            value="@if(isset($module)){{ old('title_en', $module->title_en) }}@else{{ old('title_en') }}@endif"
                                            class="form-control form-control-border" name="title_en"
                                            placeholder="enter module title" required>
                                            <x-input-error :messages="$errors->get('title_en')" class="text-danger" />
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Edit</label>
                                        <div class="" style="display: flex; flex-direction: row; justify-content: flex-left;">
                                            <button type="submit" class="btn btn-warning">Edit Module {{$loop->iteration}}</button>
                                            <button type="button" class="btn btn-danger ml-1" title="delete module" data-item-id="{{$module->id}}" onclick="deleteModule(this)"><i class="fas fa-minus"></i></button>
                                            {{-- <button type="button" class="btn btn-info ml-1" title="Add Lesson" data-item-id="{{$module->id}}" onclick="addLesson(this);">+ Add Lesson</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/.row -->
                        </fieldset>
                    </form>
                    <!-- Modules lessons card -->
                    <div class="card card-default">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('back.pages.courses.lessons._create-form-list')
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.Modules lessons card -->
                </div>
                <!-- /.card-body -->
            </div>
        @endforeach
    @endif
</div>

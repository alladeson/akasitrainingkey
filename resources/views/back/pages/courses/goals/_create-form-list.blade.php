<div class="course-goals-wrapper">
    <div class="row d-flex justify-content-start" style="margin: 20px 0 20px 0;">
        <div class="col-sm-3 col-md-2">
            <a href="javascript:void(0);" class="" onclick="addGoal(this);" id="goal-add-new-btn">
                <button type="button" class="btn btn-block btn-info">+ Add Goal</button>
            </a>
        </div>
    </div>
    <form action="{{route('courses.goals.store')}}" method="post" onsubmit="goalFormSubmit(event, this);" id="goal-form-add-new" class="d-none">
        @csrf
        <fieldset>
            <h5>New Goal : </h5>
            <div class="row">
                <input type="hidden" name="goal_id" value="">
                <input type="hidden" name="course_id" value="@isset($course){{ $course->id }}@endisset">
            </div>
            <!--/.row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="description_en">Description</label>
                        <input type="text"
                            class="form-control form-control-border" name="description_en"
                            placeholder="enter goal description" required>
                            <x-input-error :messages="$errors->get('description_en')" class="text-danger" />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Add</label>
                        <div class="" style="display: flex; flex-direction: row; justify-content: flex-left;">
                            <button type="submit" class="btn btn-info">Add Goal</button>
                            <button type="button" class="btn btn-default ml-2" onclick="$('#goal-form-add-new').addClass('d-none');$('#goal-add-new-btn').removeClass('d-none');">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.row -->
        </fieldset>
    </form>
    <!-- /.form -->
    @if(isset($course))
        @foreach ($course_data['goals'] as $goal)
            <form action="@if(isset($goal) && $goal->id){{route('courses.goals.update', ['id'=>$goal->id])}}@else{{route('courses.goals.store')}}@endif" method="post" onsubmit="goalFormSubmit(event, this);" class="field-to-show-parent" data-add-btn="goal-add-new-btn" data-add-new-form="goal-form-add-new">
                @csrf
                @isset($goal)@method('patch')@endisset
                <fieldset>
                    <h5 class="my-card-title">Goal {{$loop->iteration}} : {{$goal->description_en}} <i class="fas fa-pen-square card-tile-edit-icon" style="cursor: pointer;"></i></h5>
                    <div class="row">
                        <input type="hidden" name="goal_id" value="@isset($goal){{ $goal->id }}@endisset">
                        <input type="hidden" name="course_id" value="@isset($course){{ $course->id }}@endisset">
                    </div>
                    <!--/.row -->
                    <div class="row d-none fields-to-show">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="description_en">Description</label>
                                <input type="text"
                                    value="@if(isset($goal)){{ old('description_en', $goal->description_en) }}@else{{ old('description_en') }}@endif"
                                    class="form-control form-control-border" name="description_en"
                                    placeholder="enter goal description" required>
                                    <x-input-error :messages="$errors->get('description_en')" class="text-danger" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Edit</label>
                                <div class="" style="display: flex; flex-direction: row; justify-content: flex-left;">
                                    <button type="submit" class="btn btn-warning">Edit Goal {{$loop->iteration}}</button>
                                    <button type="button" class="btn btn-danger ml-1" title="delete goal" data-item-id="{{$goal->id}}" onclick="deleteGoal(this)"><i class="fas fa-minus"></i></button>
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

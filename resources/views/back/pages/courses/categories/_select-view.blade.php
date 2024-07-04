<div class="form-group" id="category-select-view">
    <label>Category<span class="text-danger">*</span></label>
    <select class="form-control select2" style="width: 100%;" name="category_id"
        id="category_id" onchange="hideValidatonMessage(this);">
        <option value="">select a category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                @if ( (isset($course) && $category->id == $course->category_id) || $category->id == old('category_id') || (session('course') && (session('course')->category_id == $category->id))) @selected(true) @endif>
                {{ $category->name_en }}</option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('category_id')" class="text-danger" />
</div>

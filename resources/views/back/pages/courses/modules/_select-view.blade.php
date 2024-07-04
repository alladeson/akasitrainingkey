<div class="form-group" id="module-select-view">
    <label>Module</label>
    <select class="form-control select2" style="width: 100%;" name="module_id"
        id="module_id" onchange="hideValidatonMessage(this);">
        <option value="">select a module</option>
        @foreach ($modules as $module)
            <option value="{{ $module->id }}"
                @if ( (isset($lesson) && $module->id == $lesson->module_id) || $module->id == old('module_id') || (session('module') && (session('module')->id == $module->id))) @selected(true) @endif>
                {{ $module->title_en }}</option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('module_id')" class="text-danger" />
</div>
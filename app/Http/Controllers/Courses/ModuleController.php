<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModuleController extends Controller
{
    public function index(Request $request)
    {
        return view('back.pages.courses.modules.index', [
            'courses' => get_courses_with_categories($request),
            'page_title' => "Courses Modules",
            'page_code' => ["trainings", "courses", "modules"],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Modules', 'route' => ''],
            ],
        ]);
    }

    public function datatable(Request $request)
    {
        $modules = [];
        if ($request->get('course_id'))
            $modules = get_modules_with_courses($request);

        return response()->json($modules);
    }

    public function moduleOfCourseSelectView(Request $request): View
    {
            return view('back.pages.courses.modules._select-view', [
                'modules' => Module::where('course_id', $request->get('course_id'))->get(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): View
    {
        return view('back.pages.courses.modules.create', [
            'courses' => get_courses_with_categories($request, 'draft'),
            'page_title' => "Create Course Module",
            'page_code' => ["trainings", "courses", "modules"],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Modules', 'route' => 'courses.modules.index'],
                ['name' => 'Create', 'route' => ''],
            ],
        ]);
    }

    public function show($id)
    {
         $module =  Module::find($id);

        if (! $module) {
            return response()->json(['message' => 'Course module not found'], 404);
        }

        return response()->json( $module);
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title_en' => 'required',
            'title_fr' => 'nullable',
        ]);

         $module =  Module::create($request->all());

         if($request->has('module_id') && $module){
            return view('back.pages.courses.modules._create-form-list', [
                'course' => Course::find($module->course_id),
                'course_data' => get_course_data($module->course_id),
            ]);
        }

         return redirect()->route('courses.modules.create')
         ->with([
             'success' => 'Course Module created successfully',
             'course' => Course::find($module->course_id),
         ]);
    }

    public function edit(Request $request, $id)
    {
        return view('back.pages.courses.modules.create', [
            'courses' => get_courses_with_categories($request, 'draft'),
            'module' => Module::find($id),
            'page_title' => "Edit Course Module",
            'page_code' => ["trainings", "courses", "modules"],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Modules', 'route' => 'courses.modules.index'],
                ['name' => 'Edit', 'route' => ''],
            ],
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title_en' => 'required',
            'title_fr' => 'nullable',
        ]);

         $module =  Module::find($id);

        if (! $module) {
            return redirect()->route('courses.modules.index')
                ->with(['error' => 'Course Module not found']);
        }

         $module->update($request->all());

         if($request->has('module_id') && $module){
            return view('back.pages.courses.modules._create-form-list', [
                'course' => Course::find($module->course_id),
                'course_data' => get_course_data($module->course_id),
            ]);
        }

         return redirect()->route('courses.modules.index')
         ->with([
             'success' => 'Course Module updated successfully',
             'course' => Course::find($module->course_id),
         ]);
    }

    public function destroy(Request $request, $id)
    {
         $module =  Module::find($id);

        if (! $module) {
            return redirect()->route('courses.modules.index')
                ->with(['error' => 'Course Module not found']);
        }

         $module->delete();

         if($request->has('module_id') && $module){
            return view('back.pages.courses.modules._create-form-list', [
                'course' => Course::find($module->course_id),
                'course_data' => get_course_data($module->course_id),
            ]);
        }

         return redirect()->route('courses.modules.index')
         ->with([
             'success' => 'Course Module deleted successfully',
             'course' => Course::find($module->course_id),
         ]);
    }

}

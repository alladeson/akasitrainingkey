<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LessonsController extends Controller
{
    public function index(Request $request)
    {
        return view('back.pages.courses.lessons.index', [
            'courses' => get_courses_with_categories($request),
            'modules' => session('course') ? (Module::where('course_id', session('course')->id)->get()) : [],
            'page_title' => "Courses Lessons",
            'page_code' => ["trainings", "courses", "lessons"],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Lessons', 'route' => ''],
            ],
        ]);
    }

    public function datatable(Request $request)
    {
        $lessons = [];
        if ($request->get('course_id'))
            $lessons = get_lessons_with_courses_and_modules($request);

        return response()->json($lessons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): View
    {
        return view('back.pages.courses.lessons.create', [
            'courses' => get_courses_with_categories($request, 'draft'),
            'modules' => session('course') ? (Module::where('course_id', session('course')->id)->get()) : [],
            'page_title' => "Create Course Lesson",
            'page_code' => ["trainings", "courses", "lessons"],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Lessons', 'route' => 'courses.lessons.index'],
                ['name' => 'Create', 'route' => ''],
            ],
        ]);
    }

    public function show($id)
    {
        $lesson = Lesson::find($id);

        if (!$lesson) {
            return response()->json(['message' => 'Course lesson not found'], 404);
        }

        return response()->json($lesson);
    }

    public function store(Request $request)
    {
        $request->validate([
            'module_id' => 'required|exists:modules,id',
            'title_en' => 'required',
            'title_fr' => 'nullable',
        ]);

        $lesson = Lesson::create($request->all());
        $module = Module::find($lesson->module_id);
        $course = Course::find($module->course_id);

        if($request->has('lesson_id') && $module){
            return view('back.pages.courses.lessons._create-form-list', [
                'module' => $module,
                'course_data' => get_course_data($course->id),
            ]);
        }

        return redirect()->route('courses.lessons.create')
            ->with([
                'success' => 'Course Lesson created successfully',
                'module' => $module,
                'course' => $course,
            ]);
    }

    public function edit(Request $request, $id)
    {
        $lesson = Lesson::find($id);
        if (!$lesson) {
            return redirect()->route('courses.lessons.index')
                ->with(['error' => 'Course Lesson not found']);
        }
        $module = Module::find($lesson->module_id);
        $course = Course::find($module->course_id);

        return view('back.pages.courses.lessons.create', [
            'courses' => get_courses_with_categories($request, 'draft'),
            'modules' =>Module::where('course_id', $course->id)->get(),
            'lesson' => $lesson,
            'module' => $module,
            'course' => $course,
            'page_title' => "Edit Course Lesson",
            'page_code' => ["trainings", "courses", "lessons"],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Lessons', 'route' => 'courses.lessons.index'],
                ['name' => 'Edit', 'route' => ''],
            ],
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'module_id' => 'required|exists:lessons,id',
            'title_en' => 'required',
            'title_fr' => 'nullable',
        ]);

        $lesson = Lesson::find($id);

        if (!$lesson) {
            return redirect()->route('courses.lessons.index')
                ->with(['error' => 'Course Lesson not found']);
        }

        $lesson->update($request->all());

        $module = Module::find($lesson->module_id);
        $course = Course::find($module->course_id);

        if($request->has('lesson_id') && $module){
            return view('back.pages.courses.lessons._create-form-list', [
                'module' => $module,
                'course_data' => get_course_data($course->id),
            ]);
        }

        return redirect()->route('courses.lessons.index')
            ->with([
                'success' => 'Course Lesson updated successfully',
                'module' => $module,
                'course' => $course,
            ]);
    }

    public function destroy(Request $request, $id)
    {
        $lesson = Lesson::find($id);

        if (!$lesson) {
            return redirect()->route('courses.lessons.index')
                ->with(['error' => 'Course Lesson not found']);
        }

        $lesson->delete();

        $module = Module::find($lesson->module_id);
        $course = Course::find($module->course_id);

        if($request->has('lesson_id') && $module){
            return view('back.pages.courses.lessons._create-form-list', [
                'module' => $module,
                'course_data' => get_course_data($course->id),
            ]);
        }

        return redirect()->route('courses.lessons.index')
            ->with([
                'success' => 'Course Lesson deleted successfully',
                'module' => $module,
                'course' => $course,
            ]);
    }

}

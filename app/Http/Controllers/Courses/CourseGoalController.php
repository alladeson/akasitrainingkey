<?php

namespace App\Http\Controllers\Courses;

use App\Models\Course;
use App\Models\CourseGoal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CourseGoalController extends Controller
{
    public function index(Request $request)
    {
        return view('back.pages.courses.goals.index', [
            'courses' => get_courses_with_categories($request),
            'page_title' => "Courses Goals",
            'page_code' => ["trainings", "courses", "goals"],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Goals', 'route' => ''],
            ],
        ]);
    }

    public function datatable(Request $request)
    {
        $goals = [];
        if ($request->get('course_id'))
            $goals = get_goals_with_courses($request);

        return response()->json($goals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): View
    {
        return view('back.pages.courses.goals.create', [
            'courses' => get_courses_with_categories($request, 'draft'),
            'page_title' => "Create Course Goal",
            'page_code' => ["trainings", "courses", "goals"],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Goals', 'route' => 'courses.goals.index'],
                ['name' => 'Create', 'route' => ''],
            ],
        ]);
    }

    public function show($id)
    {
        $courseGoal = CourseGoal::find($id);

        if (!$courseGoal) {
            return response()->json(['message' => 'Course Goal not found'], 404);
        }

        return response()->json($courseGoal);
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'description_en' => 'required',
            'description_fr' => 'nullable',
        ]);

        $courseGoal = CourseGoal::create($request->all());

        if($request->has('goal_id') && $courseGoal){
            return view('back.pages.courses.goals._create-form-list', [
                'course' => Course::find($courseGoal->course_id),
                'course_data' => get_course_data($courseGoal->course_id),
            ]);
        }

        return redirect()->route('courses.goals.create')
            ->with([
                'success' => 'Course Goal created successfully',
                'course' => Course::find($courseGoal->course_id),
            ]);
    }

    public function edit(Request $request, $id)
    {
        return view('back.pages.courses.goals.create', [
            'courses' => get_courses_with_categories($request, 'draft'),
            'goal' => CourseGoal::find($id),
            'page_title' => "Edit Course Goal",
            'page_code' => ["trainings", "courses", "goals"],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Goals', 'route' => 'courses.goals.index'],
                ['name' => 'Edit', 'route' => ''],
            ],
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'description_en' => 'required',
            'description_fr' => 'nullable',
        ]);

        $courseGoal = CourseGoal::find($id);

        if (!$courseGoal) {
            return redirect()->route('courses.goals.index')
                ->with(['error' => 'Course Goal not found']);
        }


        $courseGoal->update($request->all());

        if($request->has('goal_id') && $courseGoal){
            return view('back.pages.courses.goals._create-form-list', [
                'course' => Course::find($courseGoal->course_id),
                'course_data' => get_course_data($courseGoal->course_id),
            ]);
        }

        return redirect()->route('courses.goals.index')
            ->with([
                'success' => 'Course Goal updated successfully',
                'course' => Course::find($courseGoal->course_id),
            ]);

    }

    public function destroy(Request $request, $id)
    {
        $courseGoal = CourseGoal::find($id);

        if (!$courseGoal) {
            return redirect()->route('courses.goals.index')
                ->with(['error' => 'Course Goal not found']);
        }

        $courseGoal->delete();

        if($request->has('goal_id') && $courseGoal){
            return view('back.pages.courses.goals._create-form-list', [
                'course' => Course::find($courseGoal->course_id),
                'course_data' => get_course_data($courseGoal->course_id),
            ]);
        }

        return redirect()->route('courses.goals.index')
            ->with([
                'success' => 'Course Goal deleted successfully',
                'course' => Course::find($courseGoal->course_id),
            ]);
    }
}

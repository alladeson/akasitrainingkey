<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\TargetedAudience;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TargetedAudiencesController extends Controller
{
    public function index(Request $request)
    {
        return view('back.pages.courses.targeted-audiences.index', [
            'courses' => get_courses_with_categories($request),
            'page_title' => "Targeted Audiences",
            'page_code' => ["trainings", "courses", "targeted_audiences"],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Targeted Audiences', 'route' => ''],
            ],
        ]);
    }

    public function datatable(Request $request)
    {
        $targeted_audiences = [];
        if ($request->get('course_id'))
            $targeted_audiences = get_targeted_audiences_with_courses($request);

        return response()->json($targeted_audiences);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): View
    {
        return view('back.pages.courses.targeted-audiences.create', [
            'courses' => get_courses_with_categories($request, 'draft'),
            'page_title' => "Create Targeted Audience",
            'page_code' => ["trainings", "courses", "targeted_audiences"],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Targeted Audiences', 'route' => 'courses.targeted_audiences.index'],
                ['name' => 'Create', 'route' => ''],
            ],
        ]);
    }

    public function show($id)
    {
        $targeted = TargetedAudience::find($id);

        if (!$targeted) {
            return response()->json(['message' => 'Course targeted audience not found'], 404);
        }

        return response()->json($targeted);
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'description_en' => 'required',
            'description_fr' => 'nullable',
        ]);

        $targeted = TargetedAudience::create($request->all());

        if($request->has('targeted_audience_id') && $targeted){
            return view('back.pages.courses.targeted-audiences._create-form-list', [
                'course' => Course::find($targeted->course_id),
                'course_data' => get_course_data($targeted->course_id),
            ]);
        }

        return redirect()->route('courses.targeted_audiences.create')
            ->with([
                'success' => 'Targeted Audience created successfully',
                'course' => Course::find($targeted->course_id),
            ]);
    }

    public function edit(Request $request, $id)
    {
        return view('back.pages.courses.targeted-audiences.create', [
            'courses' => get_courses_with_categories($request, 'draft'),
            'targeted_audience' => TargetedAudience::find($id),
            'page_title' => "Edit Targeted Audience",
            'page_code' => ["trainings", "courses", "targeted_audiences"],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Targeted Audiences', 'route' => 'courses.targeted_audiences.index'],
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

        $targeted = TargetedAudience::find($id);

        if (!$targeted) {
            return redirect()->route('courses.targeted_audiences.index')
                ->with(['error' => 'Targeted Audience not found']);
        }

        $targeted->update($request->all());

        if($request->has('targeted_audience_id') && $targeted){
            return view('back.pages.courses.targeted-audiences._create-form-list', [
                'course' => Course::find($targeted->course_id),
                'course_data' => get_course_data($targeted->course_id),
            ]);
        }

        return redirect()->route('courses.targeted_audiences.index')
            ->with([
                'success' => 'Targeted Audience updated successfully',
                'course' => Course::find($targeted->course_id),
            ]);
    }

    public function destroy(Request $request, $id)
    {
        $targeted = TargetedAudience::find($id);

        if (!$targeted) {
            return redirect()->route('courses.targeted_audiences.index')
                ->with(['error' => 'Targeted Audience not found']);
        }

        $targeted->delete();

        if($request->has('targeted_audience_id') && $targeted){
            return view('back.pages.courses.targeted-audiences._create-form-list', [
                'course' => Course::find($targeted->course_id),
                'course_data' => get_course_data($targeted->course_id),
            ]);
        }

        return redirect()->route('courses.targeted_audiences.index')
            ->with([
                'success' => 'Targeted Audience deleted successfully',
                'course' => Course::find($targeted->course_id),
            ]);
    }

}

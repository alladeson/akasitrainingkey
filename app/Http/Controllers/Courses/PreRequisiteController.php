<?php

namespace App\Http\Controllers\Courses;

use App\Models\Course;
use App\Models\PreRequisite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PreRequisiteController extends Controller
{
    public function index(Request $request)
    {
        return view('back.pages.courses.pre-requisites.index', [
            'courses' => get_courses_with_categories($request),
            'page_title' => "Pre-Requisites",
            'page_code' => ["trainings", "courses", "pre_requisites"],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Pre-Requisites', 'route' => ''],
            ],
        ]);
    }

    public function datatable(Request $request)
    {
        $targeted_audiences = [];
        if ($request->get('course_id'))
            $targeted_audiences = get_pre_requisites_with_courses($request);

        return response()->json($targeted_audiences);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): View
    {
        return view('back.pages.courses.pre-requisites.create', [
            'courses' => get_courses_with_categories($request, 'draft'),
            'page_title' => "Create Pre-Requisite",
            'page_code' => ["trainings", "courses", "pre_requisites"],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Pre-Requisites', 'route' => 'courses.pre_requisites.index'],
                ['name' => 'Create', 'route' => ''],
            ],
        ]);
    }
    public function show($id)
    {
        $preRequisite = PreRequisite::find($id);

        if (!$preRequisite) {
            return response()->json(['message' => 'Course pre-requisites not found'], 404);
        }

        return response()->json($preRequisite);
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'description_en' => 'required',
            'description_fr' => 'nullable',
        ]);

        $preRequisite = PreRequisite::create($request->all());

        if($request->has('pre_requisite_id') && $preRequisite){
            return view('back.pages.courses.pre-requisites._create-form-list', [
                'course' => Course::find($preRequisite->course_id),
                'course_data' => get_course_data($preRequisite->course_id),
            ]);
        }

        return redirect()->route('courses.pre_requisites.create')
            ->with([
                'success' => 'Pre-Requisite created successfully',
                'course' => Course::find($preRequisite->course_id),
            ]);
    }

    public function edit(Request $request, $id)
    {
        return view('back.pages.courses.pre-requisites.create', [
            'courses' => get_courses_with_categories($request, 'draft'),
            'pre_requisite' => PreRequisite::find($id),
            'page_title' => "Edit Pre-Requisite",
            'page_code' => ["trainings", "courses", "pre_requisites"],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Pre-Requisites', 'route' => 'courses.pre_requisites.index'],
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

        $preRequisite = PreRequisite::find($id);

        if (!$preRequisite) {
            return redirect()->route('courses.pre_requisites.index')
                ->with(['error' => 'Pre-Requisite not found']);
        }

        $preRequisite->update($request->all());

        if($request->has('pre_requisite_id') && $preRequisite){
            return view('back.pages.courses.pre-requisites._create-form-list', [
                'course' => Course::find($preRequisite->course_id),
                'course_data' => get_course_data($preRequisite->course_id),
            ]);
        }

        return redirect()->route('courses.pre_requisites.index')
            ->with([
                'success' => 'Pre-Requisite updated successfully',
                'course' => Course::find($preRequisite->course_id),
            ]);
    }

    public function destroy(Request $request, $id)
    {
        $preRequisite = PreRequisite::find($id);

        if (!$preRequisite) {
            return redirect()->route('courses.pre_requisites.index')
                ->with(['error' => 'Pre-Requisite not found']);
        }

        $preRequisite->delete();

        if($request->has('pre_requisite_id') && $preRequisite){
            return view('back.pages.courses.pre-requisites._create-form-list', [
                'course' => Course::find($preRequisite->course_id),
                'course_data' => get_course_data($preRequisite->course_id),
            ]);
        }

        return redirect()->route('courses.pre_requisites.index')
            ->with([
                'success' => 'Pre-Requisite deleted successfully',
                'course' => Course::find($preRequisite->course_id),
            ]);
    }
}

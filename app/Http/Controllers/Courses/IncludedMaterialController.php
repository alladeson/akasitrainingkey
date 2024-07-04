<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\IncludedMaterial;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IncludedMaterialController extends Controller
{
    public function index(Request $request)
    {
        return view('back.pages.courses.included-materials.index', [
            'courses' => get_courses_with_categories($request),
            'page_title' => "Materials Included",
            'page_code' => ["trainings", "courses", "included_materials"],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Materials Included', 'route' => ''],
            ],
        ]);
    }

    public function datatable(Request $request)
    {
        $included_materials = [];
        if ($request->get('course_id'))
            $included_materials = get_included_materials_with_courses($request);

        return response()->json($included_materials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): View
    {
        return view('back.pages.courses.included-materials.create', [
            'courses' => get_courses_with_categories($request, 'draft'),
            'page_title' => "Create Material",
            'page_code' => ["trainings", "courses", "included_materials"],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Materials Included', 'route' => 'courses.included_materials.index'],
                ['name' => 'Create', 'route' => ''],
            ],
        ]);
    }

    public function show($id)
    {
        $material = IncludedMaterial::find($id);

        if (!$material) {
            return response()->json(['message' => 'Material Included not found'], 404);
        }

        return response()->json($material);
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'description_en' => 'required',
            'description_fr' => 'nullable',
        ]);

        $material = IncludedMaterial::create($request->all());

        if($request->has('included_material_id') && $material){
            return view('back.pages.courses.included-materials._create-form-list', [
                'course' => Course::find($material->course_id),
                'course_data' => get_course_data($material->course_id),
            ]);
        }

        return redirect()->route('courses.included_materials.create')
            ->with([
                'success' => 'Material Included created successfully',
                'course' => Course::find($material->course_id),
            ]);
    }

    public function edit(Request $request, $id)
    {
        return view('back.pages.courses.included-materials.create', [
            'courses' => get_courses_with_categories($request, 'draft'),
            'included_material' => IncludedMaterial::find($id),
            'page_title' => "Edit Material",
            'page_code' => ["trainings", "courses", "included_materials"],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Materials Included', 'route' => 'courses.included_materials.index'],
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

        $material = IncludedMaterial::find($id);

        if (!$material) {
            return redirect()->route('courses.included_materials.index')
                ->with(['error' => 'Material Included not found']);
        }

        $material->update($request->all());

        if($request->has('included_material_id') && $material){
            return view('back.pages.courses.included-materials._create-form-list', [
                'course' => Course::find($material->course_id),
                'course_data' => get_course_data($material->course_id),
            ]);
        }

        return redirect()->route('courses.included_materials.index')
            ->with([
                'success' => 'Material Included updated successfully',
                'course' => Course::find($material->course_id),
            ]);
    }

    public function destroy(Request $request, $id)
    {
        $material = IncludedMaterial::find($id);

        if (!$material) {
            return redirect()->route('courses.included_materials.index')
                ->with(['error' => 'Material Included not found']);
        }

        $material->delete();

        if($request->has('included_material_id') && $material){
            return view('back.pages.courses.included-materials._create-form-list', [
                'course' => Course::find($material->course_id),
                'course_data' => get_course_data($material->course_id),
            ]);
        }

        return redirect()->route('courses.included_materials.index')
            ->with([
                'success' => 'Material Included deleted successfully',
                'course' => Course::find($material->course_id),
            ]);

    }
}

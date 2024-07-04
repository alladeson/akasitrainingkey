<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use App\Models\TrainingTopic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseCategoryController extends Controller
{
    public function index()
    {
        return view('back.pages.courses-categories.index', [
            'topics' => TrainingTopic::all(),
            'page_title' => "Course Categories",
            'page_code' => ["settings", "categories", ""],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Course Categories', 'route' => ''],
            ],
        ]);
    }

    public function datatable(Request $request)
    {

        $categories = get_categories_with_topics($request);

        return response()->json($categories);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): View
    {
        return view('back.pages.courses-categories.create', [
            'topics' => TrainingTopic::all(),
            'page_title' => "Create Course Category",
            'page_code' => ["settings", "categories", ""],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Course Categories', 'route' => 'courses.categories.index'],
                ['name' => 'Create', 'route' => ''],
            ],
        ]);
    }

    public function show($id)
    {
        $courseCategory = CourseCategory::find($id);

        if (!$courseCategory) {
            return response()->json(['message' => 'Course category not found'], 404);
        }

        return response()->json($courseCategory);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|unique:course_categories',
            'name_fr' => 'nullable|unique:course_categories',
            'description_en' => 'nullable',
            'description_fr' => 'nullable',
            'url_tag' => 'required|unique:course_categories',
            'training_topic_id' => 'required|exists:training_topics,id',
        ]);

        $courseCategory = CourseCategory::create($request->all());

        return redirect()->route('courses.categories.index')
        ->with([
            'success' => 'Course Category created successfully',
        ]);
    }

    public function edit(Request $request, $id)
    {
        return view('back.pages.courses-categories.create', [
            'topics' => TrainingTopic::all(),
            'category' => CourseCategory::find($id),
            'page_title' => "Edit Course Category",
            'page_code' => ["settings", "categories", ""],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Course Categories', 'route' => 'courses.categories.index'],
                ['name' => 'Edit', 'route' => ''],
            ],
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_en' => 'required|unique:course_categories,name_en,' . $id,
            'name_fr' => 'nullable|unique:course_categories,name_fr,' . $id,
            'description_en' => 'nullable',
            'description_fr' => 'nullable',
            'url_tag' => 'required|unique:course_categories,url_tag,' . $id,
            'training_topic_id' => 'required|exists:training_topics,id',
        ]);

        $courseCategory = CourseCategory::find($id);

        if (!$courseCategory) {
            return redirect()->route('courses.categories.index')
                ->with(['error' => 'Course Category not found']);
        }

        $courseCategory->update($request->all());

        return redirect()->route('courses.categories.index')
            ->with([
                'success' => 'Course Category updated successfully',
            ]);
    }

    public function destroy($id)
    {
        $courseCategory = CourseCategory::find($id);

        if (!$courseCategory) {
            return redirect()->route('courses.categories.index')
                ->with(['error' => 'Course Category not found']);
        }

        try {
            $courseCategory->delete();
        } catch (Exception $exception) {
            return redirect()->route('courses.categories.index')
                ->with('error', 'an error occurred while deleting the course category, it is probably already associated with other data.');
        }
        return redirect()->route('courses.categories.index')
            ->with([
                'success' => 'Course Category deleted successfully',
            ]);
    }

    public function performCategoryUrlTag(Request $request)
    {
        $topic_name = $request->get('category_name');
        return response()->json(['url_tag' => perform_course_url_tag($topic_name)]);
    }
}

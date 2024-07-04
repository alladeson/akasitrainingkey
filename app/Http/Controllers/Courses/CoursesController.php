<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\TrainingTopic;
use App\Models\Vendor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CoursesController extends Controller
{
    public function index(Request $request): View
    {
        return view('back.pages.courses.index', [
            'categories' => CourseCategory::all(),
            'certifications' => Certification::all(),
            'vendors' => Vendor::all(),
            'courses' => get_courses_with_categories($request),
            'page_title' => "List of Courses",
            'page_code' => ["trainings", "courses", "catalog"],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses Catalog', 'route' => ''],
            ],
        ]);
    }
    public function datatable(Request $request)
    {
        $courses = get_courses_with_categories($request);

        if (!$courses) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        return response()->json($courses);
    }

    public function coursesOfTopicSelectView(Request $request): View
    {
            return view('back.pages.courses.categories._select-view', [
                'categories' => CourseCategory::where('training_topic_id', $request->get('topic_id'))->get(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        // Retrieve latest course code
        $last_code = Course::get()->last()->code;
        // update code for new course
        $new_code = $last_code+1;
        $new_code = substr('0000'.$new_code, -5);
        // Retrieve last course to create for the user
        $course = get_course_to_create();
        if(!$course)// If not exist, create one
            $course = Course::create(['code' => $new_code,]);
        // Retrieve last topic in session
        $topic_id = session('topic') ? session('topic')->id : old('topic_id');
        // Render create view
        return view('back.pages.courses.create', [
            'topics' => TrainingTopic::all(),
            'categories' => CourseCategory::where('training_topic_id', $topic_id)->get(),
            'certifications' => Certification::all(),
            'vendors' => Vendor::all(),
            'course' => $course,
            'course_data' => get_course_data($course->id),
            'page_title' => "Create Course",
            'page_code' => ["trainings", "courses", ""],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Create', 'route' => ''],
            ],
        ]);
    }

    public function show($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        return response()->json($course);
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'nullable|unique:courses',
            'name_en' => 'required|unique:courses',
            'name_fr' => 'nullable|unique:courses',
            'description_en' => 'required',
            'description_fr' => 'nullable',
            'url_tag' => 'required|unique:courses',
            'level_en' => 'required',
            'level_fr' => 'nullable',
            'duration_en' => 'required',
            'duration_fr' => 'nullable',
            'duration_type' => 'required',
            'duration_number' => 'required',
            'after_course' => 'required',
            'learning_mode_en' => 'required',
            'learning_mode_fr' => 'nullable',
            'price_euro' => 'required|numeric',
            'price_fcfa' => 'nullable|numeric',
            'status_en' => 'nullable',
            'status_fr' => 'nullable',
            'instructor_id' => 'nullable|exists:instructors,id',
            'category_id' => 'required|exists:course_categories,id',
            'certification_id' => 'nullable|exists:certifications,id',
            'vendor_id' => 'nullable|exists:vendors,id',
        ]);

        $data = $request->all();
        // Retrieve latest course code
        $last_code = Course::get()->last()->code;
        // update code for new course
        $new_code = $last_code+1;
        $data['code'] = substr('0000'.$new_code, -5);

        // Assign course to instructor
        if(Auth::user()->hasRole('Instructor')){
            $data['instructor_id'] = get_user_profile()->id;
        }

        $course = Course::create($data);

        // return response()->json( $course, 201);
        return redirect()->route('courses.edit', ['id'=>$course->id])
            ->with([
                'success' => 'Course created successfully',
                'course' => $course,
            ]);
    }

    public function edit($id)
    {
        $course = Course::find($id);
        if (!$course) {
            return redirect()->route('courses.index')
                ->with(['error' => 'Course not found']);
        }

        $category = CourseCategory::find($course->category_id);

        return view('back.pages.courses.create', [
            'topics' => TrainingTopic::all(),
            'categories' => CourseCategory::where('training_topic_id', $category->training_topic_id)->get(),
            'certifications' => Certification::all(),
            'vendors' => Vendor::all(),
            'course_data' => get_course_data($id),
            'course' => $course,
            'category' => $category,
            'page_title' => "Edit Course",
            'page_code' => ["trainings", "courses", ""],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'courses.index'],
                ['name' => 'Edit', 'route' => ''],
            ],
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|unique:courses,code,' . $id,
            'name_en' => 'required|unique:courses,name_en,' . $id,
            'name_fr' => 'nullable|unique:courses,name_fr,' . $id,
            'description_en' => 'required',
            'description_fr' => 'nullable',
            'url_tag' => 'required|unique:courses,url_tag,' . $id,
            'level_en' => 'required',
            'level_fr' => 'nullable',
            'duration_en' => 'required',
            'duration_fr' => 'nullable',
            'duration_type' => 'required',
            'duration_number' => 'required',
            'after_course' => 'required',
            'learning_mode_en' => 'required',
            'learning_mode_fr' => 'nullable',
            'price_euro' => 'required|numeric',
            'price_fcfa' => 'nullable|numeric',
            'status_en' => 'nullable',
            'status_fr' => 'nullable',
            'instructor_id' => 'nullable|exists:instructors,id',
            'category_id' => 'required|exists:course_categories,id',
            'certification_id' => 'nullable|exists:certifications,id',
            'vendor_id' => 'nullable|exists:vendors,id',

        ]);

        $course = Course::find($id);

        if (!$course) {
            return redirect()->route('courses.index')
                ->with(['error' => 'Course not found']);
        }

        $course->update($request->all());

        // return redirect()->route('courses.index')
        //     ->with([
        //         'success' => 'Course updated successfully',
        //         'course' => $course,
        //     ]);

        return redirect()->route('courses.edit', ['id'=>$course->id])
            ->with([
                'success' => 'Course updated successfully',
                'course' => $course,
            ]);
    }

    public function destroy($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect()->route('courses.index')
                ->with(['error' => 'Course not found']);
        }

        try {
            $course->delete();
        } catch (Exception $exception) {
            return redirect()->route('schedules.index')
                ->with('error', 'an error occurred while deleting the course, it is probably already associated with other data.');
        }

        return redirect()->route('courses.index')
            ->with([
                'success' => 'Course deleted successfully',
                'course' => $course,
            ]);
    }

    public function performCourseUrlTag(Request $request)
    {
        $course_name = $request->get('course_name');
        return response()->json(['url_tag' => perform_course_url_tag($course_name)]);
    }

    public function enablePublishing(Request $request, $id)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect()->route('courses.index')
                ->with(['error' => 'Course not found']);
        }

        $course->published = true;

        $course->save();

        return redirect()->route('courses.index')
            ->with([
                'success' => 'Course sent for review successfully',
                'course' => $course,
            ]);
    }

    public function publishCourse(Request $request, $id)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect()->route('courses.index')
                ->with(['error' => 'Course not found']);
        }

        $course->status_en = Course::status_new_en;
        $course->status_fr = Course::status_new_fr;

        $course->save();

        return redirect()->route('courses.index')
            ->with([
                'success' => 'Course published successfully',
                'course' => $course,
            ]);
    }

    public function enableEditing(Request $request, $id)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect()->route('courses.index')
                ->with(['error' => 'Course not found']);
        }

        $course->published = false;
        $course->status_en = Course::status_draft_en;
        $course->status_fr = Course::status_draft_fr;

        $course->save();

        return redirect()->route('courses.index')
            ->with([
                'success' => 'Course updated for editing successfully',
                'course' => $course,
            ]);
    }

}

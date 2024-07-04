<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:course-list|course-create|course-edit|course-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:course-create', ['only' => ['create','store']]);
        // $this->middleware('permission:course-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:course-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $courses = Course::all();
        return view('back.pages.courses.index', [
            'courses' => $courses,
            'page_title' => "Courses",
            'page_code' => ["tr2023", "crs2023"],
            'breadcrumb' => [
                ['name' => 'home', 'route'=> 'home'],
                ['name' => 'Courses', 'route'=> '']
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $categories = CourseCategory::all();
        return view('back.pages.courses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate([
            'name_en' => 'required',
            'name_fr' => 'required',
            'description_en' => 'required',
            'description_fr' => 'required',
            'url_tag' => 'required',
        ]);

        Course::create($request->all());

        return redirect()->route('back.pages.courses.index')
                        ->with('success','Training Topic created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course): View
    {
        return view('back.pages.courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course): View
    {
        return view('back.pages.courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course): RedirectResponse
    {
         request()->validate([
            'name_en' => 'required',
            'detail' => 'required',
        ]);

        $course->update($request->all());

        return redirect()->route('back.pages.courses.index')
                        ->with('success','Training Topic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course): RedirectResponse
    {
        $course->delete();

        return redirect()->route('back.pages.courses.index')
                        ->with('success','Training Topic deleted successfully');
    }
}

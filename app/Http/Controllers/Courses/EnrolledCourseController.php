<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\EnrolledCourse;
use Illuminate\Http\Request;

class EnrolledCourseController extends Controller
{
    public function index()
    {
         $enrolledCourse = EnrolledCourse::all();
        return response()->json( $enrolledCourse);
    }

    public function show($id)
    {
         $enrolledCourse =  EnrolledCourse::find($id);

        if (! $enrolledCourse) {
            return response()->json(['message' => ' Enrolled Course module not found'], 404);
        }

        return response()->json( $enrolledCourse);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'status' => 'boolean',
        ]);

         $enrolledCourse =  EnrolledCourse::create($request->all());

        return response()->json( $enrolledCourse, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'status' => 'boolean',
        ]);

         $enrolledCourse =  EnrolledCourse::find($id);

        if (! $enrolledCourse) {
            return response()->json(['message' => ' Enrolled Course module not found'], 404);
        }

         $enrolledCourse->update($request->all());

        return response()->json( $enrolledCourse);
    }

    public function destroy($id)
    {
         $enrolledCourse =  EnrolledCourse::find($id);

        if (! $enrolledCourse) {
            return response()->json(['message' => ' Enrolled Course module not found'], 404);
        }

         $enrolledCourse->delete();

        return response()->json(['message' => ' Enrolled Course module deleted']);
    }

}

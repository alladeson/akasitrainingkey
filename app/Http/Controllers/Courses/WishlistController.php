<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::all();
        return response()->json($wishlist);
    }

    public function show($id)
    {
        $wishlist = Wishlist::find($id);

        if (!$wishlist) {
            return response()->json(['message' => 'Course wishlist not found'], 404);
        }

        return response()->json($wishlist);
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|exists:students,id',
            'status' => 'required|boolean',
        ]);

        $wishlist = Wishlist::create($request->all());

        return response()->json($wishlist, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|exists:students,id',
            'status' => 'required|boolean',
        ]);

        $wishlist = Wishlist::find($id);

        if (!$wishlist) {
            return response()->json(['message' => 'Course wishlist not found'], 404);
        }

        $wishlist->update($request->all());

        return response()->json($wishlist);
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::find($id);

        if (!$wishlist) {
            return response()->json(['message' => 'Course wishlist not found'], 404);
        }

        $wishlist->delete();

        return response()->json(['message' => 'Course wishlist deleted']);
    }

}

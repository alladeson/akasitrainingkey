<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $vendor = Vendor::all();
        return response()->json($vendor);
    }

    public function show($id)
    {
        $vendor = Vendor::find($id);

        if (!$vendor) {
            return response()->json(['message' => 'Course vendor not found'], 404);
        }

        return response()->json($vendor);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|unique:vendors',
            'name_fr' => 'nullable|unique:vendors',
            'description_en' => 'nullable',
            'description_fr' => 'nullable',
            'url_tag' => 'required|unique:vendors',
        ]);

        $vendor = Vendor::create($request->all());

        return response()->json($vendor, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_en' => 'required|unique:vendors,name_en,' . $id,
            'name_fr' => 'nullable|unique:vendors,name_fr,' . $id,
            'description_en' => 'nullable',
            'description_fr' => 'nullable',
            'url_tag' => 'required|unique:vendors,url_tag,' . $id,
        ]);

        $vendor = Vendor::find($id);

        if (!$vendor) {
            return response()->json(['message' => 'Course vendor not found'], 404);
        }

        $vendor->update($request->all());

        return response()->json($vendor);
    }

    public function destroy($id)
    {
        $vendor = Vendor::find($id);

        if (!$vendor) {
            return response()->json(['message' => 'Course vendor not found'], 404);
        }

        $vendor->delete();

        return response()->json(['message' => 'Course vendor deleted']);
    }

}

<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index()
    {
        $courseGoals = Certification::all();
        return response()->json($courseGoals);
    }

    public function show($id)
    {
        $certification = Certification::find($id);

        if (!$certification) {
            return response()->json(['message' => 'Certification not found'], 404);
        }

        return response()->json($certification);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|unique:certifications',
            'name_fr' => 'required|unique:certifications',
            'description_en' => 'nullable',
            'description_fr' => 'nullable',
            'fees_euro' => 'nullable|numeric',
            'fees_fcfa' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
            'fees_description_en' => 'nullable',
            'fees_description_fr' => 'nullable',
            'url_tag' => 'required|unique:certifications',
        ]);

        $certification = Certification::create($request->all());

        return response()->json($certification, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_en' => 'required|unique:certifications,name_en,' . $id,
            'name_fr' => 'nullable|unique:certifications,name_en,' . $id,
            'url_tag' => 'required|unique:certifications,url_tag,'. $id,
            'description_en' => 'nullable',
            'description_fr' => 'nullable',
            'fees_euro' => 'nullable|numeric',
            'fees_fcfa' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
            'fees_description_en' => 'nullable',
            'fees_description_fr' => 'nullable',

        ]);

        $certification = Certification::find($id);

        if (!$certification) {
            return response()->json(['message' => 'Certification not found'], 404);
        }

        $certification->update($request->all());

        return response()->json($certification);
    }

    public function destroy($id)
    {
        $certification = Certification::find($id);

        if (!$certification) {
            return response()->json(['message' => 'Certification not found'], 404);
        }

        $certification->delete();

        return response()->json(['message' => 'Certification deleted']);
    }


}

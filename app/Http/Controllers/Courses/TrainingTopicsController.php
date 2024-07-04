<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\TrainingTopic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TrainingTopicsController extends Controller
{
    public function index()
    {
        return view('back.pages.training-topics.index', [
            'page_title' => "List of Training Topic",
            'page_code' => ["settings", "topics", ""],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Training Topics', 'route' => ''],
            ],
        ]);
    }

    public function datatable(Request $request)
    {
        return response()->json(TrainingTopic::all());
    }

    public function show($id)
    {
        $topic = TrainingTopic::find($id);

        if (!$topic) {
            return response()->json(['message' => 'Training Topic not found'], 404);
        }

        return response()->json($topic);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        // Render create view
        return view('back.pages.training-topics.create', [
            'page_title' => "Create Topic",
            'page_code' => ["settings", "topics", ""],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Training Topics', 'route' => 'training_topics.index'],
                ['name' => 'Create', 'route' => ''],
            ],
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|unique:training_topics',
            'name_fr' => 'nullable|unique:training_topics',
            'description_en' => 'nullable',
            'description_fr' => 'nullable',
            'url_tag' => 'required|unique:training_topics',
        ]);

        $topic = TrainingTopic::create($request->all());

        return redirect()->route('training_topics.index')
            ->with(['success' => 'Topic created successfully']);
    }

    public function edit($id)
    {
        $topic = TrainingTopic::find($id);
        if (!$topic) {
            return redirect()->route('training_topics.index')
                ->with(['error' => 'Topic not found']);
        }
        // Render edit view
        return view('back.pages.training-topics.create', [
            'topic' => $topic,
            'page_title' => "Edit Topic",
            'page_code' => ["settings", "topics", ""],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Training Topics', 'route' => 'training_topics.index'],
                ['name' => 'Edit', 'route' => ''],
            ],
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_en' => 'required|unique:training_topics,name_en,' . $id,
            'name_fr' => 'nullable|unique:training_topics,name_fr,' . $id,
            'description_en' => 'nullable',
            'description_fr' => 'nullable',
            'url_tag' => 'required|unique:training_topics,url_tag,' . $id,
        ]);

        $topic = TrainingTopic::find($id);
        if (!$topic) {
            return redirect()->route('training_topics.index')
                ->with(['error' => 'Topic not found']);
        }

        $topic->update($request->all());

        return redirect()->route('training_topics.index')
            ->with(['success' => 'Topic updated successfully']);
    }

    public function destroy($id)
    {
        $topic = TrainingTopic::find($id);

        if (!$topic) {
            return redirect()->route('training_topics.index')
                ->with(['error' => 'Topic not found']);
        }

        try {
            $topic->delete();
        } catch (Exception $exception) {
            return redirect()->route('training_topics.index')
                ->with('error', 'an error occurred while deleting the topic, it is probably already associated with other data.');
        }
        return redirect()->route('training_topics.index')
            ->with(['success' => 'Topic deleted successfully']);
    }

    public function performTopicUrlTag(Request $request)
    {
        $topic_name = $request->get('topic_name');
        return response()->json(['url_tag' => perform_course_url_tag($topic_name)]);
    }

}

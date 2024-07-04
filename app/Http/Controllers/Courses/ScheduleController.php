<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Location;
use App\Models\Schedule;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function index(Request $request): View
    {
        return view('back.pages.schedules.index', [
            'courses' => get_courses_with_categories($request, 'draft', '!='),
            'page_title' => "List of Schedules",
            'page_code' => ["trainings", "schedules", ""],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Schedules', 'route' => ''],
            ],
        ]);
    }

    public function datatable(Request $request)
    {
        $schedules = get_schedules_by_filter($request, true);
        if (!$schedules) {
            return response()->json(['message' => 'Schedule not found'], 404);
        }

        return response()->json($schedules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): View
    {
        return view('back.pages.schedules.create', [
            'courses' => get_courses_with_categories($request, 'draft', '!='),
            'locations' => Location::all(),
            'page_title' => "Create Schedule",
            'page_code' => ["trainings", "schedules", ""],
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Schedules', 'route' => 'schedules.index'],
                ['name' => 'Create', 'route' => ''],
            ],
        ]);
    }

    public function show($id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return response()->json(['message' => 'Course schedule not found'], 404);
        }

        return response()->json($schedule);
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'started_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:started_date',
            'started_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s|after:started_time',
            'location_en' => 'required',
            'location_fr' => 'nullable',
            'description_en' => 'nullable|string',
            'description_fr' => 'nullable|string',
            'amount_euro' => 'nullable|numeric',
            'amount_fcfa' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
            'time_zone' => 'nullable|string',
        ]);

        $schedule = Schedule::create($request->all());

        return redirect()->route('schedules.create')
            ->with([
                'success' => 'Schedule created successfully',
                'schedule' => $schedule
            ]);
    }

    public function edit($id)
    {
        $schedule = Schedule::find($id);

        return view('back.pages.schedules.create', [
            'courses' => Course::where('status_en', '!=', Course::status_draft_en)->get(),
            'locations' => Location::all(),
            'page_title' => "Edit Schedule",
            'page_code' => ["trainings", "schedules", ""],
            'schedule' => $schedule,
            'breadcrumb' => [
                ['name' => 'Dashboard', 'route' => 'dashboard'],
                ['name' => 'Courses', 'route' => 'schedules.index'],
                ['name' => 'Edit', 'route' => ''],
            ],
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'started_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:started_date',
            'started_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s|after:started_time',
            'location_en' => 'required',
            'location_fr' => 'nullable',
            'description_en' => 'nullable|string',
            'description_fr' => 'nullable|string',
            'amount_euro' => 'nullable|numeric',
            'amount_fcfa' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
            'time_zone' => 'nullable|string',
        ]);

        $schedule = Schedule::find($id);

        if (!$schedule) {
            return redirect()->route('schedules.index')
                ->with(['error' => 'Schedule not found']);
        }

        $schedule->update($request->all());

        return redirect()->route('schedules.index')
            ->with([
                'success' => 'Schedule updated successfully',
                'schedule' => $schedule
            ]);
    }

    public function destroy($id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return redirect()->route('schedules.index')
                ->with(['error' => 'Schedule not found']);
        }

        try {
            $schedule->delete();
        } catch (Exception $exception) {
            return redirect()->route('schedules.index')
                ->with('error', 'an error occurred while deleting the schedule, it is probably already associated with other data.');
        }
        return redirect()->route('schedules.index')
            ->with([
                'success' => 'Schedule deleted successfully',
                'schedule' => $schedule
            ]);
    }

    public function enablePublishing(Request $request, $id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return redirect()->route('schedules.index')
                ->with(['error' => 'Course Schedule not found']);
        }

        $schedule->published = true;

        $schedule->save();

        return redirect()->route('schedules.index')
            ->with([
                'success' => 'Schedule sent for review successfully',
                'schedule' => $schedule
            ]);
    }

    public function publishCourse(Request $request, $id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return redirect()->route('schedules.index')
                ->with(['error' => 'Course Schedule not found']);
        }

        $schedule->status = Schedule::status_published;

        $schedule->save();

        return redirect()->route('schedules.index')
            ->with([
                'success' => 'Schedule published successfully',
                'schedule' => $schedule
            ]);
    }

    public function enableEditing(Request $request, $id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return redirect()->route('schedules.index')
                ->with(['error' => 'Course Schedule not found']);
        }

        $schedule->published = false;
        $schedule->status = Schedule::status_draft;

        $schedule->save();

        return redirect()->route('schedules.index')
            ->with([
                'success' => 'Schedule updated for editing successfully',
                'schedule' => $schedule
            ]);
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Models\Order;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function gotToDashboard(Request $request) {
        if (Auth::user()->hasRole('Student'))
            return redirect()->route('profile.edit');
        else
        return redirect()->route('dashboard');
    }

    public function dashboard(Request $request)
    {

        return view("back.pages.dashboard", [
            'page_title' => 'Dashboard',
            'page_code' => ["dash2023", "", ""],
            'courses' => get_courses_with_categories($request),
            'completed_orders' => Order::where('status_en', Order::approved_en)->get(),
            'students' => Student::all(),
            'instructors' => Instructor::all(),
            'breadcrumb' => [
                ['name' => 'home', 'route' => 'home'],
                ['name' => 'Dashboard', 'route' => '']
            ],
        ]);
    }
}

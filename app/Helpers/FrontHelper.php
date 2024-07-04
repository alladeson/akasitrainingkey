<?php
use App\Http\Controllers\CurrencyConverterController;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseGoal;
use App\Models\Document;
use App\Models\IncludedMaterial;
use App\Models\Invoice;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\PreRequisite;
use App\Models\Schedule;
use App\Models\TargetedAudience;
use App\Models\EnrolledCourse;
use App\Models\Instructor;
use App\Models\Order;
use App\Models\Student;
use App\Models\Wishlist;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




if (!function_exists('get_categories_of_training_topic')) {
    function get_categories_of_training_topic($topic_id)
    {
        return CourseCategory::where('training_topic_id', $topic_id)->get();
    }
}

if (!function_exists('get_courses_by_filter')) {
    function get_courses_by_filter(Request $request)
    {
        $query = DB::table('courses');
        if ($request->has('search') && $request->get('search')) {
            $query->where('name_en', 'like', '%' . $request->get('search') . '%');
            // $query->orWhereIn('name_fr', $request->get('search'));
        }
        if ($request->has('categories') && $request->get('categories')) {
            $query->whereIn('category_id', $request->get('categories'));
        }
        if ($request->has('certifications') && $request->get('certifications')) {
            $query->whereIn('certification_id', $request->get('certifications'));
        }
        if ($request->has('vendors') && $request->get('vendors')) {
            $query->whereIn('vendor_id', $request->get('vendors'));
        }
        if ($request->has('learning_mode') && $request->get('learning_mode')) {
            $query->whereIn('learning_mode_en', $request->get('learning_mode'));
        }
        if ($request->has('level_all') && $request->get('level_all')) {
            $query->whereIn('level_en', $request->get('level_all'));
        } else if ($request->has('levels') && $request->get('levels')) {
            $query->whereIn('level_en', $request->get('levels'));
        }
        if ($request->has('prices') && $request->get('prices')) {
            if ($request->get('prices') == 'Free')
                $query->where('price_euro', '=', 0);
            if ($request->get('prices') == 'Paid')
                $query->where('price_euro', '>', 0);
        }
        if ($request->has('price_all') && $request->get('price_all')) {
            $query->where('price_euro', '>=', 0);
        }
        if ($request->has('durations') && $request->get('durations')) {
            $query->whereIn('duration_en', $request->get('durations'));

            if ($request->has('duration_hours') && $request->get('duration_hours')) {
                $query->orWhere('duration_type', 'hour')
                    ->where('duration_number', '<', 24)
                    ->where('published', 1);
            }

            if ($request->has('duration_weeks') && $request->get('duration_weeks')) {
                $query->orWhere('duration_type', 'day')
                    ->where('duration_number', '>', 5);
            }
        }
        //
        if (!$request->get('durations')) {
            if ($request->has('duration_hours') && $request->get('duration_hours')) {
                $query->where('duration_type', 'hour')
                    ->where('duration_number', '<', 24);
                //
                if ($request->has('duration_weeks') && $request->get('duration_weeks')) {
                    $query->orWhere('duration_type', 'day')
                        ->where('duration_number', '>', 5);
                }
            } else if ($request->has('duration_weeks') && $request->get('duration_weeks')) {
                $query->where('duration_type', 'day')
                    ->where('duration_number', '>', 5);
            }
        }
        if ($request->has('filter_status') && $request->get('filter_status')) {
            if ($request->get('filter_status') == Course::status_new_en || $request->get('filter_status') == Course::status_popularity_en)
                $query->where('status_en', $request->get('filter_status'));

            if ($request->get('filter_status') == 'highest_price')
                $query->orderBy('price_euro', 'DESC');

            if ($request->get('filter_status') == 'lowest_price')
                $query->orderBy('price_euro', 'ASC');
        }

        return $query
            ->where('status_en', '!=', Course::status_draft_en)
            ->get();
    }
}

if (!function_exists('get_schedules_by_filter')) {
    function get_schedules_by_filter(Request $request, $back = false)
    {
        $query = DB::table('schedules')
            ->join('courses', 'courses.id', '=', 'schedules.course_id')
            ->select('schedules.*', 'courses.name_en as course_name_en', 'courses.name_fr as course_name_fr', 'courses.description_en as course_description_en', 'courses.description_fr as course_description_fr', 'courses.url_tag', 'courses.price_euro', 'courses.price_fcfa');
        if ($request->has('search') && $request->get('search')) {
            $query->where('courses.name_en', 'like', '%' . $request->get('search') . '%');
            // $query->orWhereIn('name_fr', $request->get('search'));
        }
        if ($request->has('categories') && $request->get('categories')) {
            $query->whereIn('courses.category_id', $request->get('categories'));
        }
        if ($request->has('certifications') && $request->get('certifications')) {
            $query->whereIn('courses.certification_id', $request->get('certifications'));
        }
        if ($request->has('vendors') && $request->get('vendors')) {
            $query->whereIn('courses.vendor_id', $request->get('vendors'));
        }
        if ($request->has('learning_mode') && $request->get('learning_mode')) {
            $query->whereIn('courses.learning_mode_en', $request->get('learning_mode'));
        }
        if ($request->has('level_all') && $request->get('level_all')) {
            $query->whereIn('courses.level_en', $request->get('level_all'));
        } else if ($request->has('levels') && $request->get('levels')) {
            $query->whereIn('courses.level_en', $request->get('levels'));
        }
        if ($request->has('prices') && $request->get('prices')) {
            if ($request->get('prices') == 'Free')
                $query->where('courses.price_euro', '=', 0);
            if ($request->get('prices') == 'Paid')
                $query->where('courses.price_euro', '>', 0);
        }
        if ($request->has('price_all') && $request->get('price_all')) {
            $query->where('courses.price_euro', '>=', 0);
        }
        if ($request->has('durations') && $request->get('durations')) {
            $query->whereIn('courses.duration_en', $request->get('durations'));
            //
            if ($request->has('duration_hours') && $request->get('duration_hours')) {
                $query->orWhere('courses.duration_type', 'hour')
                    ->where('courses.duration_number', '<', 24)
                    ->where('courses.published', 1);
            }
            //
            if ($request->has('duration_weeks') && $request->get('duration_weeks')) {
                $query->orWhere('courses.duration_type', 'day')
                    ->where('courses.duration_number', '>', 5);
            }
        }
        //
        if (!$request->get('durations')) {
            if ($request->has('duration_hours') && $request->get('duration_hours')) {
                $query->where('courses.duration_type', 'hour')
                    ->where('courses.duration_number', '<', 24);
                //
                if ($request->has('duration_weeks') && $request->get('duration_weeks')) {
                    $query->orWhere('courses.duration_type', 'day')
                        ->where('courses.duration_number', '>', 5);
                }
            } else if ($request->has('duration_weeks') && $request->get('duration_weeks')) {
                $query->where('courses.duration_type', 'day')
                    ->where('courses.duration_number', '>', 5);
            }
        }
        if ($request->has('filter_status') && $request->get('filter_status')) {
            if ($request->get('filter_status') == Course::status_new_en || $request->get('filter_status') == Course::status_popularity_en)
                $query->where('courses.status_en', $request->get('filter_status'));

            if ($request->get('filter_status') == 'highest_price')
                $query->orderBy('courses.price_euro', 'DESC');

            if ($request->get('filter_status') == 'lowest_price')
                $query->orderBy('courses.price_euro', 'ASC');
        }
        if ($request->has('course_id') && $request->get('course_id')) {
            $query->where('schedules.course_id', $request->get('course_id'));
        }
        if (!Auth::check() || Auth::user()->hasRole('Student')) {
            $query->where('schedules.status', Schedule::status_published);
        }
        if ($back) {
            if (!Auth::user()->hasRole('Admin')) {
                $query->where('courses.created_by', Auth::user()->id);
            }
        } else {
            $query->where('schedules.status', '!=', Schedule::status_draft);
        }
        return $query->where('schedules.end_date', '>=', now())
            ->where('courses.status_en', '!=', Course::status_draft_en)
            ->orderBy('schedules.started_date')
            ->get();
    }
}

if (!function_exists('get_user_profile')) {
    function get_user_profile()
    {
        if (Auth::user()->hasRole('Student')) {
            return Student::where('user_id', Auth::user()->id)->first();
        }
        if (Auth::user()->hasRole('Instructor')) {
            return Instructor::where('user_id', Auth::user()->id)->first();
        }
    }
}

if (!function_exists('get_enrolled_course')) {
    function get_enrolled_course()
    {
        if (Auth::user()->hasRole('Student')) {
            $student = Student::where('user_id', Auth::user()->id)->first();
            return DB::table('enrolled_courses')
                ->join('courses', 'courses.id', '=', 'enrolled_courses.course_id')
                ->join('students', 'students.id', '=', 'enrolled_courses.student_id')
                ->select('enrolled_courses.*', 'courses.name_en', 'courses.name_fr', 'courses.level_en', 'courses.level_fr', 'courses.duration_en', 'courses.duration_fr', 'courses.learning_mode_en', 'courses.learning_mode_fr', 'courses.description_en', 'courses.description_fr', 'courses.url_tag', 'courses.price_euro', 'courses.price_fcfa')
                ->where('students.id', '=', $student->id)
                ->get();
        } else {
            return [];
        }
    }
}

if (!function_exists('count_enrolled_course')) {
    function count_enrolled_course()
    {
        if (Auth::user()->hasRole('Student')) {
            $student = Student::where('user_id', Auth::user()->id)->first();
            return DB::table('enrolled_courses')
                ->join('courses', 'courses.id', '=', 'enrolled_courses.course_id')
                ->join('students', 'students.id', '=', 'enrolled_courses.student_id')
                ->where('students.id', '=', $student->id)
                ->count();

        } else {
            return 0;
        }
    }
}

if (!function_exists('get_wishlist')) {
    function get_wishlist()
    {
        if (Auth::user()->hasRole('Student')) {
            $student = Student::where('user_id', Auth::user()->id)->first();
            return DB::table('courses')
                ->join('wishlists', 'courses.id', '=', 'wishlists.course_id')
                ->join('students', 'students.id', '=', 'wishlists.student_id')
                ->select('courses.*', 'wishlists.id as wishlists_id', 'students.id as student_id')
                ->where('students.id', $student->id)
                ->where('wishlists.status', true)
                ->get();
        } else {
            return [];
        }
    }
}

if (!function_exists('count_wishlist')) {
    function count_wishlist()
    {
        if (Auth::user()->hasRole('Student')) {
            $student = Student::where('user_id', Auth::user()->id)->first();
            return Wishlist::where(['student_id' => $student->id, 'status' => true])->count();
        } else {
            return 0;
        }
    }
}

if (!function_exists('get_cart')) {
    function get_cart()
    {
        if (Auth::check() && Auth::user()->hasRole('Student')) {
            $student = Student::where('user_id', Auth::user()->id)->first();
            return DB::table('orders')
                ->join('students', 'students.id', '=', 'orders.student_id')
                ->join('schedules', 'schedules.id', '=', 'orders.schedule_id')
                ->join('courses', 'courses.id', '=', 'schedules.course_id')
                ->select(
                    'orders.*',
                    'courses.id as course_id',
                    'courses.code as course_code',
                    'courses.name_en as course_name_en',
                    'courses.name_fr as course_name_fr',
                    'courses.url_tag as course_url_tag',
                    'courses.price_euro as course_price_euro',
                    'courses.price_fcfa as course_price_fcfa',
                    'schedules.started_date',
                    'schedules.end_date',
                    'schedules.started_time',
                    'schedules.end_time',
                    'schedules.location_en',
                    'schedules.location_fr',
                )
                ->where('students.id', $student->id)
                ->where('orders.status_en', Order::pending_en)
                ->get();
        } else {
            return [];
        }
    }
}

if (!function_exists('get_completed_orders_after_payment')) {
    function get_completed_orders_after_payment($orders_id)
    {
        if (Auth::check() && Auth::user()->hasRole('Student')) {
            $student = Student::where('user_id', Auth::user()->id)->first();
            return DB::table('orders')
                ->join('students', 'students.id', '=', 'orders.student_id')
                ->join('schedules', 'schedules.id', '=', 'orders.schedule_id')
                ->join('courses', 'courses.id', '=', 'schedules.course_id')
                ->select(
                    'orders.*',
                    'courses.id as course_id',
                    'courses.code as course_code',
                    'courses.name_en as course_name_en',
                    'courses.name_fr as course_name_fr',
                    'courses.url_tag as course_url_tag',
                    'courses.price_euro as course_price_euro',
                    'courses.price_fcfa as course_price_fcfa',
                    'schedules.started_date',
                    'schedules.end_date',
                    'schedules.started_time',
                    'schedules.end_time',
                    'schedules.location_en',
                    'schedules.location_fr',
                )
                ->where('students.id', $student->id)
                ->where('orders.status_en', Order::approved_en)
                ->whereIn('orders.id', $orders_id)
                ->get();
        } else {
            return [];
        }
    }
}

if (!function_exists('format_amount')) {
    function format_amount($amount_euro, $facture = false)
    {
        if (!$facture && Cookie::get('currency') && Cookie::get('currency') == 'fcfa') {
            $amount = amount_converter_from_euro_to_xof($amount_euro);
            return number_format($amount, 0, ',', ' ') . ' FCFA';
        }

        return number_format($amount_euro, 2, ',', '') . ' €';
    }
}

if (!function_exists('currency_converter_from_euro_to_xof')) {
    function currency_converter_from_euro_to_xof()
    {
        $converter = new CurrencyConverterController('eur', 'xof');
        return $converter->response;
    }
}

if (!function_exists('amount_converter_from_euro_to_xof')) {
    function amount_converter_from_euro_to_xof($amount_euro)
    {
        // Retrieve converter from cookies
        $converter = Cookie::get('currency_converter');
        // Retrieve converter from google
        if (!$converter)
            $converter = currency_converter_from_euro_to_xof();
        // Return amount converted
        $amount = $converter * $amount_euro;
        //
        if (strlen(intval($converter) . '') == 3 || env('APP_ENV') == 'production') {
            return intval($amount);
        }

        return intval(($converter * $amount_euro) / 100);
    }
}

if (!function_exists('get_cart_subtotal_euro')) {
    function get_cart_subtotal_euro()
    {
        if (Auth::check() && Auth::user()->hasRole('Student')) {
            $student = Student::where('user_id', Auth::user()->id)->first();
            return DB::table('orders')
                ->join('students', 'students.id', '=', 'orders.student_id')
                ->join('schedules', 'schedules.id', '=', 'orders.schedule_id')
                ->join('courses', 'courses.id', '=', 'schedules.course_id')
                ->select('orders.*', 'courses.id as course_id', 'courses.name_en as course_name_en', 'courses.name_fr as course_name_fr', 'courses.url_tag as course_url_tag', 'courses.price_euro as course_price_euro', 'courses.price_fcfa as course_price_fcfa')
                ->where('students.id', $student->id)
                ->where('orders.status_en', Order::pending_en)
                ->sum('orders.amount_total_euro');
        } else {
            return 0;
        }
    }
}

if (!function_exists('get_cart_subtotal_fcfa')) {
    function get_cart_subtotal_fcfa()
    {
        return amount_converter_from_euro_to_xof(get_cart_subtotal_euro());
    }
}

if (!function_exists('count_completed_order')) {
    function count_completed_order()
    {
        if (Auth::user()->hasRole('Student')) {
            $student = Student::where('user_id', Auth::user()->id)->first();
            return Order::where(['student_id' => $student->id, 'status_en' => Order::approved_en])->count();
        } else {
            return 0;
        }
    }
}
if (!function_exists('get_completed_orders')) {
    function get_completed_orders()
    {
        if (Auth::user()->hasRole('Student')) {
            $student = Student::where('user_id', Auth::user()->id)->first();
            return DB::table('orders')
                ->join('students', 'students.id', '=', 'orders.student_id')
                ->join('schedules', 'schedules.id', '=', 'orders.schedule_id')
                ->join('courses', 'courses.id', '=', 'schedules.course_id')
                ->select(
                    'orders.*',
                    'courses.id as course_id',
                    'courses.code as course_code',
                    'courses.name_en as course_name_en',
                    'courses.name_fr as course_name_fr',
                    'courses.url_tag as course_url_tag',
                    'courses.price_euro as course_price_euro',
                    'courses.price_fcfa as course_price_fcfa',
                    'schedules.started_date',
                    'schedules.end_date',
                    'schedules.started_time',
                    'schedules.end_time',
                    'schedules.location_en',
                    'schedules.location_fr',
                )
                ->where('students.id', $student->id)
                ->where('orders.status_en', Order::approved_en)
                ->get();
        } else {
            return [];
        }
    }
}

if (!function_exists('get_schedules_all')) {
    function get_schedules_all()
    {
        $query = DB::table('schedules')
            ->join('courses', 'courses.id', '=', 'schedules.course_id')
            ->select('schedules.*', 'courses.name_en as course_name_en', 'courses.name_fr as course_name_fr', 'courses.description_en as course_description_en', 'courses.description_fr as course_description_fr', 'courses.url_tag', 'courses.price_euro', 'courses.price_fcfa')
            ->where('schedules.end_date', '>=', now());
        if (!Auth::check() || Auth::user()->hasRole('Student')) {
            $query->where('schedules.status', Schedule::status_published);
        }
        return $query->where('courses.status_en', '!=', Course::status_draft_en)
            ->where('schedules.status', '!=', Schedule::status_draft)
            ->orderBy('schedules.started_date')
            ->get();
    }
}

if (!function_exists('get_schedules_by_course')) {
    function get_schedules_by_course($course_id)
    {
        $query = DB::table('schedules')
            ->join('courses', 'courses.id', '=', 'schedules.course_id')
            ->select('schedules.*');
        if (!Auth::check() || Auth::user()->hasRole('Student')) {
            $query->where('schedules.status', Schedule::status_published);
        }
        return $query->where('courses.id', $course_id)
            ->where('courses.status_en', '!=', Course::status_draft_en)
            ->where('schedules.end_date', '>=', now())
            ->where('schedules.status', '!=', Schedule::status_draft)
            ->orderBy('schedules.started_date')
            ->get();
    }
}

if (!function_exists('get_course_data')) {
    function get_course_data($id) // $id = course id
    {
        $course_data = [];
        // Recuperation du cours
        $course = Course::where('id', $id)->first();
        if ($course) {
            $course_data['course'] = $course;
            // Récupération de la catégorie du cours
            $category = CourseCategory::where('id', $course->category_id)->first();
            $course_data['category'] = $category;
            // Récupération des objectifs du cours
            $goals = CourseGoal::where('course_id', $id)->get();
            $course_data['goals'] = $goals;
            // Récupération du Targeted Audience
            $targeted_audiences = TargetedAudience::where('course_id', $id)->get();
            $course_data['targeted_audiences'] = $targeted_audiences;
            // Récupération du Pre-Requisite
            $pre_requisites = PreRequisite::where('course_id', $id)->get();
            $course_data['pre_requisites'] = $pre_requisites;
            // Récupération du Materials Included
            $included_materials = IncludedMaterial::where('course_id', $id)->get();
            $course_data['included_materials'] = $included_materials;
            // Récupération des modules du cours
            $modules = Module::where('course_id', $id)->get();
            $course_data['modules'] = $modules;
            // Récupératon des leçons pour chaque modules
            $module_lessons = [];
            foreach ($modules as $module) {
                $module_lessons['module_' . $module->id] = Lesson::where('module_id', $module->id)->get();
            }
            $course_data['module_lessons'] = $module_lessons;

            // Renvoie des données du cours
            return $course_data;
        } else {
            return null;
        }
    }
}

if (!function_exists('perform_links2')) {

    function perform_links2($links)
    {

        return str_replace("/", "_", $links);

    }

}

if (!function_exists('perform_links')) {

    function perform_links($links)
    {


        $transliteration = array(
            'Ĳ' => 'I',
            'Ö' => 'O',
            'Œ' => 'O',
            'Ü' => 'U',
            'ä' => 'a',
            'æ' => 'a',
            'ĳ' => 'i',
            'ö' => 'o',
            'œ' => 'o',
            'ü' => 'u',
            'ß' => 's',
            'ſ' => 's',
            'À' => 'A',
            'Á' => 'A',
            'Â' => 'A',
            'Ã' => 'A',
            'Ä' => 'A',
            'Å' => 'A',
            'Æ' => 'A',
            'Ā' => 'A',
            'Ą' => 'A',
            'Ă' => 'A',
            'Ç' => 'C',
            'Ć' => 'C',
            'Č' => 'C',
            'Ĉ' => 'C',
            'Ċ' => 'C',
            'Ď' => 'D',
            'Đ' => 'D',
            'È' => 'E',
            'É' => 'E',
            'Ê' => 'E',
            'Ë' => 'E',
            'Ē' => 'E',
            'Ę' => 'E',
            'Ě' => 'E',
            'Ĕ' => 'E',
            'Ė' => 'E',
            'Ĝ' => 'G',
            'Ğ' => 'G',
            'Ġ' => 'G',
            'Ģ' => 'G',
            'Ĥ' => 'H',
            'Ħ' => 'H',
            'Ì' => 'I',
            'Í' => 'I',
            'Î' => 'I',
            'Ï' => 'I',
            'Ī' => 'I',
            'Ĩ' => 'I',
            'Ĭ' => 'I',
            'Į' => 'I',
            'İ' => 'I',
            'Ĵ' => 'J',
            'Ķ' => 'K',
            'Ľ' => 'K',
            'Ĺ' => 'K',
            'Ļ' => 'K',
            'Ŀ' => 'K',
            'Ł' => 'L',
            'Ñ' => 'N',
            'Ń' => 'N',
            'Ň' => 'N',
            'Ņ' => 'N',
            'Ŋ' => 'N',
            'Ò' => 'O',
            'Ó' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ø' => 'O',
            'Ō' => 'O',
            'Ő' => 'O',
            'Ŏ' => 'O',
            'Ŕ' => 'R',
            'Ř' => 'R',
            'Ŗ' => 'R',
            'Ś' => 'S',
            'Ş' => 'S',
            'Ŝ' => 'S',
            'Ș' => 'S',
            'Š' => 'S',
            'Ť' => 'T',
            'Ţ' => 'T',
            'Ŧ' => 'T',
            'Ț' => 'T',
            'Ù' => 'U',
            'Ú' => 'U',
            'Û' => 'U',
            'Ū' => 'U',
            'Ů' => 'U',
            'Ű' => 'U',
            'Ŭ' => 'U',
            'Ũ' => 'U',
            'Ų' => 'U',
            'Ŵ' => 'W',
            'Ŷ' => 'Y',
            'Ÿ' => 'Y',
            'Ý' => 'Y',
            'Ź' => 'Z',
            'Ż' => 'Z',
            'Ž' => 'Z',
            'à' => 'a',
            'á' => 'a',
            'â' => 'a',
            'ã' => 'a',
            'ā' => 'a',
            'ą' => 'a',
            'ă' => 'a',
            'å' => 'a',
            'ç' => 'c',
            'ć' => 'c',
            'č' => 'c',
            'ĉ' => 'c',
            'ċ' => 'c',
            'ď' => 'd',
            'đ' => 'd',
            'è' => 'e',
            'é' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'ē' => 'e',
            'ę' => 'e',
            'ě' => 'e',
            'ĕ' => 'e',
            'ė' => 'e',
            'ƒ' => 'f',
            'ĝ' => 'g',
            'ğ' => 'g',
            'ġ' => 'g',
            'ģ' => 'g',
            'ĥ' => 'h',
            'ħ' => 'h',
            'ì' => 'i',
            'í' => 'i',
            'î' => 'i',
            'ï' => 'i',
            'ī' => 'i',
            'ĩ' => 'i',
            'ĭ' => 'i',
            'į' => 'i',
            'ı' => 'i',
            'ĵ' => 'j',
            'ķ' => 'k',
            'ĸ' => 'k',
            'ł' => 'l',
            'ľ' => 'l',
            'ĺ' => 'l',
            'ļ' => 'l',
            'ŀ' => 'l',
            'ñ' => 'n',
            'ń' => 'n',
            'ň' => 'n',
            'ņ' => 'n',
            'ŉ' => 'n',
            'ŋ' => 'n',
            'ò' => 'o',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ø' => 'o',
            'ō' => 'o',
            'ő' => 'o',
            'ŏ' => 'o',
            'ŕ' => 'r',
            'ř' => 'r',
            'ŗ' => 'r',
            'ś' => 's',
            'š' => 's',
            'ť' => 't',
            'ù' => 'u',
            'ú' => 'u',
            'û' => 'u',
            'ū' => 'u',
            'ů' => 'u',
            'ű' => 'u',
            'ŭ' => 'u',
            'ũ' => 'u',
            'ų' => 'u',
            'ŵ' => 'w',
            'ÿ' => 'y',
            'ý' => 'y',
            'ŷ' => 'y',
            'ż' => 'z',
            'ź' => 'z',
            'ž' => 'z',
            'Α' => 'A',
            'Ά' => 'A',
            'Ἀ' => 'A',
            'Ἁ' => 'A',
            'Ἂ' => 'A',
            'Ἃ' => 'A',
            'Ἄ' => 'A',
            'Ἅ' => 'A',
            'Ἆ' => 'A',
            'Ἇ' => 'A',
            'ᾈ' => 'A',
            'ᾉ' => 'A',
            'ᾊ' => 'A',
            'ᾋ' => 'A',
            'ᾌ' => 'A',
            'ᾍ' => 'A',
            'ᾎ' => 'A',
            'ᾏ' => 'A',
            'Ᾰ' => 'A',
            'Ᾱ' => 'A',
            'Ὰ' => 'A',
            'ᾼ' => 'A',
            'Β' => 'B',
            'Γ' => 'G',
            'Δ' => 'D',
            'Ε' => 'E',
            'Έ' => 'E',
            'Ἐ' => 'E',
            'Ἑ' => 'E',
            'Ἒ' => 'E',
            'Ἓ' => 'E',
            'Ἔ' => 'E',
            'Ἕ' => 'E',
            'Ὲ' => 'E',
            'Ζ' => 'Z',
            'Η' => 'I',
            'Ή' => 'I',
            'Ἠ' => 'I',
            'Ἡ' => 'I',
            'Ἢ' => 'I',
            'Ἣ' => 'I',
            'Ἤ' => 'I',
            'Ἥ' => 'I',
            'Ἦ' => 'I',
            'Ἧ' => 'I',
            'ᾘ' => 'I',
            'ᾙ' => 'I',
            'ᾚ' => 'I',
            'ᾛ' => 'I',
            'ᾜ' => 'I',
            'ᾝ' => 'I',
            'ᾞ' => 'I',
            'ᾟ' => 'I',
            'Ὴ' => 'I',
            'ῌ' => 'I',
            'Θ' => 'T',
            'Ι' => 'I',
            'Ί' => 'I',
            'Ϊ' => 'I',
            'Ἰ' => 'I',
            'Ἱ' => 'I',
            'Ἲ' => 'I',
            'Ἳ' => 'I',
            'Ἴ' => 'I',
            'Ἵ' => 'I',
            'Ἶ' => 'I',
            'Ἷ' => 'I',
            'Ῐ' => 'I',
            'Ῑ' => 'I',
            'Ὶ' => 'I',
            'Κ' => 'K',
            'Λ' => 'L',
            'Μ' => 'M',
            'Ν' => 'N',
            'Ξ' => 'K',
            'Ο' => 'O',
            'Ό' => 'O',
            'Ὀ' => 'O',
            'Ὁ' => 'O',
            'Ὂ' => 'O',
            'Ὃ' => 'O',
            'Ὄ' => 'O',
            'Ὅ' => 'O',
            'Ὸ' => 'O',
            'Π' => 'P',
            'Ρ' => 'R',
            'Ῥ' => 'R',
            'Σ' => 'S',
            'Τ' => 'T',
            'Υ' => 'Y',
            'Ύ' => 'Y',
            'Ϋ' => 'Y',
            'Ὑ' => 'Y',
            'Ὓ' => 'Y',
            'Ὕ' => 'Y',
            'Ὗ' => 'Y',
            'Ῠ' => 'Y',
            'Ῡ' => 'Y',
            'Ὺ' => 'Y',
            'Φ' => 'F',
            'Χ' => 'X',
            'Ψ' => 'P',
            'Ω' => 'O',
            'Ώ' => 'O',
            'Ὠ' => 'O',
            'Ὡ' => 'O',
            'Ὢ' => 'O',
            'Ὣ' => 'O',
            'Ὤ' => 'O',
            'Ὥ' => 'O',
            'Ὦ' => 'O',
            'Ὧ' => 'O',
            'ᾨ' => 'O',
            'ᾩ' => 'O',
            'ᾪ' => 'O',
            'ᾫ' => 'O',
            'ᾬ' => 'O',
            'ᾭ' => 'O',
            'ᾮ' => 'O',
            'ᾯ' => 'O',
            'Ὼ' => 'O',
            'ῼ' => 'O',
            'α' => 'a',
            'ά' => 'a',
            'ἀ' => 'a',
            'ἁ' => 'a',
            'ἂ' => 'a',
            'ἃ' => 'a',
            'ἄ' => 'a',
            'ἅ' => 'a',
            'ἆ' => 'a',
            'ἇ' => 'a',
            'ᾀ' => 'a',
            'ᾁ' => 'a',
            'ᾂ' => 'a',
            'ᾃ' => 'a',
            'ᾄ' => 'a',
            'ᾅ' => 'a',
            'ᾆ' => 'a',
            'ᾇ' => 'a',
            'ὰ' => 'a',
            'ᾰ' => 'a',
            'ᾱ' => 'a',
            'ᾲ' => 'a',
            'ᾳ' => 'a',
            'ᾴ' => 'a',
            'ᾶ' => 'a',
            'ᾷ' => 'a',
            'β' => 'b',
            'γ' => 'g',
            'δ' => 'd',
            'ε' => 'e',
            'έ' => 'e',
            'ἐ' => 'e',
            'ἑ' => 'e',
            'ἒ' => 'e',
            'ἓ' => 'e',
            'ἔ' => 'e',
            'ἕ' => 'e',
            'ὲ' => 'e',
            'ζ' => 'z',
            'η' => 'i',
            'ή' => 'i',
            'ἠ' => 'i',
            'ἡ' => 'i',
            'ἢ' => 'i',
            'ἣ' => 'i',
            'ἤ' => 'i',
            'ἥ' => 'i',
            'ἦ' => 'i',
            'ἧ' => 'i',
            'ᾐ' => 'i',
            'ᾑ' => 'i',
            'ᾒ' => 'i',
            'ᾓ' => 'i',
            'ᾔ' => 'i',
            'ᾕ' => 'i',
            'ᾖ' => 'i',
            'ᾗ' => 'i',
            'ὴ' => 'i',
            'ῂ' => 'i',
            'ῃ' => 'i',
            'ῄ' => 'i',
            'ῆ' => 'i',
            'ῇ' => 'i',
            'θ' => 't',
            'ι' => 'i',
            'ί' => 'i',
            'ϊ' => 'i',
            'ΐ' => 'i',
            'ἰ' => 'i',
            'ἱ' => 'i',
            'ἲ' => 'i',
            'ἳ' => 'i',
            'ἴ' => 'i',
            'ἵ' => 'i',
            'ἶ' => 'i',
            'ἷ' => 'i',
            'ὶ' => 'i',
            'ῐ' => 'i',
            'ῑ' => 'i',
            'ῒ' => 'i',
            'ῖ' => 'i',
            'ῗ' => 'i',
            'κ' => 'k',
            'λ' => 'l',
            'μ' => 'm',
            'ν' => 'n',
            'ξ' => 'k',
            'ο' => 'o',
            'ό' => 'o',
            'ὀ' => 'o',
            'ὁ' => 'o',
            'ὂ' => 'o',
            'ὃ' => 'o',
            'ὄ' => 'o',
            'ὅ' => 'o',
            'ὸ' => 'o',
            'π' => 'p',
            'ρ' => 'r',
            'ῤ' => 'r',
            'ῥ' => 'r',
            'σ' => 's',
            'ς' => 's',
            'τ' => 't',
            'υ' => 'y',
            'ύ' => 'y',
            'ϋ' => 'y',
            'ΰ' => 'y',
            'ὐ' => 'y',
            'ὑ' => 'y',
            'ὒ' => 'y',
            'ὓ' => 'y',
            'ὔ' => 'y',
            'ὕ' => 'y',
            'ὖ' => 'y',
            'ὗ' => 'y',
            'ὺ' => 'y',
            'ῠ' => 'y',
            'ῡ' => 'y',
            'ῢ' => 'y',
            'ῦ' => 'y',
            'ῧ' => 'y',
            'φ' => 'f',
            'χ' => 'x',
            'ψ' => 'p',
            'ω' => 'o',
            'ώ' => 'o',
            'ὠ' => 'o',
            'ὡ' => 'o',
            'ὢ' => 'o',
            'ὣ' => 'o',
            'ὤ' => 'o',
            'ὥ' => 'o',
            'ὦ' => 'o',
            'ὧ' => 'o',
            'ᾠ' => 'o',
            'ᾡ' => 'o',
            'ᾢ' => 'o',
            'ᾣ' => 'o',
            'ᾤ' => 'o',
            'ᾥ' => 'o',
            'ᾦ' => 'o',
            'ᾧ' => 'o',
            'ὼ' => 'o',
            'ῲ' => 'o',
            'ῳ' => 'o',
            'ῴ' => 'o',
            'ῶ' => 'o',
            'ῷ' => 'o',
            'А' => 'A',
            'Б' => 'B',
            'В' => 'V',
            'Г' => 'G',
            'Д' => 'D',
            'Е' => 'E',
            'Ё' => 'E',
            'Ж' => 'Z',
            'З' => 'Z',
            'И' => 'I',
            'Й' => 'I',
            'К' => 'K',
            'Л' => 'L',
            'М' => 'M',
            'Н' => 'N',
            'О' => 'O',
            'П' => 'P',
            'Р' => 'R',
            'С' => 'S',
            'Т' => 'T',
            'У' => 'U',
            'Ф' => 'F',
            'Х' => 'K',
            'Ц' => 'T',
            'Ч' => 'C',
            'Ш' => 'S',
            'Щ' => 'S',
            'Ы' => 'Y',
            'Э' => 'E',
            'Ю' => 'Y',
            'Я' => 'Y',
            'а' => 'A',
            'б' => 'B',
            'в' => 'V',
            'г' => 'G',
            'д' => 'D',
            'е' => 'E',
            'ё' => 'E',
            'ж' => 'Z',
            'з' => 'Z',
            'и' => 'I',
            'й' => 'I',
            'к' => 'K',
            'л' => 'L',
            'м' => 'M',
            'н' => 'N',
            'о' => 'O',
            'п' => 'P',
            'р' => 'R',
            'с' => 'S',
            'т' => 'T',
            'у' => 'U',
            'ф' => 'F',
            'х' => 'K',
            'ц' => 'T',
            'ч' => 'C',
            'ш' => 'S',
            'щ' => 'S',
            'ы' => 'Y',
            'э' => 'E',
            'ю' => 'Y',
            'я' => 'Y',
            'ð' => 'd',
            'Ð' => 'D',
            'þ' => 't',
            'Þ' => 'T',
            'ა' => 'a',
            'ბ' => 'b',
            'გ' => 'g',
            'დ' => 'd',
            'ე' => 'e',
            'ვ' => 'v',
            'ზ' => 'z',
            'თ' => 't',
            'ი' => 'i',
            'კ' => 'k',
            'ლ' => 'l',
            'მ' => 'm',
            'ნ' => 'n',
            'ო' => 'o',
            'პ' => 'p',
            'ჟ' => 'z',
            'რ' => 'r',
            'ს' => 's',
            'ტ' => 't',
            'უ' => 'u',
            'ფ' => 'p',
            'ქ' => 'k',
            'ღ' => 'g',
            'ყ' => 'q',
            'შ' => 's',
            'ჩ' => 'c',
            'ც' => 't',
            'ძ' => 'd',
            'წ' => 't',
            'ჭ' => 'c',
            'ხ' => 'k',
            'ჯ' => 'j',
            'ჰ' => 'h'
        );
        $links = str_replace(
            array_keys($transliteration),
            array_values($transliteration),
            $links
        );
        $links = str_replace(" ", "_", $links);
        $links = str_replace("°", "_", $links);
        $links = str_replace("®", "", $links);
        $links = str_replace(":", "", $links);
        $links = str_replace("(", "", $links);
        $links = str_replace(")", "", $links);
        $links = str_replace("[", "", $links);
        $links = str_replace("]", "", $links);
        $links = str_replace("}", "", $links);
        $links = str_replace("{", "", $links);
        return $links;
    }

}

if (!function_exists('perform_course_url_tag')) {

    function perform_course_url_tag($course_name)
    {
        $url_tag = perform_links2(perform_links($course_name));
        return strtolower(str_replace("_", "-", $url_tag));
    }
}

if (!function_exists('save_file_in_doc')) {

    function save_file_in_doc($file_name, $file_path, $entity_id, $entity_name, $document_category_id)
    {
        $doc = new Document();
        $doc->file_name = $file_name;
        $doc->entity_name = $entity_name;
        $doc->entity_id = $entity_id;
        $doc->path = $file_path;
        $doc->document_category_id = $document_category_id;
        $doc->save();
    }
}

if (!function_exists('asset_own')) {

    function asset_own($path)
    {
        if (env('APP_ENV') == 'production') {
            return asset('public/' . $path);
        } else {
            return asset($path);
        }
    }
}

if (!function_exists('get_courses_with_categories')) {
    function get_courses_with_categories(Request $request, $status = null, $operator = "=")
    {
        $query = DB::table('courses')
            ->join('course_categories', 'course_categories.id', '=', 'courses.category_id');
        $query->select(
            'courses.*',
            'course_categories.name_en as category_name_en',
            'course_categories.name_fr as category_name_fr',
            'course_categories.description_en as category_description_en',
            'course_categories.description_fr as category_description_fr',
            'course_categories.url_tag as category_url_tag',
        );
        if ($request->has('category_id') && $request->get('category_id')) {
            $query->orWhere('category_id', $request->get('category_id'));
        }
        if ($request->has('certification_id') && $request->get('certification_id')) {
            $query->orWhere('certification_id', $request->get('certification_id'));
        }
        if ($request->has('vendor_id') && $request->get('vendor_id')) {
            $query->orWhere('vendor_id', $request->get('vendor_id'));
        }
        if (!Auth::user()->hasRole('Admin')) {
            $query->where('created_by', Auth::user()->id);
        }
        if ($status) {
            $query->where('status_en', $operator, $status);
        }
        $query->orderBy('courses.id', 'DESC');
        return $query->get();
    }
}

if (!function_exists('get_goals_with_courses')) {
    function get_goals_with_courses(Request $request)
    {
        $query = DB::table('course_goals')
            ->join('courses', 'courses.id', '=', 'course_goals.course_id');
        $query->select(
            'course_goals.*',
            'courses.name_en as course_name_en',
            'courses.name_fr as course_name_fr',
            'courses.description_en as course_description_en',
            'courses.description_fr as course_description_fr',
            'courses.url_tag as course_url_tag',
            'courses.status_en as course_status_en',
            'courses.status_fr as course_status_fr',
        );
        if ($request->has('course_id') && $request->get('course_id')) {
            $query->where('course_id', $request->get('course_id'));
        }
        $query->orderBy('course_goals.id', 'DESC');
        return $query->get();
    }
}

if (!function_exists('get_targeted_audiences_with_courses')) {
    function get_targeted_audiences_with_courses(Request $request)
    {
        $query = DB::table('targeted_audiences')
            ->join('courses', 'courses.id', '=', 'targeted_audiences.course_id');
        $query->select(
            'targeted_audiences.*',
            'courses.name_en as course_name_en',
            'courses.name_fr as course_name_fr',
            'courses.description_en as course_description_en',
            'courses.description_fr as course_description_fr',
            'courses.url_tag as course_url_tag',
            'courses.status_en as course_status_en',
            'courses.status_fr as course_status_fr',
        );
        if ($request->has('course_id') && $request->get('course_id')) {
            $query->where('course_id', $request->get('course_id'));
        }
        $query->orderBy('targeted_audiences.id', 'DESC');
        return $query->get();
    }
}

if (!function_exists('get_included_materials_with_courses')) {
    function get_included_materials_with_courses(Request $request)
    {
        $query = DB::table('included_materials')
            ->join('courses', 'courses.id', '=', 'included_materials.course_id');
        $query->select(
            'included_materials.*',
            'courses.name_en as course_name_en',
            'courses.name_fr as course_name_fr',
            'courses.description_en as course_description_en',
            'courses.description_fr as course_description_fr',
            'courses.url_tag as course_url_tag',
            'courses.status_en as course_status_en',
            'courses.status_fr as course_status_fr',
        );
        if ($request->has('course_id') && $request->get('course_id')) {
            $query->where('course_id', $request->get('course_id'));
        }
        $query->orderBy('included_materials.id', 'DESC');
        return $query->get();
    }
}

if (!function_exists('get_pre_requisites_with_courses')) {
    function get_pre_requisites_with_courses(Request $request)
    {
        $query = DB::table('pre_requisites')
            ->join('courses', 'courses.id', '=', 'pre_requisites.course_id');
        $query->select(
            'pre_requisites.*',
            'courses.name_en as course_name_en',
            'courses.name_fr as course_name_fr',
            'courses.description_en as course_description_en',
            'courses.description_fr as course_description_fr',
            'courses.url_tag as course_url_tag',
            'courses.status_en as course_status_en',
            'courses.status_fr as course_status_fr',
        );
        if ($request->has('course_id') && $request->get('course_id')) {
            $query->where('course_id', $request->get('course_id'));
        }
        $query->orderBy('pre_requisites.id', 'DESC');
        return $query->get();
    }
}

if (!function_exists('get_modules_with_courses')) {
    function get_modules_with_courses(Request $request)
    {
        $query = DB::table('modules')
            ->join('courses', 'courses.id', '=', 'modules.course_id');
        $query->select(
            'modules.*',
            'courses.name_en as course_name_en',
            'courses.name_fr as course_name_fr',
            'courses.description_en as course_description_en',
            'courses.description_fr as course_description_fr',
            'courses.url_tag as course_url_tag',
            'courses.status_en as course_status_en',
            'courses.status_fr as course_status_fr',
        );
        if ($request->has('course_id') && $request->get('course_id')) {
            $query->where('course_id', $request->get('course_id'));
        }
        $query->orderBy('modules.id', 'DESC');
        return $query->get();
    }
}

if (!function_exists('get_lessons_with_courses_and_modules')) {
    function get_lessons_with_courses_and_modules(Request $request)
    {
        $query = DB::table('lessons')
            ->join('modules', 'modules.id', '=', 'lessons.module_id')
            ->join('courses', 'courses.id', '=', 'modules.course_id');
        $query->select(
            'lessons.*',
            'modules.id as module_id',
            'modules.title_en as module_title_en',
            'modules.title_fr as module_title_fr',
            'courses.name_en as course_name_en',
            'courses.name_fr as course_name_fr',
            'courses.description_en as course_description_en',
            'courses.description_fr as course_description_fr',
            'courses.url_tag as course_url_tag',
            'courses.status_en as course_status_en',
            'courses.status_fr as course_status_fr',
        );
        if ($request->has('course_id') && $request->get('course_id')) {
            $query->where('course_id', $request->get('course_id'));
        }
        if ($request->has('module_id') && $request->get('module_id')) {
            $query->where('module_id', $request->get('module_id'));
        }
        $query->orderBy('lessons.id', 'DESC');
        return $query->get();
    }
}

if (!function_exists('get_course_to_create')) {
    function get_course_to_create()
    {
        return DB::table('courses')
            ->orWhere('description_en', null)
            ->orWhere('url_tag', null)
            ->orWhere('level_en', null)
            ->orWhere('duration_en', null)
            ->orWhere('duration_type', null)
            ->orWhere('duration_number', null)
            ->orWhere('after_course', null)
            ->orWhere('learning_mode_en', null)
            ->orWhere('price_euro', null)
            ->orWhere('category_id', null)
            ->where('created_by', Auth::user()->id)
            ->where('courses.status_en', Course::status_draft_en)
            ->where('name_en', null)
            ->first();
    }
}

if (!function_exists('get_users_by_filter')) {
    function get_users_by_filter(Request $request)
    {
        $query = DB::table('users')
            ->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->select('users.*', 'roles.name as role_name');
        if ($request->has('role') && $request->get('role')) {
            $query->where('roles.name', $request->get('role'));
        }
        return $query->get();
    }
}

if (!function_exists('get_user_by_id')) {
    function get_user_by_id($id)
    {
        $query = DB::table('users')
            ->select('users.*')
            ->where('users.id', $id);
        return $query->first();
    }
}

if (!function_exists('get_categories_with_topics')) {
    function get_categories_with_topics(Request $request)
    {
        $query = DB::table('course_categories')
            ->join('training_topics', 'training_topics.id', '=', 'course_categories.training_topic_id');
        $query->select(
            'course_categories.*',
            'training_topics.name_en as topic_name_en',
            'training_topics.name_fr as topic_name_fr',
            'training_topics.description_en as topic_description_en',
            'training_topics.description_fr as topic_description_fr',
            'training_topics.url_tag as topic_url_tag',
        );
        if ($request->has('topic_id') && $request->get('topic_id')) {
            $query->where('training_topic_id', $request->get('topic_id'));
        }
        $query->orderBy('course_categories.id', 'DESC');
        return $query->get();
    }
}

if (!function_exists('get_student_invoice')) {
    function get_student_invoice()
    {
        if (Auth::user()->hasRole('Student')) {
            $student = Student::where('user_id', Auth::user()->id)->first();
            return Invoice::where(['student_id' => $student->id, 'receipt_number' => null])->get();
        } else {
            return [];
        }
    }
}

if (!function_exists('get_cart_by_student_id')) {
    function get_cart_by_student_id($id)
    {
        return DB::table('orders')
            ->join('students', 'students.id', '=', 'orders.student_id')
            ->join('schedules', 'schedules.id', '=', 'orders.schedule_id')
            ->join('courses', 'courses.id', '=', 'schedules.course_id')
            ->select(
                'orders.*',
                'courses.id as course_id',
                'courses.code as course_code',
                'courses.name_en as course_name_en',
                'courses.name_fr as course_name_fr',
                'courses.url_tag as course_url_tag',
                'courses.price_euro as course_price_euro',
                'courses.price_fcfa as course_price_fcfa',
                'schedules.started_date',
                'schedules.end_date',
                'schedules.started_time',
                'schedules.end_time',
                'schedules.location_en',
                'schedules.location_fr',
            )
            ->where('students.id', $id)
            ->where('orders.status_en', Order::pending_en)
            ->get();
    }
}

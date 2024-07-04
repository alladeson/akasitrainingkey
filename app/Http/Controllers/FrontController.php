<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Course;
use App\Models\EnrolledCourse;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\TrainingTopic;
use App\Models\Vendor;
use App\Models\Wishlist;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\App;

class FrontController extends Controller
{
    private $mail_controller;
    private $pdf_controller;
    public function __construct(MailController $mail_controller, PDFController $pdf_controller)
    {
        // App::setlocale('fr');
        $this->mail_controller = $mail_controller;
        $this->pdf_controller = $pdf_controller;
    }

    public function home(Request $request)
    {

        return view("front.pages.home", [
            'header' => 'home',
            'training_topics' => TrainingTopic::all(),
            'certifications' => Certification::all(),
            'schedules' => get_schedules_all(),
        ]);
    }
    public function catalog(Request $request)
    {
        return view("front.pages.catalog", [
            'training_topics' => TrainingTopic::all(),
            'certifications' => Certification::all(),
            'vendors' => Vendor::all(),
            'search' => $request->has('search') ? $request->get('search') : '',
            'items_data' => get_courses_by_filter($request),
        ]);
    }

    public function catalogWebinars(Request $request)
    {
        $learning_mode = ['Webinar'];
        $request->mergeIfMissing(['learning_mode' => $learning_mode]);
        return view("front.pages.catalog", [
            'training_topics' => TrainingTopic::all(),
            'certifications' => Certification::all(),
            'vendors' => Vendor::all(),
            'search' => $request->has('search') ? $request->get('search') : '',
            'items_data' => get_courses_by_filter($request),
            'webinars' => 1,
        ]);
    }
    public function course(Request $request, $url_tag)
    {

        $course = Course::where('url_tag', $url_tag)->first();
        $course_data = get_course_data($course->id);
        $schedules = get_schedules_by_course($course->id);
        $wishlist = null;
        if (Auth::check() && Auth::user()->hasRole('Student')) {
            $student = Student::where('user_id', Auth::user()->id)->first();
            $wishlist = Wishlist::where(['course_id' => $course->id, 'student_id' => $student->id])->first();
        }

        return view("front.pages.course", [
            "course" => $course,
            "course_data" => $course_data,
            "schedules" => $schedules,
            "wishlist" => $wishlist
        ]);
    }
    public function catalogCoursesList(Request $request)
    {

        $courses = get_courses_by_filter($request);
        return view("front.layouts.components.catalog._list", [
            'items_data' => $courses,
        ]);
    }
    public function trainingSchedules(Request $request)
    {
        return view("front.pages.schedules", [
            'training_topics' => TrainingTopic::all(),
            'certifications' => Certification::all(),
            'vendors' => Vendor::all(),
            'search' => $request->has('search') ? $request->get('search') : '',
            'items_data' => get_schedules_by_filter($request),
        ]);
    }
    public function trainingSchedulesList(Request $request)
    {
        $schedule = get_schedules_by_filter($request);
        return view("front.layouts.components.schedules._list", [
            'items_data' => $schedule,
        ]);
    }

    public function contact(Request $request)
    {
        return view("front.pages.contact", [
            'courses' => get_courses_by_filter($request),
            'user' => Auth::check() ? $request->user() : null,
            'profile' => Auth::check() ? get_user_profile() : null,
        ]);
    }
    public function contactSendMessage(Request $request)
    {
        if($request->get('_token')){
            $this->mail_controller->contact($request);
            return response()->json(['message' => 'success']);
        }
        return response()->json(['message' => 'error'], 404);
    }

    public function testimonies(Request $request)
    {
        return view("front.pages.testimonies");
    }

    public function faq(Request $request)
    {
        return view("front.pages.faq");
    }
    public function location(Request $request)
    {
        return view("front.pages.location");
    }

    public function studentWishlist(Request $request, $id)
    {
        $course = Course::find($id);
        $student = Student::where('user_id', Auth::user()->id)->first();
        if ($course && $student) {
            $wishlist = Wishlist::where(['course_id' => $id, 'student_id' => $student->id])->first();
            if ($wishlist) {
                $wishlist->update([
                    'course_id' => $course->id,
                    'student_id' => $student->id,
                    'status' => $wishlist->status ? false : true,
                ]);
                $wishlist = Wishlist::find($wishlist->id);
            } else {
                $wishlist = Wishlist::create([
                    'course_id' => $course->id,
                    'student_id' => $student->id,
                    'status' => true,
                ]);
            }
            return $wishlist->status ? 1 : 0;
        } else {
            return new Response('An error occur', Response::HTTP_UNAUTHORIZED);
        }
    }

    public function studentAddToCart(Request $request, $schedule_id)
    {
        if ($schedule_id == 0) {
            return view("front.layouts.components.cart-mini._cart-mini-widget");
        }

        $schedule = Schedule::find($schedule_id);
        $student = Student::where('user_id', Auth::user()->id)->first();
        if ($schedule && $student) {
            $order = Order::where(['schedule_id' => $schedule->id, 'student_id' => $student->id, 'status_en' => Order::pending_en])->first();
            $course = Course::where('id', $schedule->course_id)->first();
            if (!$order) {
                $order = Order::create([
                    'schedule_id' => $schedule->id,
                    'student_id' => $student->id,
                    'status_en' => Order::pending_en,
                    'status_fr' => Order::pending_fr,
                    'quantity' => 1,
                    'amount_euro' => $course->price_euro,
                    'amount_fcfa' => $course->price_fcfa,
                    'amount_total_euro' => $course->price_euro,
                    'amount_total_fcfa' => $course->price_fcfa,
                ]);

                // Retrieve enrolled course for this course
                $enrolled_course = EnrolledCourse::where(['student_id' => $student->id, 'course_id' => $course->id, 'status' => false])->first();
                // Create enrolled course for this order
                // Default status = false (0)
                if (!$enrolled_course) {
                    $enrolled_course = EnrolledCourse::create([
                        'student_id' => $student->id,
                        'course_id' => $course->id,
                    ]);
                } else { // If it exits update its create and update date
                    $enrolled_course->created_at = now();
                    $enrolled_course->updated_at = now();
                    $enrolled_course->save();
                }

                // Impression de la facture
                $this->pdf_controller->generateInvoicePdf($student->id);
            }
            return view("front.layouts.components.cart-mini._cart-mini-widget");
        } else {
            return new Response('An error occur', Response::HTTP_UNAUTHORIZED);
        }
    }
    public function updateOrderQuantity(Request $request, $order_id, $qte)
    {
        $order = Order::find($order_id);
        if ($order) {
            $order->quantity = $qte;
            $order->amount_total_euro = $order->amount_euro * $qte;
            $order->amount_total_fcfa = $order->amount_fcfa * $qte;
            if ($order->save()) {
                // Impression de la facture
                $this->pdf_controller->generateInvoicePdf($order->student_id);
                //
                if ($request->has('is_cart_page') && $request->get('is_cart_page'))
                    return view("front.layouts.components.cart._content");
                else
                    return view("front.layouts.components.cart-mini._cart-mini-widget");
            } else {
                return new Response('An error occur', Response::HTTP_UNAUTHORIZED);
            }
        } else {
            return new Response('An error occur', Response::HTTP_UNAUTHORIZED);
        }
    }

    public function deleteCartOrder(Request $request, $order_id)
    {
        $order = Order::find($order_id);
        if ($order && $order->status_en == Order::pending_en) {
            try {
                Order::find($order_id)->delete();
            } catch (\Throwable $th) {
                throw $th;
            }
            // Si le panier n'est pas vide
            if(count(get_cart())){
                // Impression de la facture
                $this->pdf_controller->generateInvoicePdf($order->student_id);
            }else {
                // Supprimer la facture
                $invoice = Invoice::where(['student_id'=> $order->student_id, 'receipt_number' => null])->get()->last();
                Storage::delete($invoice->file_path);
                $invoice->delete();
            }
            //
            if ($request->has('is_cart_page') && $request->get('is_cart_page'))
                return view("front.layouts.components.cart._content");
            else
                return view("front.layouts.components.cart-mini._cart-mini-widget");

        } else {
            return new Response('An error occur', Response::HTTP_UNAUTHORIZED);
        }
    }

    public function showCart(Request $request)
    {

        return view("front.pages.cart", [
            'user' => $request->user(),
            'profile' => get_user_profile(),
        ]);
    }

    public function savePayment(Request $request, $bundle, $transaction_id, $currency)
    {
        //
        $orders = get_cart();
        $orders_id = [];
        $payement_status = "payment-success";
        foreach ($orders as $key => $order_old) {
            $order = Order::find($order_old->id);
            $order->status_en = Order::approved_en;
            $order->status_fr = Order::approved_fr;
            $order->mode = $bundle;
            $order->amount = $order_old->{'amount_total_' . $currency};
            if ($currency == Order::currency_fcfa) {
                $order->amount_total_fcfa = amount_converter_from_euro_to_xof($order_old->amount_total_euro);
                $order->amount = $order->amount_total_fcfa;
            }
            $order->translation_id = $transaction_id;
            $order->currency = $currency;
            $order->payment_date = now();
            if (!$order->save()) {
                $payement_status = "payment-failed";
            }

            $orders_id[$key] = $order_old->id;
        }

        // Retrieve completed orders
        $orders = get_completed_orders_after_payment($orders_id);
        // Calculate total amount
        if (count($orders)) {
            $total_amount_euro = 0;
            $total_amount_fcfa = 0;
            foreach ($orders as $key => $order) {
                $total_amount_euro += $order->amount_total_euro;
                $total_amount_fcfa += $order->amount_total_fcfa;
            }
            // Impression du reçu
            $receipt = $this->pdf_controller->generateReceiptPdf($orders[0]->student_id, $orders, $total_amount_euro);
            // Try to send payement confirmation mail
            try {
                // Send mail
                $this->mail_controller->payment_success($request, $orders, $total_amount_euro, $total_amount_fcfa, $receipt);
            } catch (Exception $e) {
                $error_message = $e->getMessage();
                $payement_status = "payment-confirmation-mail-failed";
            }
        }
        return Redirect::route('profile.edit')->with('status', $payement_status);
    }

    public function kkiapayProcessing(Request $request)
    {
        return $this->savePayment($request, Order::mode_kkiapay, $request->get('transaction_id'), Order::currency_fcfa);
    }

    public function fedapayProcessing(Request $request)
    {
        if ($request->get('transaction-status') == "approved")
            return $this->savePayment($request, Order::mode_fedapay, $request->get('transaction-id'), Order::currency_fcfa);
        else
            return Redirect::route('cart.show')->with('status', 'payement-failed');
    }
    //stripe

    public function stripeProcessing(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $productname = "Training seat reservation on Akasi Learning Key";
        $totalprice = intval(get_cart_subtotal_euro());
        $two0 = "00";
        $total = "$totalprice$two0";

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'EUR',
                        'product_data' => [
                            "name" => $productname,
                        ],
                        'unit_amount' => $total,
                    ],
                    'quantity' => 1,
                ],

            ],
            'mode' => 'payment',
            'success_url' => route('cart.paiement.stripe.success') . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('cart.show'),
        ]);

        return redirect()->away($session->url);
    }

    public function stripeProcessingSuccess(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $sessionId = $request->get('session_id');

        $session = \Stripe\Checkout\Session::retrieve($sessionId);

        if (!$session) {
            throw new NotFoundHttpException;
        }
        // dd($session);

        return $this->savePayment($request, Order::mode_stripe, $session->id, Order::currency_euro);
        // $customer = \Stripe\Customer::retrieve($session->customer);


        // $stripe = new \Stripe\StripeClient('sk_test_51O6t2tE4utFKK4ZV8S7mKra1p7s4sHe4D02rCoIuLZNbBv1LE5ofGOoqkD887cwckghXuv1eVar9IIaHYV13IcVj00T8o5Ht1E');

        // $session = $stripe->checkout->sessions->retrieve($_GET['session_id']);
        // $customer = $stripe->customers->retrieve($session->customer);

    }

    public function setCurrencyCookie(Request $request)
    {
        if ($request->has('currency')) {
            // Set a cookie no expiration
            Cookie::queue(Cookie::forever('currency', $request->get('currency')));
            // Set currency converter for 30 minutes
            Cookie::queue(cookie('currency_converter', intval(currency_converter_from_euro_to_xof()), 30));
            // Return to the previous page
            return Redirect::to(url()->previous());
        }
        // Return error message when currency is not specified
        return new Response('An error occur', Response::HTTP_UNAUTHORIZED);
    }

    public function setLanguageCookie(Request $request)
    {
        if ($request->has('lang')) {
            // Set a cookie no expiration
            Cookie::queue(Cookie::forever('lang', $request->get('lang')));
            return 1;
        }
        return new Response('An error occur', Response::HTTP_UNAUTHORIZED);
    }

    public function getLangCurrencyCookies(Request $request)
    {
        dump(Cookie::get('currency'));
        dd(Cookie::get('lang'));
    }

    public function shareCourseLinkViaMail(Request $request, $course_id)
    {
        $this->mail_controller->share_course_link($request);

        return new Response();
    }

    public function setCartCookie(Request $request, $schedule_id)
    {
        if ($schedule_id) {
            // Set cart converter for 30 minutes
            Cookie::queue(cookie('cart', $schedule_id, 30));
            return 1;
        }
        return new Response('An error occur', Response::HTTP_UNAUTHORIZED);
    }

    public function studentAddToCartFromCookie()
    {
        // Retrieve schedule id from cookie
        $schedule_id = Cookie::get('cart');
        // Retrieve schedule object
        $schedule = Schedule::find($schedule_id);
        // Retrieve student
        $student = Student::where('user_id', Auth::user()->id)->first();
        // Add schedule to cart
        if ($schedule && $student) {
            $order = Order::where(['schedule_id' => $schedule->id, 'student_id' => $student->id, 'status_en' => Order::pending_en])->first();
            $course = Course::where('id', $schedule->course_id)->first();
            if (!$order) {
                $order = Order::create([
                    'schedule_id' => $schedule->id,
                    'student_id' => $student->id,
                    'status_en' => Order::pending_en,
                    'status_fr' => Order::pending_fr,
                    'quantity' => 1,
                    'amount_euro' => $course->price_euro,
                    'amount_fcfa' => $course->price_fcfa,
                    'amount_total_euro' => $course->price_euro,
                    'amount_total_fcfa' => $course->price_fcfa,
                ]);

                // Retrieve enrolled course for this course
                $enrolled_course = EnrolledCourse::where(['student_id' => $student->id, 'course_id' => $course->id, 'status' => false])->first();
                // Create enrolled course for this order
                // Default status = false (0)
                if (!$enrolled_course) {
                    $enrolled_course = EnrolledCourse::create([
                        'student_id' => $student->id,
                        'course_id' => $course->id,
                    ]);
                } else { // If it exits update its create and update date
                    $enrolled_course->created_at = now();
                    $enrolled_course->updated_at = now();
                    $enrolled_course->save();
                }
                // Delete cart from cookie after set the student's cart
                Cookie::forget('cart');

                // Impression de la facture
                $this->pdf_controller->generateInvoicePdf($student->id);
            }
        }
        return redirect()->route('cart.show');
    }

    public function sendMailToStudent(Request $request) {
        $invoices = Invoice::where('receipt_number', null)->get();
        if (!empty($invoices)) {
            foreach ($invoices as $invoice) {
                $this->mail_controller->invoice_reminder($invoice);
            }
        }
    }
}

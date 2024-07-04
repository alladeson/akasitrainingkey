<?php

use App\Http\Controllers\Courses\CourseCategoryController;
use App\Http\Controllers\Courses\CourseGoalController;
use App\Http\Controllers\Courses\IncludedMaterialController;
use App\Http\Controllers\Courses\LessonsController;
use App\Http\Controllers\Courses\ModuleController;
use App\Http\Controllers\Courses\PreRequisiteController;
use App\Http\Controllers\Courses\ScheduleController;
use App\Http\Controllers\Courses\TargetedAudiencesController;
use App\Http\Controllers\Courses\TrainingTopicsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Courses\CoursesController;
use App\Http\Controllers\TrainingTopicController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/pdf/course/{id}', [PDFController::class, 'generateCoursePdf'])->name('courses.pdf');

Route::get('/courses-catalog', [FrontController::class, 'catalog'])->name('courses.catalog');
Route::get('/courses-catalog/webinars', [FrontController::class, 'catalogWebinars'])->name('courses.catalog.webinars');
Route::get('/courses-catalog/category/{url_tag}', [FrontController::class, 'catalog'])->name('courses.catalog.category');
Route::get('/courses/{url_tag}', [FrontController::class, 'course'])->name('course');
Route::post('/catalog-courses-list', [FrontController::class, 'catalogCoursesList'])->name('courses.catalog.list');
Route::get('/trainings-schedule', [FrontController::class, 'trainingSchedules'])->name('trainings.schedule');
Route::post('/trainings-schedule-list', [FrontController::class, 'trainingSchedulesList'])->name('trainings.schedule.list');
Route::get('/contact-us', [FrontController::class, 'contact'])->name('contact');
Route::post('/contact-us/send-message', [FrontController::class, 'contactSendMessage'])->name('contact.message');
Route::get('/testimonies', [FrontController::class, 'testimonies'])->name('testimonies');
Route::get('/faq', [FrontController::class, 'faq'])->name('faq');
Route::get('/location', [FrontController::class, 'location'])->name('location');
Route::get('/settings/set/lang', [FrontController::class, 'setLanguageCookie'])->name('settings.set.lang');
Route::get('/settings/set/currency', [FrontController::class, 'setCurrencyCookie'])->name('settings.set.currency');
Route::get('/settings/get/cookies', [FrontController::class, 'getLangCurrencyCookies'])->name('settings.get.cookies');
Route::get('/invoice/send-mail', [FrontController::class, 'sendMailToStudent'])->name('invoice.send_mail');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::patch('/cart/cookie/schedule/{schedule_id}', [FrontController::class, 'setCartCookie'])->name('student.add_cart_to_cookie');

Route::middleware(['auth', 'verified', 'role:Student'])->group(function () {
    Route::get('/cart', [FrontController::class, 'showCart'])->name('cart.show');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/settings/get/exchange', [FrontController::class, 'testExchange'])->name('settings.get.exchange');
    Route::patch('/wishlist/course/{id}', [FrontController::class, 'studentWishlist'])->name('course.wishlist');
    Route::post('/courses/link/share/{course_id}', [FrontController::class, 'shareCourseLinkViaMail'])->name('course.share_link');
    Route::patch('/cart/schedule/{schedule_id}', [FrontController::class, 'studentAddToCart'])->name('student.add_to_cart');
    Route::patch('/cart/order/{order_id}/quantity/{qte}', [FrontController::class, 'updateOrderQuantity'])->name('order.update_quantity');
    Route::delete('/cart/order/{order_id}', [FrontController::class, 'deleteCartOrder'])->name('order.delete_cart_order');
    Route::get('/cart/icon/auto-update', [FrontController::class, 'updateCartIcon'])->name('cart.update_icon');
    Route::get('/cart/payements/kkiapay', [FrontController::class, 'kkiapayProcessing'])->name('cart.paiement.kkiapay');
    Route::post('/cart/payements/fedapay', [FrontController::class, 'fedapayProcessing'])->name('cart.paiement.fedapay');
    Route::get('/pdf/proforma/student/{id}', [PDFController::class, 'generateProformaPdf']);
    Route::get('/cart/payements/stripe', [FrontController::class, 'stripeProcessing'])->name('cart.paiement.stripe');
    Route::get('/cart/payements/stripe-success', [FrontController::class, 'stripeProcessingSuccess'])->name('cart.paiement.stripe.success');

    Route::get('/got-to-dashboard', [DashboardController::class, 'gotToDashboard'])->name('got_to_dashboard');
});

Route::group([
    'prefix' => 'back',

    'middleware' => ['auth', 'verified', 'role:Admin|Commercial|Instructor'],
],
function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    // Courses
    Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');
    Route::post('/courses/datatable', [CoursesController::class, 'datatable'])->name('courses.datatable');
    Route::post('/courses/select-view', [CoursesController::class, 'coursesOfTopicSelectView'])->name('courses.select_view');
    Route::post('/courses/perform-tag-url', [CoursesController::class, 'performCourseUrlTag'])->name('courses.url_tag');
    Route::get('/courses/create', [CoursesController::class, 'create'])->name('courses.create');
    Route::get('/courses/edit/{id}', [CoursesController::class, 'edit'])->name('courses.edit');
    Route::get('/courses/show/{id}', [CoursesController::class, 'show'])->name('courses.show');
    Route::post('/courses', [CoursesController::class, 'store'])->name('courses.store');
    Route::patch('/courses/{id}', [CoursesController::class, 'update'])->name('courses.update');
    Route::patch('/courses/{id}/enable-publishing', [CoursesController::class, 'enablePublishing'])->name('courses.enable_publishing');
    Route::patch('/courses/{id}/publish', [CoursesController::class, 'publishCourse'])->name('courses.publish');
    Route::patch('/courses/{id}/enable-editing', [CoursesController::class, 'enableEditing'])->name('courses.enable_editing');
    Route::delete('/courses/{id}', [CoursesController::class, 'destroy'])->name('courses.destroy');
    // Course Goals
    Route::get('/courses/goals', [CourseGoalController::class, 'index'])->name('courses.goals.index');
    Route::post('/courses/goals/datatable', [CourseGoalController::class, 'datatable'])->name('courses.goals.datatable');
    Route::get('/courses/goals/create', [CourseGoalController::class, 'create'])->name('courses.goals.create');
    Route::get('/courses/goals/edit/{id}', [CourseGoalController::class, 'edit'])->name('courses.goals.edit');
    Route::post('/courses/goals', [CourseGoalController::class, 'store'])->name('courses.goals.store');
    Route::patch('/courses/goals/{id}', [CourseGoalController::class, 'update'])->name('courses.goals.update');
    Route::delete('/courses/goals/{id}', [CourseGoalController::class, 'destroy'])->name('courses.goals.destroy');
    // Targeted Audience
    Route::get('/courses/targeted-audiences', [TargetedAudiencesController::class, 'index'])->name('courses.targeted_audiences.index');
    Route::post('/courses/targeted-audiences/datatable', [TargetedAudiencesController::class, 'datatable'])->name('courses.targeted_audiences.datatable');
    Route::get('/courses/targeted-audiences/create', [TargetedAudiencesController::class, 'create'])->name('courses.targeted_audiences.create');
    Route::get('/courses/targeted-audiences/edit/{id}', [TargetedAudiencesController::class, 'edit'])->name('courses.targeted_audiences.edit');
    Route::post('/courses/targeted-audiences', [TargetedAudiencesController::class, 'store'])->name('courses.targeted_audiences.store');
    Route::patch('/courses/targeted-audiences/{id}', [TargetedAudiencesController::class, 'update'])->name('courses.targeted_audiences.update');
    Route::delete('/courses/targeted-audiences/{id}', [TargetedAudiencesController::class, 'destroy'])->name('courses.targeted_audiences.destroy');
    // Included Material
    Route::get('/courses/included-materials', [IncludedMaterialController::class, 'index'])->name('courses.included_materials.index');
    Route::post('/courses/included-materials/datatable', [IncludedMaterialController::class, 'datatable'])->name('courses.included_materials.datatable');
    Route::get('/courses/included-materials/create', [IncludedMaterialController::class, 'create'])->name('courses.included_materials.create');
    Route::get('/courses/included-materials/edit/{id}', [IncludedMaterialController::class, 'edit'])->name('courses.included_materials.edit');
    Route::post('/courses/included-materials', [IncludedMaterialController::class, 'store'])->name('courses.included_materials.store');
    Route::patch('/courses/included-materials/{id}', [IncludedMaterialController::class, 'update'])->name('courses.included_materials.update');
    Route::delete('/courses/included-materials/{id}', [IncludedMaterialController::class, 'destroy'])->name('courses.included_materials.destroy');
    // Pre-requisite
    Route::get('/courses/pre-requisites', [PreRequisiteController::class, 'index'])->name('courses.pre_requisites.index');
    Route::post('/courses/pre-requisites/datatable', [PreRequisiteController::class, 'datatable'])->name('courses.pre_requisites.datatable');
    Route::get('/courses/pre-requisites/create', [PreRequisiteController::class, 'create'])->name('courses.pre_requisites.create');
    Route::get('/courses/pre-requisites/edit/{id}', [PreRequisiteController::class, 'edit'])->name('courses.pre_requisites.edit');
    Route::post('/courses/pre-requisites', [PreRequisiteController::class, 'store'])->name('courses.pre_requisites.store');
    Route::patch('/courses/pre-requisites/{id}', [PreRequisiteController::class, 'update'])->name('courses.pre_requisites.update');
    Route::delete('/courses/pre-requisites/{id}', [PreRequisiteController::class, 'destroy'])->name('courses.pre_requisites.destroy');
    // Course Modules
    Route::get('/courses/modules', [ModuleController::class, 'index'])->name('courses.modules.index');
    Route::post('/courses/modules/datatable', [ModuleController::class, 'datatable'])->name('courses.modules.datatable');
    Route::post('/courses/modules/select-view', [ModuleController::class, 'moduleOfCourseSelectView'])->name('courses.modules.select_view');
    Route::get('/courses/modules/create', [ModuleController::class, 'create'])->name('courses.modules.create');
    Route::get('/courses/modules/edit/{id}', [ModuleController::class, 'edit'])->name('courses.modules.edit');
    Route::post('/courses/modules', [ModuleController::class, 'store'])->name('courses.modules.store');
    Route::patch('/courses/modules/{id}', [ModuleController::class, 'update'])->name('courses.modules.update');
    Route::delete('/courses/modules/{id}', [ModuleController::class, 'destroy'])->name('courses.modules.destroy');
    // Course Lessons
    Route::get('/courses/lessons', [LessonsController::class, 'index'])->name('courses.lessons.index');
    Route::post('/courses/lessons/datatable', [LessonsController::class, 'datatable'])->name('courses.lessons.datatable');
    Route::get('/courses/lessons/create', [LessonsController::class, 'create'])->name('courses.lessons.create');
    Route::get('/courses/lessons/edit/{id}', [LessonsController::class, 'edit'])->name('courses.lessons.edit');
    Route::post('/courses/lessons', [LessonsController::class, 'store'])->name('courses.lessons.store');
    Route::patch('/courses/lessons/{id}', [LessonsController::class, 'update'])->name('courses.lessons.update');
    Route::delete('/courses/lessons/{id}', [LessonsController::class, 'destroy'])->name('courses.lessons.destroy');
    // Schedules
    Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
    Route::post('/schedules/datatable', [ScheduleController::class, 'datatable'])->name('schedules.datatable');
    Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('schedules.create');
    Route::get('/schedules/edit/{id}', [ScheduleController::class, 'edit'])->name('schedules.edit');
    Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');
    Route::patch('/schedules/{id}', [ScheduleController::class, 'update'])->name('schedules.update');
    Route::patch('/schedules/{id}/enable-publishing', [ScheduleController::class, 'enablePublishing'])->name('schedules.enable_publishing');
    Route::patch('/schedules/{id}/publish', [ScheduleController::class, 'publishCourse'])->name('schedules.publish');
    Route::patch('/schedules/{id}/enable-editing', [ScheduleController::class, 'enableEditing'])->name('schedules.enable_editing');
    Route::delete('/schedules/{id}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');
    // Instructors
    Route::get('/instructors/edit/{id}', [ProfileController::class, 'editInstructor'])->name('instructors.edit');
    Route::patch('/instructors', [ProfileController::class, 'updateProfile'])->name('instructors.update');

});

Route::group([
    'prefix' => 'back',

    'middleware' => ['auth', 'verified', 'role:Admin'],
],
function () {
    // Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/datatable', [UserController::class, 'datatable'])->name('users.datatable');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::patch('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    // Training Topics
    Route::get('/settings/topics', [TrainingTopicsController::class, 'index'])->name('training_topics.index');
    Route::post('/settings/topics/datatable', [TrainingTopicsController::class, 'datatable'])->name('training_topics.datatable');
    Route::post('/settings/topics/perform-tag-url', [TrainingTopicsController::class, 'performTopicUrlTag'])->name('training_topics.url_tag');
    Route::get('/settings/topics/create', [TrainingTopicsController::class, 'create'])->name('training_topics.create');
    Route::get('/settings/topics/edit/{id}', [TrainingTopicsController::class, 'edit'])->name('training_topics.edit');
    Route::get('/settings/topics/show/{id}', [TrainingTopicsController::class, 'show'])->name('training_topics.show');
    Route::post('/settings/topics', [TrainingTopicsController::class, 'store'])->name('training_topics.store');
    Route::patch('/settings/topics/{id}', [TrainingTopicsController::class, 'update'])->name('training_topics.update');
    Route::delete('/settings/topics/{id}', [TrainingTopicsController::class, 'destroy'])->name('training_topics.destroy');
    // Course Categories
    Route::get('/settings/categories', [CourseCategoryController::class, 'index'])->name('courses.categories.index');
    Route::post('/settings/categories/datatable', [CourseCategoryController::class, 'datatable'])->name('courses.categories.datatable');
    Route::post('/settings/categories/perform-tag-url', [CourseCategoryController::class, 'performCategoryUrlTag'])->name('courses.categories.url_tag');
    Route::get('/settings/categories/create', [CourseCategoryController::class, 'create'])->name('courses.categories.create');
    Route::get('/settings/categories/edit/{id}', [CourseCategoryController::class, 'edit'])->name('courses.categories.edit');
    Route::post('/settings/categories', [CourseCategoryController::class, 'store'])->name('courses.categories.store');
    Route::patch('/settings/categories/{id}', [CourseCategoryController::class, 'update'])->name('courses.categories.update');
    Route::delete('/settings/categories/{id}', [CourseCategoryController::class, 'destroy'])->name('courses.categories.destroy');

});

Route::middleware(['auth', 'verified', 'role:Student'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('roles', RoleController::class);
    Route::resource('training-topics', TrainingTopicController::class);
    Route::get('/invoice/student/{student_id}', [PDFController::class, 'generateInvoicePdf'])->name('student.invoice.pdf');
});

require __DIR__.'/auth.php';

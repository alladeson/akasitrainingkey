<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Courses\ModuleController;
use App\Http\Controllers\Courses\VendorController;
use App\Http\Controllers\Courses\CoursesController;
use App\Http\Controllers\Courses\LessonsController;
use App\Http\Controllers\Courses\ScheduleController;
use App\Http\Controllers\Courses\WishlistController;
use App\Http\Controllers\Courses\CourseGoalController;
use App\Http\Controllers\Courses\PreRequisiteController;
use App\Http\Controllers\Courses\CertificationController;
use App\Http\Controllers\Courses\CourseCategoryController;
use App\Http\Controllers\Courses\EnrolledCourseController;
use App\Http\Controllers\Courses\IncludedMaterialController;
use App\Http\Controllers\Courses\TrainingTopicsController;
use App\Http\Controllers\Courses\TargetedAudiencesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::apiResource('course_goals', CourseGoalController::class);
Route::apiResource('modules', ModuleController::class);
Route::apiResource('pre_requisites', PreRequisiteController::class);
Route::apiResource('vendors', VendorController::class);
Route::apiResource('training_topics', TrainingTopicsController::class);
Route::apiResource('targeted_audiences', TargetedAudiencesController::class);
Route::apiResource('lessons', LessonsController::class);
Route::apiResource('course_categories', CourseCategoryController::class);
Route::apiResource('certifications', CertificationController::class);
Route::apiResource('wishlists', WishlistController::class);
Route::apiResource('schedules', ScheduleController::class);
Route::apiResource('courses', CoursesController::class);
Route::apiResource('materials', IncludedMaterialController::class);
Route::apiResource('enrollerd_course', EnrolledCourseController::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BalanceCardController;
use App\Http\Controllers\API\CenterController;
use App\Http\Controllers\API\CouponController;
use App\Http\Controllers\API\ExamController;
use App\Http\Controllers\API\LessonController;
use App\Http\Controllers\API\LectureController;
use App\Http\Controllers\API\PartController;
use App\Http\Controllers\API\QuestionController;
use App\Http\Controllers\API\TestimonialController;
use App\Http\Controllers\API\UserController;
use App\Http\Resources\UserResource;
use App\Models\Lesson;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function () {
    return apiResponse(true,_('تم العثور على المستخدم بنجاح'), UserResource::only(apiUser(),[]));
});


//       AUTH ROUTES
Route::post('/login',[AuthController::class ,'login']);
Route::post('/register',[AuthController::class ,'register']);
Route::post('/logout',[AuthController::class ,'logout']);


//       HOME ROUTES
Route::get('/centersData',[CenterController::class ,'centers']);
Route::get('/topTestimonials',[TestimonialController::class ,'topTestimonials']);
Route::get('/lectures/last',[LectureController::class ,'lastLectures']);
Route::get('/contentsCount',function(){
    $lessonsCount = count(Lesson::all());
    $questionsCount = count(Question::all());
    return apiResponse(true,_('عدد الدروس والأسئلة'),['lessonsCount'=>$lessonsCount,'questionsCount'=>$questionsCount]);
});

//       MONTH ROUTES
Route::apiResource('lectures',LectureController::class)->except('index')->names(['show'=>'api.lectures.show','destroy'=>'api.lectures.destroy']);
Route::get('/grades/grade{gradeId}',[LectureController::class,'index']);
Route::post('/search',[LectureController::class,'search']);
Route::post('/view-lecture',[LectureController::class,'viewLecture']);
Route::post('lectures/fastEdit',[LectureController::class,'fastEdit']);

//       LESSON ROUTES
Route::apiResource('/lessons',LessonController::class)->names(['store'=>'api.lessons.store','update'=>'api.lessons.update','destroy'=>'api.lessons.destroy']);

//       EXAM ROUTES
Route::apiResource('/exams',ExamController::class)->names(['index'=>'api.exams.index','store'=>'api.exams.store','update'=>'api.exams.update','destroy'=>'api.exams.destroy']);

//       USER ROUTES
Route::post('recharge',[BalanceCardController::class,'recharge']);
Route::post('genarateCode',[UserController::class,'genarateCode']);
Route::post('getBalance',[UserController::class,'getBalance']);
Route::post('editBalance',[UserController::class,'editBalance']);
Route::post('getCode',[UserController::class,'getCode']);
Route::post('editCode',[UserController::class,'editCode']);
Route::post('getStudentCardData',[UserController::class,'getStudentCardData']);

//       USER ROUTES
Route::post('checkCoupon',[CouponController::class,'checkCoupon']);

//       PART ROUTES
Route::post('parts',[PartController::class,'index']);

//       QUESTION ROUTES
Route::post('questions',[QuestionController::class,'index']);
Route::post('questions/fastEdit',[QuestionController::class,'fastEdit']);

//       TESTIMONIAL ROUTES
Route::post('testimonials/fastEdit',[TestimonialController::class,'fastEdit']);

//       CENTER ROUTES
Route::post('centers/fastEdit',[CenterController::class,'fastEdit']);

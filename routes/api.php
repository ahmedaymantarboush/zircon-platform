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
use App\Http\Controllers\API\SectionItemController;
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
Route::apiResource('/lessons',LessonController::class)->except(['show'])->names(['store'=>'api.lessons.store','update'=>'api.lessons.update','destroy'=>'api.lessons.destroy']);
Route::post('lessons/getLesson',[LessonController::class, 'show'])->name('api.lessons.show');

//       EXAM ROUTES
Route::apiResource('/exams',ExamController::class)->except(['show'])->names(['index'=>'api.exams.index','store'=>'api.exams.store','update'=>'api.exams.update','destroy'=>'api.exams.destroy']);
// Route::post('exams/getExam',[ExamController::class, 'show'])->name('api.exams.show');

//       USER ROUTES
Route::post('users/recharge',[BalanceCardController::class,'recharge']);
Route::post('users/genarateCode',[UserController::class,'genarateCode']);
Route::post('users/getBalance',[UserController::class,'getBalance']);
Route::post('users/editBalance',[UserController::class,'editBalance']);
Route::post('users/getCode',[UserController::class,'getCode']);
Route::post('users/editCode',[UserController::class,'editCode']);
Route::post('users/getStudentCardData',[UserController::class,'getStudentCardData']);
Route::post('users/hanging',[UserController::class,'hanging']);

//       USER ROUTES
Route::post('checkCoupon',[CouponController::class,'checkCoupon']);

//       PART ROUTES
Route::post('parts',[PartController::class,'index']);

//       QUESTION ROUTES
Route::post('questions',[QuestionController::class,'index']);
// Route::post('questions/getQuestion',[QuestionController::class,'show']);
Route::post('questions/fastEdit',[QuestionController::class,'fastEdit']);

//       TESTIMONIAL ROUTES
Route::post('testimonials/fastEdit',[TestimonialController::class,'fastEdit']);

//       CENTER ROUTES
Route::post('centers/fastEdit',[CenterController::class,'fastEdit']);

//       SECTIONITEM ROUTES
Route::post('items/getItem',[SectionItemController::class,'show']);

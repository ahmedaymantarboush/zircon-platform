<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CenterController;
use App\Http\Controllers\API\MonthController;
use App\Http\Controllers\API\TestimonialController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return new UserResource($request->user());
});


//       AUTH ROUTES
Route::post('/login',[AuthController::class ,'login']);
Route::post('/register',[AuthController::class ,'register']);
Route::post('/logout',[AuthController::class ,'logout']);


//       HOME ROUTES
Route::get('/centers',[CenterController::class ,'index']);
Route::get('/testimonials',[TestimonialController::class ,'index']);
Route::get('/months/last',[MonthController::class ,'lastMonths']);
Route::get('/contentsCount',function(){
    $lessonsCount = count(Lesson::where('published',1)->get());
    $questionsCount = count(Question::all());
    return apiResponse(true,_('عدد الدروس والأسئلة'),['lessonsCount'=>$lessonsCount,'questionsCount'=>$questionsCount]);
});

//       MONTH ROUTES
Route::apiResource('months',MonthController::class);

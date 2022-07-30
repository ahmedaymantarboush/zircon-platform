<?php

use App\Http\Controllers\API\CenterController;
use App\Http\Controllers\API\MonthController;
use App\Http\Controllers\API\TestimonialController;
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
    return $request->user();
});

Route::get('/centers',[CenterController::class ,'index']);
Route::get('/testimonials',[TestimonialController::class ,'index']);
Route::get('/months',[MonthController::class ,'lastMonths']);
Route::get('/contentsCount',function(){
    $lessonsCount = count(Lesson::where('published',1)->get());
    $questionsCount = count(Question::all());
    return apiResponse(true,_('عدد الدروس والأسئلة'),['lessonsCount'=>$lessonsCount,'questionsCount'=>$questionsCount]);
});

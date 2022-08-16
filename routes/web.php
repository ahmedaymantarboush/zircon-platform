<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\BalanceCardController;
use App\Http\Controllers\Web\ExamController;
use App\Http\Controllers\Web\SectionItemController;
use App\Http\Controllers\Web\LessonController;
use App\Http\Controllers\Web\SectionController;
use App\Http\Controllers\Web\LectureController;
use App\Http\Controllers\Web\UserController;
use App\Models\Lecture;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


Auth::routes();
Route::post('user/update', [UserController::class, 'update'])->name('user.update');

Route::get('grades/grade{id}', [LectureController::class,'index'])->name('months.index');
Route::resource('months', LectureController::class)->only(['show']);
Route::post('month-viewer', [LectureController::class,'viewLecture'])->name('lecture.view');
Route::get('search', [LectureController::class, 'search'])->name('search');
Route::get('my-cources', [LectureController::class, 'myLectures'])->name('months.mycources');

//  ADMIN ROUTES
Route::prefix('admin')->group(function () {
    Route::resource('lectures',LectureController::class)->except(['show'])->names(['store'=>'admin.lectures.store','update'=>'admin.lectures.update']);
    Route::resource('lessons',LessonController::class)->except(['index'])->names(['store'=>'admin.lesson.store','update'=>'admin.lesson.update','show'=>'admin.lesson.show']);
    Route::resource('sections',SectionController::class)->except(['show']);
    Route::resource('sectionitems',SectionItemController::class)->except(['show']);
    Route::resource('exams',ExamController::class)->except(['show'])->names(['store'=>'admin.exams.store','update'=>'admin.exams.update']);
    Route::post('/sort-sections',[SectionController::class, 'sortSections'])->name('sections.resort');
    Route::post('/sort-items',[SectionItemController::class, 'sortItems'])->name('sectionitems.resort');
});

//  ADMIN ROUTES
Route::get('profile',function(){
    $user = Auth::user();
    return view('home.profile',compact('user'));
});

//  ADMIN ROUTES
Route::post('recharge',[BalanceCardController::class, 'recharge'])->name('balance.recharge');

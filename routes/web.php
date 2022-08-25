<?php

use App\Http\Controllers\Web\CenterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\TestimonialController;
use App\Http\Controllers\Web\QuestionController;
use App\Http\Controllers\Web\BalanceCardController;
use App\Http\Controllers\Web\ExamController;
use App\Http\Controllers\Web\SectionItemController;
use App\Http\Controllers\Web\LessonController;
use App\Http\Controllers\Web\SectionController;
use App\Http\Controllers\Web\LectureController;
use App\Http\Controllers\Web\UserController;
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

Route::get('grades/grade{id}', [LectureController::class,'index'])->name('lectures.index');
Route::resource('months', LectureController::class)->only(['show']);
Route::post('month-viewer', [LectureController::class,'viewLecture'])->name('lectures.view');
Route::get('month-viewer', function(){
    return redirect()->back();
});
Route::get('search', [LectureController::class, 'search'])->name('search');
Route::get('my-cources', [LectureController::class, 'myLectures'])->name('lectures.ownedLectures');

//  ADMIN ROUTES
Route::get('dashboard', [HomeController::class, 'teacher'])->name('admin.index')->middleware('admin');
Route::group(['middleware'=>'teacher'],function () {
    Route::resource('lectures',LectureController::class)->except(['show'])->names(['store'=>'admin.lectures.store','update'=>'admin.lectures.update']);
    Route::resource('lessons',LessonController::class)->except(['index'])->names(['store'=>'admin.lesson.store','update'=>'admin.lesson.update','show'=>'admin.lesson.show']);
    Route::resource('sections',SectionController::class)->except(['show']);
    Route::resource('sectionitems',SectionItemController::class)->except(['show']);
    Route::resource('exams',ExamController::class)->except(['show'])->names(['store'=>'admin.exams.store','update'=>'admin.exams.update']);
    Route::get('exams/{id}/students',[ExamController::class,'students'])->name('admin.exams.students');
    Route::post('/sort-sections',[SectionController::class, 'sortSections'])->name('sections.resort');
    Route::post('/sort-items',[SectionItemController::class, 'sortItems'])->name('sectionitems.resort');
    Route::post('lectures/fastEdit',[LectureController::class, 'fastEdit'])->name('admin.lectures.fastEdit');
    Route::post('lectures/hanging',[LectureController::class,'hanging'])->name('admin.lectures.hanging');

    Route::get('users', [UserController::class,'index'])->name('admin.users.index');
    Route::get('users/create', [UserController::class,'create'])->name('admin.users.create');
    Route::post('users/store', [UserController::class,'store'])->name('admin.users.store');
    Route::get('users/{id}/edit', [UserController::class,'edit'])->name('admin.users.edit');
    Route::post('users/update', [UserController::class,'update'])->name('admin.users.update');

    Route::get('lectures',[LectureController::class, 'allLectures'])->name('admin.lectures.index');
    
    Route::get('questions', [QuestionController::class,'index'])->name('admin.questions.index');
    Route::post('questions/filter', [QuestionController::class,'filter'])->name('admin.questions.filter');
    Route::post('questions/destroy', [QuestionController::class,'destroy'])->name('admin.questions.destroy');
    Route::post('questions/store', [QuestionController::class,'store'])->name('admin.questions.store');
    Route::post('questions/update', [QuestionController::class,'update'])->name('admin.questions.update');

    Route::get('certificates', [TestimonialController::class,'index'])->name('admin.certificates.index');

    Route::get('centers', [CenterController::class,'index'])->name('admin.centers.index');
    Route::post('centers/update', [CenterController::class,'update'])->name('admin.centers.update');
    Route::post('centers/store', [CenterController::class,'store'])->name('admin.centers.store');

    Route::get('balancecards', [BalanceCardController::class,'index'])->name('admin.balancecards.index');
    Route::get('balancecards/create', [BalanceCardController::class,'create'])->name('admin.balancecards.create');
    Route::post('balancecards/store', [BalanceCardController::class,'store'])->name('admin.balancecards.store');

});
Route::post('lectures/{slug}/buy',[LectureController::class, 'buy'])->name('admin.lectures.buy');

//  ADMIN ROUTES
Route::get('profile',function(){
    $user = Auth::user();
    return view('Home.profile',compact('user'));
});

//  ADMIN ROUTES
Route::post('recharge',[BalanceCardController::class, 'recharge'])->name('balance.recharge');

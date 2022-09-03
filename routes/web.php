<?php

use App\Http\Controllers\Web\CenterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\PartController;
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
Auth::routes(['password.request'=>false,'password.update'=>false]);
Route::get('grades/grade{id}', [LectureController::class, 'index'])->name('lectures.index');
Route::resource('months', LectureController::class)->only(['show']);
Route::get('search', [LectureController::class, 'search'])->name('search');

Route::group(['middleware' => 'not.hanging'], function () {
    Route::post('user/update', [UserController::class, 'update'])->middleware('auth')->name('user.update');

    Route::post('month-viewer', [LectureController::class, 'viewLecture'])->middleware('auth')->name('lectures.view');
    Route::get('month-viewer', function () {
        return redirect()->back();
    })->middleware('auth');
    Route::get('my-cources', [LectureController::class, 'myLectures'])->middleware('auth')->name('lectures.ownedLectures');

    //  ADMIN ROUTES
    Route::get('dashboard', [HomeController::class, 'admin'])->name('admin.index')->middleware('admin');
    Route::group(['middleware' => ['auth', 'teacher'], 'prefix' => 'admin'], function () {
        Route::resource('lectures', LectureController::class)->except(['show'])->names(['store' => 'admin.lectures.store', 'update' => 'admin.lectures.update']);
        Route::resource('sections', SectionController::class)->except(['show']);
        Route::resource('sectionitems', SectionItemController::class)->except(['show']);
        Route::resource('exams', ExamController::class)->except(['show'])->names(['store' => 'admin.exams.store', 'update' => 'admin.exams.update']);
        Route::get('exams/{id}/students', [ExamController::class, 'students'])->name('admin.exams.students');
        Route::post('/sort-sections', [SectionController::class, 'sortSections'])->name('sections.resort');
        Route::post('/sort-items', [SectionItemController::class, 'sortItems'])->name('sectionitems.resort');
        Route::post('lectures/fastEdit', [LectureController::class, 'fastEdit'])->name('admin.lectures.fastEdit');
        Route::post('lectures/hanging', [LectureController::class, 'hanging'])->name('admin.lectures.hanging');

        Route::post('lessons/delete', [LessonController::class, 'destroy'])->name('admin.lessons.destroy');
        Route::post('lessons/update', [LessonController::class, 'update'])->name('admin.lessons.update');
        Route::post('lessons/store', [LessonController::class, 'store'])->name('admin.lessons.store');

        Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('users/store', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::post('users/update', [UserController::class, 'update'])->name('admin.users.update');
        Route::get('users/{id}/profile', [UserController::class, 'profile'])->name('admin.users.profile');

        Route::get('lectures', [LectureController::class, 'allLectures'])->name('admin.lectures.index');

        Route::get('questions', [QuestionController::class, 'index'])->name('admin.questions.index');
        // Route::post('questions/filter', [QuestionController::class, 'filter'])->name('admin.questions.filter');
        Route::post('questions/destroy', [QuestionController::class, 'destroy'])->name('admin.questions.destroy');
        Route::post('questions/store', [QuestionController::class, 'store'])->name('admin.questions.store');
        Route::post('questions/update', [QuestionController::class, 'update'])->name('admin.questions.update');

        Route::get('testimonials', [TestimonialController::class, 'index'])->name('admin.testimonials.index');
        Route::post('testimonials/store', [TestimonialController::class, 'store'])->name('admin.testimonials.store');
        Route::post('testimonials/update', [TestimonialController::class, 'update'])->name('admin.testimonials.update');
        Route::post('testimonials/delete', [TestimonialController::class, 'destroy'])->name('admin.testimonials.delete');

        Route::get('centers', [CenterController::class, 'index'])->name('admin.centers.index');
        Route::post('centers/update', [CenterController::class, 'update'])->name('admin.centers.update');
        Route::post('centers/store', [CenterController::class, 'store'])->name('admin.centers.store');
        Route::post('centers/delete', [CenterController::class, 'destroy'])->name('admin.centers.delete');

        Route::get('balancecards', [BalanceCardController::class, 'index'])->name('admin.balancecards.index');
        Route::get('balancecards/create', [BalanceCardController::class, 'create'])->name('admin.balancecards.create');
        Route::post('balancecards/store', [BalanceCardController::class, 'store'])->name('admin.balancecards.store');

        Route::get('parts', [PartController::class, 'index'])->name('admin.parts.index');
        Route::post('parts/create', [PartController::class, 'store'])->name('admin.parts.store');
        Route::post('parts/update', [PartController::class, 'update'])->name('admin.parts.update');
        Route::post('parts/delete', [PartController::class, 'destroy'])->name('admin.parts.delete');
    });
    Route::post('lectures/{slug}/buy', [LectureController::class, 'buy'])->middleware('auth')->name('admin.lectures.buy');

    //  ADMIN ROUTES
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile')->middleware('auth');

    //  ADMIN ROUTES
    Route::post('recharge', [BalanceCardController::class, 'recharge'])->middleware('auth')->name('balance.recharge');
});

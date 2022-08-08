<?php

use App\Http\Controllers\HomeController;
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

// Route::get('search', [App\Http\Controllers\LectureController::class, 'search'])->name('search');

Auth::routes();

Route::get('grades/grade{id}', [App\Http\Controllers\LectureController::class,'index'])->name('months.index');
Route::resource('months', App\Http\Controllers\LectureController::class)->only(['show']);

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Test Routes
|--------------------------------------------------------------------------
|
| Here is where you can register test routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "test" middleware group. Now create something great!
|
*/
// Route::get('/levels', function () {
//     return view('levels');
// });
// Route::get('/search', function () {
//     return view('search');
// });

// Route::get('/signup', function () {
//     return view('signup');
// });
// Route::get('/login', function () {
//     return view('login');
// });
Route::get('/test', function () {
    return view('TextPage');
});

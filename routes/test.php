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
Route::get('myHome', function () {
    return view('myHome');
});

Route::get('/test', function () {
    return view('test');
});
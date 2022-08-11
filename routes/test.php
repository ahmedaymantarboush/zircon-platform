<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
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

Route::get('/test', function () {
    return view('testPage');
});


Route::get('/tt', function () {
    $headers = ['Content-Type' => 'video/mp4', 'Accept-Ranges' => 'bytes'];
    $response = Http::accept('application/html')->withHeaders(['Content-Type' => 'video/mp4', 'Accept-Ranges' => 'bytes'])->get("https://www.youtube.com/embed/M9wmZ4Lcskk");
    // $response = Http::accept('application/mp4')->get("https://www.youtube.com/embed/M9wmZ4Lcskk");
    // dd($response);
    return $response;
//     $request =new Request();
// foreach ($headers as $key => $value)
//     $request->headers->set($key, $value);
});

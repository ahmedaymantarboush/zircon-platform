<?php

use App\Models\Question;
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
// Route::get('/profile', function () {
//     return view('profile');
// });
// Route::get('/lecture', function () {
//     return view('lecture');
// });
// Route::get('/search', function () {
//     return view('search');
// });

//  Route::get('/signup', function () {
//      return view('signup');
//  });
// Route::get('/login', function () {
//     return view('login');
// });
// Route::get('/test', function () {
//     return view('test');
// });

Route::get('/test', function (){
    return view('TestPage',['questions'=>Question::all()]);
});


// Route::get('/tt', function () {
//     // $headers = ['Content-Type' => 'video/mp4', 'Accept-Ranges' => 'bytes'];
//     // $response = Http::withHeaders(['Content-Type' => 'video/mp4', 'Accept-Ranges' => 'bytes'])->get(getVideoUrl('LgV1IcqX3QE')['videos']['720p']);
//     // return $response;
//     // return getVideoUrl('LgV1IcqX3QE')['videos']['720p'];

//     // $url = getVideoUrl('M9wmZ4Lcskk')['videos']['360p'];

//     // set_time_limit(0);
//     // $ch = curl_init();
//     // curl_setopt($ch, CURLOPT_TIMEOUT, 500);
//     // curl_setopt($ch, CURLOPT_URL, $url);
//     // curl_setopt($ch, CURLOPT_POST, 0);
//     // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//     // $response = curl_exec($ch);
//     // curl_close($ch);
//     // return $response;
// });
//test route for lecture viewer
// Route::get('/lectureview',function (){
//     return view('Home.lecture_viewer');
// });

Route::get('/pull', function () {
    $user = Auth::user();
    if ($user) :
        if ($user->role->number == 1) :
            $output = nl2br(shell_exec('git pull'));
            return "<h1>pull Request Is Finished</h1><br><p>$output</p><br><h1>DONE.</h1>";
        else :
            return"<h1>You Must Be Super Admin To Get This Page</h1>";
        endif;
    else:
        return redirect(route('login'));
    endif;
});

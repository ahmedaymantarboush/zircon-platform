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

Route::get('/test', function () {
    return view('TestPage');
});
Route::get('/test1', function () {
    $payload = [
        'expire' => '1662502350',
        'ei' => 'bnEXY4PhGouVkgbIvpTwAg',
        'ip' => '173.201.178.226',
        'id' => 'o-AINj9WogI0YwNxD89HcAvDcxsvbf2Frnr-_QaSiJu1vb',
        'itag' => '18',
        'source' => 'youtube',
        'requiressl' => 'yes',
        'spc' => 'lT-KhiMoYSwAmlvBV59eKeMDxJjmtKs',
        'vprv' => '1',
        'mime' => 'video/mp4',
        'ns' => 'A9E_IMl7d2DOqO4B4-1-Ke8H',
        'cnr' => '14',
        'ratebypass' => 'yes',
        'dur' => '4071.781',
        'lmt' => '1657334882226369',
        'fexp' => '24001373,24007246,24277538',
        'beids' => '24277538',
        'c' => 'WEB',
        'rbqsm' => 'fr',
        'txp' => '5319224',
        'n' => 'Vh_t_ePWRv-LZmdn',
        'sparams' => 'expire,ei,ip,id,itag,source,requiressl,spc,vprv,mime,ns,cnr,ratebypass,dur,lmt',
        'sig' => 'AOq0QJ8wRAIgb3pKHD3u9GQNhS83gceUdwnlwRaFyNwDBFBLq1wg5moCIGvbjVuR1ld7dIZRGYEGL6pB00hNoZJJ0nJEfuFTcGwd',
        'redirect_counter' => '1',
        'rm' => 'sn-a5me7y7s',
        'req_id' => 'b14b209164fd36e2',
        'cms_redirect' => 'yes',
        'cmsv' => 'e',
        'ipbypass' => 'yes',
        'mh' => 'eW',
        'mip' => '196.150.21.222',
        'mm' => '31',
        'mn' => 'sn-8vq54voxxb-j5pee',
        'ms' => 'au',
        'mt' => '1662480577',
        'mv' => 'm',
        'mvi' => '1',
        'pl' => '23',
        'lsparams' => 'ipbypass,mh,mip,mm,mn,ms,mv,mvi,pl',
        'lsig' => 'AG3C_xAwRgIhAIWTCa1uKTJMOuhnAWioY3Sh_dL5qKyt83m6Mq-e00ZIAiEA6ut8Ac_uRYhl3WL-GICr5M0SCijFQWIWLIAuw5R-fYA=',
    ];
    dd(file_get_contents('https://rr1---sn-8vq54voxxb-j5pee.googlevideo.com/videoplayback?expire=1662503781&ei=BHcXY7WkJf2QsfIP2vGnmAI&ip=173.201.178.226&id=o-AA9zUJakbJk_s0WxkIi90zJUGe3JZAJaWmga9RiV6Toc&itag=18&source=youtube&requiressl=yes&spc=lT-KhpjVa5UQP0Ig3rZJTs3wSopmYJ0&vprv=1&mime=video%2Fmp4&ns=SeYq_VWVdMs5tQ5R8z_GyQ8H&cnr=14&ratebypass=yes&dur=4071.781&lmt=1657334882226369&fexp=24001373,24007246&c=WEB&rbqsm=fr&txp=5319224&n=MLOVRCSsVgzvDD0J&sparams=expire%2Cei%2Cip%2Cid%2Citag%2Csource%2Crequiressl%2Cspc%2Cvprv%2Cmime%2Cns%2Ccnr%2Cratebypass%2Cdur%2Clmt&sig=AOq0QJ8wRgIhAL_1GG0unwVwXiXMqnsvI-0yf3FMgA9M6q0pDBCwLWgrAiEA1VFY4pXBbTlyPqRaXInUjYKbtPPMIgukW6i_P6q40IA%3D&redirect_counter=1&rm=sn-a5me7y7s&req_id=d99f2c3fd06b36e2&cms_redirect=yes&cmsv=e&ipbypass=yes&mh=eW&mip=196.150.21.222&mm=31&mn=sn-8vq54voxxb-j5pee&ms=au&mt=1662482012&mv=m&mvi=1&pl=23&lsparams=ipbypass,mh,mip,mm,mn,ms,mv,mvi,pl&lsig=AG3C_xAwRQIhAIoEgJDtKp6Q0IUF3wIHbRTEJbneR4Jq9BaWrsRNd7BWAiB3A7c6xSBb65-OjA44_tNAslStpBkFtJHxCO1X_s_cRg%3D%3D'));
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
            return "<h1>You Must Be Super Admin To Get This Page</h1>";
        endif;
    else :
        return redirect(route('login'));
    endif;
});

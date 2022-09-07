<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\UserSession;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function validateLogin($request)
    {
        $request->validate([
            $this->username() => ['required', 'string', 'email', 'max:255','exists:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ],[
            "{$this->username()}.required" => "البريد الالكتروني مطلوب",
            "{$this->username()}.string" => "البريد الالكتروني يجب ان يكون حروف",
            "{$this->username()}.email" => "الرجاء ادخال البريد الالكتروني بشكل صحيح",
            "{$this->username()}.max" => "أكبر عدد ممكن من الحروف هو 255 حرف",
            "{$this->username()}.exists" => "هناك خطأ في البريد الالكتروني أو كلمة المرور",

            'password.required' => "كلمة المرور مطلوبة",
            'password.string' => "يجب أن تكون كلمة المرور عبارة عن نص",
            'password.min' => "أقل عدد ممكن من الحروف هو 8 حروف",
        ]);
    }

    protected function sendFailedLoginResponse($request)
    {
        throw ValidationException::withMessages([
            $this->username() => ["هناك خطأ في البريد الالكتروني أو كلمة المرور"],
        ]);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated($request, $user)
    {
        dd(request()->userAgent());
        $userSession = UserSession::firstOrCreate([
            'user_id'=>$user->id,
            'ip_address'=>request()->ip(),
        ]);
        if ($userSession):
            $userSession->session_id = Session::getId();
            $userSession->save();
        endif;
        if ($user->loginSessions->count() > env('MAX_DEVICES_COUNT')):
            $userSession->delete();
            Auth::logout();
            return redirect()->back()->withInput()->withErrors([$this->username()=>['لقد وصلت للحد الأقصى من عدد تسجيلات الدخول']]);
        endif;
    }
}

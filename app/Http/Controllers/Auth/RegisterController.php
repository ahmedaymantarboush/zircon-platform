<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\Governorate;
use App\Models\Grade;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserSession;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'grade' => ['required', 'string', 'exists:grades,name'],
            'phone_number' => ['required', 'string', 'unique:users,phone_number','size:11'],
            'parent_phone_number' => ['required', 'string','size:11'],
            'governorate' => ['required','string','exists:governorates,name'],
            'center'=>['nullable','string','exists:centers,name'],
        ],[
            'name.required' => "?????????? ??????????",
            'name.string' => "?????????? ?????? ???? ???????? ????????",
            'name.max' => "???????? ?????? ???????? ???? ???????????? ???? 255 ??????",

            'email.required' => "???????????? ???????????????????? ??????????",
            'email.string' => "???????????? ???????????????????? ?????? ???? ???????? ????????",
            'email.email' => "???????????? ?????????? ???????????? ???????????????????? ???????? ????????",
            'email.max' => "???????? ?????? ???????? ???? ???????????? ???? 255 ??????",
            'email.unique' => "???????????? ???????????????????? ?????????? ??????????",

            'password.required' => "???????? ???????????? ????????????",
            'password.string' => "?????? ???? ???????? ???????? ???????????? ?????????? ???? ????",
            'password.min' => "?????? ?????? ???????? ???? ???????????? ???? 8 ????????",
            'password.confirmed' => "???????? ???????? ?????? ??????????????",

            'grade.required' => "?????????????? ?????????????????? ????????????",
            'grade.string' => "?????????????? ?????????????????? ?????? ???? ???????? ????????",
            'grade.exists' => "???????????? ???????????? ?????????? ???????????? ??????????",

            'phone_number.required' => "?????? ???????????? ??????????",
            'phone_number.unique' => "?????? ???????????? ?????????? ????????????",
            'phone_number.size' => "?????? ???? ???????? ?????? ?????????????? ???? 11 ??????",
            'phone_number.min' => "?????? ???? ???? ?????? ?????? ?????????????? ???? 11 ??????",
            'phone_number.starts_with' => "?????? ???? ???????? ?????? ???????????? ????0 ???? +20",

            'parent_phone_number.required' => "?????? ???????? ?????? ?????????? ??????????",
            'parent_phone_number.size' => "?????? ???? ???????? ?????? ?????????????? ???? 11 ??????",
            'parent_phone_number.min' => "?????? ???? ???? ?????? ?????? ?????????????? ???? 11 ??????",
            'parent_phone_number.starts_with' => "?????? ???? ???????? ?????? ???????????? ????0",

            'governorate.required' => "???????????????? ????????????",
            'governorate.string' => "???????????????? ?????? ???? ???????? ????????",
            'governorate.exists' => "???????????? ???????????? ???????????? ??????????",

            'center.string' => "???????????? ?????? ???? ???????? ????????",
            'center.exists' => "???????????? ???????????? ???????? ????????",
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'phone_number'=> $data['phone_number'],
            'parent_phone_number'=> $data['parent_phone_number'],
            // 'image' ,
            'password'=> Hash::make($data['password']),
            'grade_id'=> Grade::where('name',$data['grade'])->first()->id,
            'governorate_id'=> Governorate::where('name',$data['governorate'])->first()->id,
            'code'=> Str::random(16),
            'center_id'=> $data['center'] ? Center::where('name',$data['center'])->first()->id : 1,
            'role_num'=> 4,
            'balance'=> 0,
        ]);
    }

    protected function registered($request, $user)
    {
        $userSession = UserSession::firstOrCreate([
            'user_id'=>$user->id,
            'ip_address'=>request()->ip(),
            'user_agent'=>request()->userAgent(),
        ]);
        if ($userSession):
            $userSession->session_id = Session::getId();
            $userSession->save();
        endif;
        if ($user->loginSessions->count() > env('MAX_DEVICES_COUNT')):
            $userSession->delete();
            Auth::logout($user);
            return redirect()->back()->withInput()->withErrors([$this->username()=>['?????? ???????? ???????? ???????????? ???? ?????? ?????????????? ????????????']]);
        endif;
    }
}

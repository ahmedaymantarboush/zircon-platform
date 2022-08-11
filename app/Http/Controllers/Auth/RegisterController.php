<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\Governorate;
use App\Models\Grade;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
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
            'phone_number' => ['required', 'string', 'unique:users,phone_number','max:13','min:11'],
            'parent_phone_number' => ['required', 'string','max:13','min:11'],
            'governorate' => ['required','string','exists:governorates,name'],
            'center'=>['nullable','string','exists:centers,name'],

        ],[
            'name.required' => "الاسم مطلوب",
            'name.string' => "الاسم يجب ان يكون حروف",
            'name.max' => "أكبر عدد ممكن من الحروف هو 255 حرف",

            'email.required' => "البريد الالكتروني مطلوب",
            'email.string' => "البريد الالكتروني يجب ان يكون حروف",
            'email.email' => "البرجاء ادخال البريد الالكتروني بشكل صحيح",
            'email.max' => "أكبر عدد ممكن من الحروف هو 255 حرف",
            'email.unique' => "البريد الالكتروني موجود مسبقا",

            'password.required' => "كلمة المرور مطلوبة",
            'password.string' => "يجب أن تكون كلمة المرور عبارة عن نص",
            'password.min' => "أقل عدد ممكن من الحروف هو 8 حروف",
            'password.confirmed' => "كلمة السر غير متطابقة",

            'grade.required' => "المرحلة التعليمية مطلوبة",
            'grade.string' => "المرحلة التعليمية يجب ان يكون حروف",
            'grade.exists' => "الرجاء اختيار مرحلة دراسية صحيحة",

            'phone_number.required' => "رقم الهاتف مطلوب",
            'phone_number.unique' => "رقم الهاتف موجود بالفعل",
            'phone_number.max' => "يجب أن لا يزيد عدد الأرقام عن 13 رقم",
            'phone_number.min' => "يجب أن لا يقل عدد الأرقام عن 11 رقم",
            'phone_number.starts_with' => "يجب أن يبدأ رقم الهاتف بـ0 أو +20",

            'parent_phone_number.required' => "رقم هاتف ولي الأمر مطلوب",
            'parent_phone_number.max' => "يجب أن لا يزيد عدد الأرقام عن 13 رقم",
            'parent_phone_number.min' => "يجب أن لا يقل عدد الأرقام عن 11 رقم",
            'parent_phone_number.starts_with' => "يجب أن يبدأ رقم الهاتف بـ0",

            'governorate.required' => "المحافظة مطلوبة",
            'governorate.string' => "المحافظة يجب ان يكون حروف",
            'governorate.exists' => "الرجاء اختيار محافظة صحيحة",

            'center.string' => "المركز يجب ان يكون حروف",
            'center.exists' => "الرجاء اختيار مركز صحيح",
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
            'code'=> Str::random(25),
            'center_id'=> $data['center'] ? Center::where('name',$data['center'])->first()->id : 1,
            'role_num'=> 4,
            'balance'=> 0,
        ]);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Center;
use App\Models\Governorate;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $jsonRequest = json_decode($request->data, true);
        $validator = Validator::make($jsonRequest, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'grade' => ['required', 'string', 'exists:grades,name'],
            'phoneNumber' => ['required', 'string', 'unique:users,phone_number', 'size:11'],
            'parentPhoneNumber' => ['required', 'string', 'size:11'],
            'governorate' => ['required', 'string', 'exists:governorates,name'],
            'center' => ['nullable', 'string', 'exists:centers,name'],

        ], [
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

            'phoneNumber.required' => "رقم الهاتف مطلوب",
            'phoneNumber.unique' => "رقم الهاتف موجود بالفعل",
            'phoneNumber.size' => "يجب أن يكون عدد الأرقام عن 11 رقم",
            'phoneNumber.min' => "يجب أن لا يقل عدد الأرقام عن 11 رقم",
            'phoneNumber.starts_with' => "يجب أن يبدأ رقم الهاتف بـ0",

            'parentPhoneNumber.required' => "رقم هاتف ولي الأمر مطلوب",
            'parentPhoneNumber.size' => "يجب أن يكون عدد الأرقام عن 11 رقم",
            'parentPhoneNumber.min' => "يجب أن لا يقل عدد الأرقام عن 11 رقم",
            'parentPhoneNumber.starts_with' => "يجب أن يبدأ رقم الهاتف بـ0 أو +20",

            'governorate.required' => "المحافظة مطلوبة",
            'governorate.string' => "المحافظة يجب ان يكون حروف",
            'governorate.exists' => "الرجاء اختيار محافظة صحيحة",

            'center.string' => "المركز يجب ان يكون حروف",
            'center.exists' => "الرجاء اختيار مركز صحيح",
        ]);
        if ($validator->fails()) {
            return apiResponse(false, _('هناك خطأ في صحة البيانات'), $validator->errors(), 400);
        }

        $user = User::create([
            'name' => $jsonRequest['name'],
            'email' => $jsonRequest['email'],
            'phone_number' => $jsonRequest['phoneNumber'],
            'parent_phone_number' => $jsonRequest['parentPhoneNumber'],
            'password' => Hash::make($jsonRequest['password']),
            'grade_id' => Grade::where('name', $jsonRequest['grade'])->first()->id,
            'governorate_id' => Governorate::where('name', $jsonRequest['governorate'])->first()->id,
            'code' => Str::random(16),

            'center_id' => $jsonRequest['center'] ? Center::where('name', $jsonRequest['center'])->first()->id : 1,
            'role_num' => 4,
            'balance' => 0,
        ]);

        if (!$user) {
            return apiResponse(false, _('حدث خطأ ولم يتم انشاء المستخدم يرجىة المحالوة مرة أخرى'), [], 500);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        if ($token) :
            auth()->login($user);
        endif;
        return apiResponse(true, _('تم انشاء المسخدم بنجاح'), [
            '_token' => $token,
            '_token_type' => 'Bearer'
        ]);
    }
    public function login(Request $request)
    {
        $jsonRequest = json_decode($request->data, true);
        $validator = Validator::make($jsonRequest, [
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ], [
            'email.required' => "البريد الالكتروني مطلوب",
            'email.string' => "البريد الالكتروني يجب ان يكون حروف",
            'email.email' => "البرجاء ادخال البريد الالكتروني بشكل صحيح",
            'email.max' => "أكبر عدد ممكن من الحروف هو 255 حرف",
            'email.exists' => "هناك خطأ في البريد الالكتروني أو كلمة المرور",

            'password.required' => "كلمة المرور مطلوبة",
            'password.string' => "يجب أن تكون كلمة المرور عبارة عن نص",
            'password.min' => "أقل عدد ممكن من الحروف هو 8 حروف",
        ]);
        if ($validator->fails()) {
            return apiResponse(false, _('هناك خطأ في صحة البيانات'), $validator->errors(), 400);
        }
        if (!Auth::attempt(['email' => $jsonRequest['email'], 'password' => $jsonRequest['password']])) {
            return apiResponse(false, _('هذا المسخدم غير موجود'), [], 404);
        }
        $user = User::where(['email' => $jsonRequest['email']])->first();
        if (!$user) {
            return apiResponse(false, _('هذا المسخدم غير موجود'), [], 404);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        if ($token) :
            auth()->login($user);
        endif;
        return apiResponse(true, _('تم تسجيل الدخول بنجاح'), [
            '_token' => $token,
            '_token_type' => 'Bearer'
        ]);
    }
    public function logout()
    {
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('هذا المستخدم غير متاح'), [], 401);
        endif;
        if ($user->tokens()->delete()) :
            return apiResponse(true, _('تم تسجيل الخروج بنجاح'), []);
        else :
            return apiResponse(false, _('حدث خطأ أثناء تسجيل الخروج'), [], 500);
        endif;
    }
}

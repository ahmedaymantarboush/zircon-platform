<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\Governorate;
use App\Models\Grade;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
        if ($user) :
            $data = $request->all();

            Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'phoneNumber' => ['required', 'string', $data['phoneNumber'] != $user->phone_number ? 'unique:users,phone_number' : '', 'max:13', 'min:11'],
                'parentPhoneNumber' => ['required', 'string', 'max:13', 'min:11'],
                'grade' => ['required', 'string', 'exists:grades,name'],
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
                'phoneNumber.max' => "يجب أن لا يزيد عدد الأرقام عن 13 رقم",
                'phoneNumber.min' => "يجب أن لا يقل عدد الأرقام عن 11 رقم",
                'phoneNumber.starts_with' => "يجب أن يبدأ رقم الهاتف بـ0 أو +20",

                'parentPhoneNumber.required' => "رقم هاتف ولي الأمر مطلوب",
                'parentPhoneNumber.max' => "يجب أن لا يزيد عدد الأرقام عن 13 رقم",
                'parentPhoneNumber.min' => "يجب أن لا يقل عدد الأرقام عن 11 رقم",
                'parentPhoneNumber.starts_with' => "يجب أن يبدأ رقم الهاتف بـ0",

                'governorate.required' => "المحافظة مطلوبة",
                'governorate.string' => "المحافظة يجب ان يكون حروف",
                'governorate.exists' => "الرجاء اختيار محافظة صحيحة",

                'center.string' => "المركز يجب ان يكون حروف",
                'center.exists' => "الرجاء اختيار مركز صحيح",
            ])->validate();

            $user->update([
                'name' => $data['name'],
                'phone_number' => $data['phoneNumber'],
                'parent_phone_number' => $data['parentPhoneNumber'],
                'grade_id' => Grade::where('name', $data['grade'])->first()->id,
                'governorate_id' => Governorate::where('name', $data['governorate'])->first()->id,
                'center_id' => $data['center'] ? Center::where('name', $data['center'])->first()->id : 1,
            ]);
        endif;
        return redirect()->back();
    }
}

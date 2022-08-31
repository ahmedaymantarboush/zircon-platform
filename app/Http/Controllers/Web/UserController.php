<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\Governorate;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function profile($id = null)
    {
        if ($id) :
            $user = User::find($id);
            if (!$user) :
                return abort(404);
            endif;
        else :
            $user = Auth::user();
            if (!$user) :
                return redirect(route('login'));
            endif;
        endif;
        return view('home.profile', compact('user'));
    }
    public function index()
    {
        $user = Auth::user();
        if ($user ? $user->role->number < 4 : false) {
            $users = User::where('role_num', '>=', $user->role->number)->get();
            return view('Admin.students', compact('users'));
        } else {
            return abort(404);
        }
    }
    public function edit($id)
    {
        $user = Auth::user();
        $student = User::find($id);
        if ($user && $student && $user->role->number < 4) :
            return view('Admin.editStudent', ['user' => $student]);
        else :
            return abort(404);
        endif;
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        if (!$user) :
            return redirect(route('login'));
        endif;
        // if ($user->role->number >= 4) :
        //     return abort(403);
        // endif;

        $data = $request->all();
        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['nullable', 'string', 'min:8'],
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

        $student = User::Find($data['id']);
        if ($student) :
            $student->update([
                'name' => $data['name'],
                'phone_number' => $data['phoneNumber'],
                'parent_phone_number' => $data['parentPhoneNumber'],
                'grade_id' => Grade::where('name', $data['grade'])->first()->id,
                'governorate_id' => Governorate::where('name', $data['governorate'])->first()->id,
                'center_id' => $data['center'] ? Center::where('name', $data['center'])->first()->id : 1,
            ]);
            if (isset($data['password']) && $data['password'] != null) :
                if ($student->role->number >= 4) :
                    if (!$data['oldPassword']) :
                        return redirect()->back()->withErrors(['oldPassword' => ['كلمة المرور القديمة مطلوبة']]);
                    endif;
                    if (!Hash::check($data['oldPassword'], Auth::user()->password)) :
                        return redirect()->back()->withErrors(['oldPassword' => ['كلمة المرور القديمة غير صحيحة']]);
                    endif;
                endif;
                $student->update([
                    'password' => Hash::make($data['password']),
                ]);
            endif;
        else :
            return abort(404);
        endif;
        return redirect()->back();
    }
    public function create(Request $request)
    {
        $user = Auth::user();
        if ($user ? $user->role->number < 4 : false) :
            return view('Admin.addStudent');
            esle:
            return abort(404);
        endif;
    }
    public function store(Request $request)
    {
        $data = $request->all();

        Validator::make($data, [
            'stu_name' => ['required', 'string', 'max:255'],
            'stu_code' => ['required', 'string', 'max:255', 'unique:users,code'],
            'stu_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'stu_grade' => ['required', 'string', 'exists:grades,id'],
            'stu_number' => ['required', 'string', 'unique:users,phone_number', 'max:13', 'min:11'],
            'stu_parent_number' => ['required', 'string', 'max:13', 'min:11'],
            'stu_gov' => ['required', 'string', 'exists:governorates,id'],
            'stu_place' => ['nullable', 'string', 'exists:centers,id'],
            'role' => ['nullable', 'string', 'exists:roles,id'],
        ], [
            'stu_name.required' => "الاسم مطلوب",
            'stu_name.string' => "الاسم يجب ان يكون حروف",
            'stu_name.max' => "أكبر عدد ممكن من الحروف هو 255 حرف",

            'stu_code.required' => "الكود مطلوب",
            'stu_code.string' => "الكود يجب ان يكون حروف",
            'stu_code.max' => "أكبر عدد ممكن من الحروف هو 255 حرف",
            'stu_code.unique' => "الكود موجود بالفعل",

            'stu_email.required' => "البريد الالكتروني مطلوب",
            'stu_email.string' => "البريد الالكتروني يجب ان يكون حروف",
            'stu_email.email' => "البرجاء ادخال البريد الالكتروني بشكل صحيح",
            'stu_email.max' => "أكبر عدد ممكن من الحروف هو 255 حرف",
            'stu_email.unique' => "البريد الالكتروني موجود مسبقا",

            'password.required' => "كلمة المرور مطلوبة",
            'password.string' => "يجب أن تكون كلمة المرور عبارة عن نص",
            'password.min' => "أقل عدد ممكن من الحروف هو 8 حروف",
            'password.confirmed' => "كلمة السر غير متطابقة",

            'stu_grade.required' => "المرحلة التعليمية مطلوبة",
            'stu_grade.string' => "المرحلة التعليمية يجب ان يكون حروف",
            'stu_grade.exists' => "الرجاء اختيار مرحلة دراسية صحيحة",

            'stu_number.required' => "رقم الهاتف مطلوب",
            'stu_number.unique' => "رقم الهاتف موجود بالفعل",
            'stu_number.max' => "يجب أن لا يزيد عدد الأرقام عن 13 رقم",
            'stu_number.min' => "يجب أن لا يقل عدد الأرقام عن 11 رقم",
            'stu_number.starts_with' => "يجب أن يبدأ رقم الهاتف بـ0 أو +20",

            'stu_parent_number.required' => "رقم هاتف ولي الأمر مطلوب",
            'stu_parent_number.max' => "يجب أن لا يزيد عدد الأرقام عن 13 رقم",
            'stu_parent_number.min' => "يجب أن لا يقل عدد الأرقام عن 11 رقم",
            'stu_parent_number.starts_with' => "يجب أن يبدأ رقم الهاتف بـ0",

            'stu_gov.required' => "المحافظة مطلوبة",
            'stu_gov.string' => "المحافظة يجب ان يكون حروف",
            'stu_gov.exists' => "الرجاء اختيار محافظة صحيحة",

            'stu_place.string' => "المركز يجب ان يكون حروف",
            'stu_place.exists' => "الرجاء اختيار مركز صحيح",

            'role.required' => "الرتبة مطلوبة",
            'role.string' => "الرتبة يجب ان يكون حروف",
            'role.exists' => "الرجاء اختيار رتبة صحيحة",
        ])->validate();

        $user = User::create([
            'name' => $data['stu_name'],
            'email' => $data['stu_email'],
            'password' => Hash::make($data['password']),
            'grade_id' => $data['stu_grade'] ?? 3,
            'phone_number' => $data['stu_number'],
            'parent_phone_number' => $data['stu_parent_number'],
            // 'image' ,
            'governorate_id' => $data['stu_gov'],
            'code' => $data['stu_code'],
            'center_id' => $data['stu_place'] ?? $data['stu_place'],
            'role_num' => $data['role'] ?? 4,
            'balance' => 0,
        ]);
        return redirect()->back();
    }
}

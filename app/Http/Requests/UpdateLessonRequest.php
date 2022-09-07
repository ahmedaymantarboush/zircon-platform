<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateLessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = Auth::user();
        return $user ? $user->role->number < 4 : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'newtitle' => ['required', 'string', 'max:255'],
            'newurl' => ['required', 'url', 'max:255'],
            'newtype' => ['string', "in:video,pdf,audio"],
            'newdescription' => ['required', 'string'],
            'newsection' => ['required', 'exists:sections,id'],
            'newpart' => ['required', 'exists:parts,id'],

            'newexam' => ['nullable', 'exists:exams,id'],

        ];
    }

    public function messages()
    {
        return  [
            'newtitle.required' => 'عنوان الدرس مطلوب',
            'newtitle.string' => 'يجب أن يكون العنوان عبارة عن نص',
            'newtitle.max' => 'أكبر عدد من الحروف هو 255 حرف',

            'newurl.required' => 'الرجاء التأكد من أنك قمت باختيار ملف صالح',
            'newurl.url' => 'الرجاء التأكد من أنك قمت الرابط بشكل صحيح',
            // 'url.max' => 'رجاءًا قم باختيار ملف أقل من 1 جيجا',

            'newtype.string' => 'يجب أن يكون نوع الملف عبارة عن نص',
            'newtype.in' => 'الرجاء إختيار نوع ملف صحيح',

            'newsemester.string' => 'يجب أن يكون الفصل الدراسي عبارة عن نص',
            'newsemester.in' => 'الرجاء إختيار فصل دراسي صحيح',

            'newdescription.required' => 'وصف الدرس مطلوب',
            'newdescription.string' => 'يجب أن يكون الوصف عبارة عن نص',

            'newsection.required' => 'القسم التابع له الدرس مطلوب',
            'newsection.exists' => 'الرجاء إختيار قسم صحيح',

            'newpart.required' => 'الجزئية الدراسية مطلوبة',
            'newpart.exists' => 'الرجاء اختيار جزئية دراسية صحيحة',
        ];
    }
}

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
            'title' => ['required', 'string', 'max:50'],
            'url' => ['required', 'url', 'max:255'],
            'type' => ['string', "in:video,pdf,audio"],
            'description' => ['required', 'string'],
            'section' => ['required', 'exists:sections,id'],
            'part' => ['required', 'exists:parts,id'],

            'exam' => ['nullable', 'exists:exams,id'],
            
        ];
    }

    public function messages()
    {
        return  [
            'title.required' => 'عنوان الدرس مطلوب',
            'title.string' => 'يجب أن يكون العنوان عبارة عن نص',
            'title.max' => 'أكبر عدد من الحروف هو 50 حرف',

            'url.required' => 'الرجاء التأكد من أنك قمت باختيار ملف صالح',
            'url.url' => 'الرجاء التأكد من أنك قمت الرابط بشكل صحيح',
            // 'url.max' => 'رجاءًا قم باختيار ملف أقل من 1 جيجا',

            'type.string' => 'يجب أن يكون نوع الملف عبارة عن نص',
            'type.in' => 'الرجاء إختيار نوع ملف صحيح',

            'semester.string' => 'يجب أن يكون الفصل الدراسي عبارة عن نص',
            'semester.in' => 'الرجاء إختيار فصل دراسي صحيح',

            'description.required' => 'وصف الدرس مطلوب',
            'description.string' => 'يجب أن يكون الوصف عبارة عن نص',

            'section.required' => 'القسم التابع له الدرس مطلوب',
            'section.exists' => 'الرجاء إختيار قسم صحيح',

            'part.required' => 'الجزئية الدراسية مطلوبة',
            'part.exists' => 'الرجاء اختيار جزئية دراسية صحيحة',
        ];
    }
}

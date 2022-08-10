<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreSectionItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'examTitle' => ['required','string','max:50'],
            'section' => ['required','exists:sections,id'],
            'item' => ['required','exists:exams,id'],
        ];
    }

    public function messages()
    {
        return [

            'examTitle.required' => 'عنوان المحاضرة مطلوب',
            'examTitle.string' => 'يجب أن يكون العنوان عبارة عن نص',
            'examTitle.max' => 'أكبر عدد من الحروف هو 50 حرف',

            'section.required' => 'القسم التابع له الدرس مطلوب',
            'section.exists' => 'الرجاء إختيار قسم صحيح',

            'item.required' => 'الرجتء التأكد من اختيار امتحان',
            'item.exists' => 'التأكد من اختيار امتحان صحيح',
        ];
    }
}

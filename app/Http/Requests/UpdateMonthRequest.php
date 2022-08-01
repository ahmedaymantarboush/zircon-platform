<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMonthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'                     =>   ['nullable','string','max:50'],
            'semester'                  =>   ['nullable','string','in:الفصل الدراسي الأول,الفصل الدراسي الثاني'],
            'short_description'         =>   ['nullable','string','max:50'],
            'description'               =>   ['nullable','string'],
            'published'                 =>   ['nullable'],
            'promotinal_video_url'      =>   ['nullable','string','url'],
            'poster'                    =>   ['nullable','image','max:1512'],
            'meta_keywords'             =>   ['nullable','string'],
            'meta_description'          =>   ['nullable','string'],
            'slug'                      =>   ['nullable','string','unique:months,slug'],
            'free'                      =>   ['nullable'],
            'price'                     =>   ['nullable_unless:free:on','numeric'],
            'has_discount'              =>   ['nullable'],
            'final_price'               =>   ['nullable_if:has_discount:on','numeric'],
            'discount_expiry_date'      =>   ['nullable_if:has_discount:on','date'],
            'subject'                   =>   ['nullable','exists:subjects,id'],
            'grade'                     =>   ['nullable','exists:grade,id'],
            'parts'                     =>   ['nullable'],
        ];
    }

    public function messages()
    {
        return [
            'title.string' => 'يجب أن يكون العنوان عبارة عن نص',
            'title.max' => 'أكبر عدد من الحروف هو 50 حرف',

            'semester.string' => 'يجب أن يكون الفصل الدراسي عبارة عن نص',
            'semester.in' => 'الرجاء إختيار فصل دراسي صحيح',

            'short_description.string' => 'يجب أن يكون الوصف القصير عبارة عن نص',
            'short_description.max' => 'أكبر عدد من الحروف هو 50 حرف',

            'description.string' => 'يجب أن يكون الوصف عبارة عن نص',

            'promotinal_video_url.rquired' => 'الفيديو الترويجي مطلوب',
            'promotinal_video_url.string' => 'يجب أن يكون الفيديو الترويجي عبارة عن نص',
            'promotinal_video_url.url' => 'الرجاء إدخال رابط صحيح',

            'poster.image' => 'يجب أن يكون الملف عبارة عن صورة',
            'poster.max' => 'أكبر حجم للصورة يجب أن يكون 1.5 ميجا',

            'meta_keywords.string' => 'يجب أن تكون كلمات الMeta Tags عبارة عن نص',

            'meta_description.string' => 'يجب أن يكون الMeta Description عبارة عن نص',

            'slug.string' => 'يجب أن يكون الslug عبارة عن نص',
            'slug.unique' => 'هذا الslug متاح في محاضرة أخرى الرجاء إعادة اختيار slug مناسب',

            'price.numeric' => 'يجب أن يكون السعر عبارة عن رقم',

            'required_if.numeric' => 'يجب أن يكون السعر بعد الخصم عبارة عن رقم',

            'discount_expiry_date.date' => 'يجب أن يكون تاريخ انتهاء الخصم عبارة عن تاريخ',

            'subject.exists' => 'الرجاء إختيار مادة دراسية صحيحة',

            'grade.exists' => 'الرجاء اختيار مرحلة دراسية صحيحة',

        ];
    }
}

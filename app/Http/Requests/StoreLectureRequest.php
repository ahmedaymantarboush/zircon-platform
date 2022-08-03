<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLectureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = apiUser();
        if (!$user):
            return apiResponse(false, _('الرجاء قم بتسجيل الدخول'), [], 401);
        endif;
        return ($user->role->name == 'Admin' || $user->role->name == 'Super Admin' || $user->role->name == 'Teacher');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'                     =>   ['required','string','max:50'],
            'semester'                  =>   ['required','string','in:الفصل الدراسي الأول,الفصل الدراسي الثاني'],
            'short_description'         =>   ['required','string','max:50'],
            'description'               =>   ['required','string'],
            'published'                 =>   ['nullable'],
            'promotinal_video_url'      =>   ['required','string','url'],
            'poster'                    =>   ['nullable','image','max:1512'],
            'meta_keywords'             =>   ['nullable','string'],
            'meta_description'          =>   ['nullable','string'],
            'slug'                      =>   ['required','string','unique:lectures,slug'],
            'free'                      =>   ['nullable'],
            'price'                     =>   ['required_unless:free,on'],
            'has_discount'              =>   ['nullable'],
            'final_price'               =>   ['required_if:has_discount,on'],
            'discount_expiry_date'      =>   ['required_if:has_discount,on'],
            'subject'                   =>   ['nullable','exists:subjects,id'],
            'grade'                     =>   ['required','exists:grades,id'],
            'parts'                     =>   ['required'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'عنوان المحاضرة مطلوب',
            'title.string' => 'يجب أن يكون العنوان عبارة عن نص',
            'title.max' => 'أكبر عدد من الحروف هو 50 حرف',

            'semester.required' => 'الفصل الدراسي مطلوب',
            'semester.string' => 'يجب أن يكون الفصل الدراسي عبارة عن نص',
            'semester.in' => 'الرجاء إختيار فصل دراسي صحيح',

            'short_description.required' => 'الوصف القصير مطلوب',
            'short_description.string' => 'يجب أن يكون الوصف القصير عبارة عن نص',
            'short_description.max' => 'أكبر عدد من الحروف هو 50 حرف',

            'description.required' => 'وصف المحاضرة مطلوب',
            'description.string' => 'يجب أن يكون الوصف عبارة عن نص',

            'promotinal_video_url.required' => 'الفيديو الترويجي مطلوب',
            'promotinal_video_url.string' => 'يجب أن يكون الفيديو الترويجي عبارة عن نص',
            'promotinal_video_url.url' => 'الرجاء إدخال رابط صحيح',

            'poster.required' => 'الرجاء رفع الصورة المعبرة عن المحاضرة',
            'poster.image' => 'يجب أن يكون الملف عبارة عن صورة',
            'poster.max' => 'أكبر حجم للصورة يجب أن يكون 1.5 ميجا',

            'mete_keywords.required' => 'كلمات الMeta Tags مطلوبة',
            'meta_keywords.string' => 'يجب أن تكون كلمات الMeta Tags عبارة عن نص',

            'meta_description.required' => 'الMeta Description مطلوب',
            'meta_description.string' => 'يجب أن يكون الMeta Description عبارة عن نص',

            'slug.required' => 'الslug مطلوب',
            'slug.string' => 'يجب أن يكون الslug عبارة عن نص',
            'slug.unique' => 'هذا الslug متاح في محاضرة أخرى الرجاء إعادة اختيار slug مناسب',

            'price.required_unless' => 'السعر مطلوب',
            'price.numeric' => 'يجب أن يكون السعر عبارة عن رقم',

            'final_price.required_if' => 'السعر بعد الخصم مطلوب',
            'final_price.numeric' => 'يجب أن يكون السعر بعد الخصم عبارة عن رقم',

            'discount_expiry_date.required_if' => 'تاريخ انتهاء الخصم مطلوب',
            'discount_expiry_date.date' => 'يجب أن يكون تاريخ انتهاء الخصم عبارة عن تاريخ',

            'subject.required' => 'المادة الدراسية مطلوبة',
            'subject.exists' => 'الرجاء إختيار مادة دراسية صحيحة',

            'grade.required' => 'المرحلة الدراسية مطلوبة',
            'grade.exists' => 'الرجاء اختيار مرحلة دراسية صحيحة',

            'parts.required' => 'الجزئية الدراسية مطلوبة',
        ];
    }

    public function validateResolved()
    {
        $this->prepareForValidation();
        if (! $this->passesAuthorization()) {
            $this->failedAuthorization();
        }
        $validator = $this->getValidatorInstance();
        if ($validator->fails()) {
            return apiResponse(false,_('هناك خطأ في صحة البيانات'),$validator->errors(),400);
        }
        $this->passedValidation();
    }
}

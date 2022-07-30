<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExamRequest extends FormRequest
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
            'title'    =>  ['nullab','string','max:70'],
        ];
    }

    public function messages()
    {
        return [
            'title.required'    =>  _('الرجاء ادخال السؤال'),
            'title.string'      =>  _('يجب أن يكون السؤال عبارة عن نص'),
            'title.max'         =>  _('يجب أن لا يزيد عدد الأحرف عن 70 حرف'),
        ];
    }
}

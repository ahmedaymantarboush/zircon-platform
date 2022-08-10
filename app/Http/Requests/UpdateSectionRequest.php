<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateSectionRequest extends FormRequest
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
            'new_sectionTitle' => ['required','string','max:50'],
        ];
    }

    public function messages()
    {
        return [
            'new_sectionTitle.required' => 'اسم القسم مطلوب',
            'new_sectionTitle.string' => 'يجب أن يكون الاسم عبارة عن نص',
            'new_sectionTitle.max' => 'أكبر عدد من الحروف هو 50 حرف',
        ];
    }
}

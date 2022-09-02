<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePartRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'grade_id' => 'required|integer|exists:grades,id',
            'subject_id' => 'nullable|integer|exists:subjects,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => _("الاسم مطلوب"),
            'name.string' => _("الاسم يجب ان يكون نص"),
            'name.max' => _("الاسم يجب ان لا يزيد عن 255 حرف"),

            'description.required' => _("الوصف مطلوب"),
            'description.string' => _("الوصف يجب ان يكون نص"),
            'description.max' => _("الوصف يجب ان لا يزيد عن 255 حرف"),

            'grade_id.required' => _("الصف مطلوب"),
            'grade_id.integer' => _("الصف يجب ان يكون رقم"),
            'grade_id.exists' => _("الصف غير موجود"),

            'subject_id.required' => _("المادة مطلوبة"),
            'subject_id.integer' => _("المادة يجب ان تكون رقم"),
            'subject_id.exists' => _("المادة غير موجودة"),
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreExamRequest extends FormRequest
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
            'name'    =>  ['required','string'],
            'examStartsAt' => ['required','date_format:Y-m-d\TH:i'],
            'examEndsAt' => ['required','date_format:Y-m-d\TH:i'],
            'grade' => ['required','string','exists:grades,name'],
            // 'subject' => ['required','string','exists:subjects,name'],
            'exam_type'=> ['required','string','in:zirconExam,staticExam'],
            'question_hardness' => ['required','in:1,2,3,4,5'],
            'totalTime' => ['required'],
            'description' => ['required','string'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'    =>  _('الرجاء ادخال اسم الامتحان'),
            'name.string'      =>  _('يجب أن يكون اسم الامتحان عبارة عن نص'),
            'name.max'         =>  _('يجب أن لا يزيد عدد الأحرف عن 70 حرف'),

            'examStartsAt.required' => _('الرجاء ادخال تاريخ ووقت بداية الامتحان'),
            'examStartsAt.date_format' => _('الرجاء ادخال تاريخ ووقت بداية الامتحان بشكل صحيح'),

            'examEndsAt.required' => _('الرجاء ادخال تاريخ ووقت نهاية الامتحان'),
            'examEndsAt.date_format' => _('الرجاء ادخال تاريخ ووقت نهاية الامتحان بشكل صحيح'),

            'grade.required' => _('الرجاء اختيار المرحلة الدراسية'),
            'grade.string' => _('يجب أن يكون المرحلة الدراسية عبارة عن نص'),
            'grade.exists' => _('الرجاء اختيار المرحلة الدراسية بشكل صحيح'),

            // 'subject.required' => _('الرجاء اختيار المادة'),
            // 'subject.string' => _('يجب أن يكون المادة عبارة عن نص'),
            // 'subject.exists' => _('الرجاء اختيار المادة بشكل صحيح'),

            'exam_type.required'=> _('الرجاء اختيار نوع الامتحان'),
            'exam_type.string'=> _('يجب أن يكون نوع الامتحان عبارة عن نص'),
            'exam_type.in'=> _('الرجاء اختيار نوع الامتحان بشكل صحيح'),

            'question_hardness.required' => _('الرجاء اختيار صعوبة الامتحان'),
            'question_hardness.in' => _('الرجاء اختيار صعوبة الامتحان بشكل صحيح'),

            'totalTime.required' => _('الرجاء ادخال وقت الامتحان'),

            'description.required' => _('الرجاء ادخال وصف الامتحان'),
            'description.required' => _('يجب أن يكون وصف الامتحان عبارة عن نص'),
        ];
    }
}

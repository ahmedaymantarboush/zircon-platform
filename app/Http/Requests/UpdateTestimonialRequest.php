<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateTestimonialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = Auth::user();
        return $user ? $user->role->numeber < 4  : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'student_name' => ['required','string'],
            'image' => ['nullable'],
            'degree' => ['required'],
            'content' => ['required'],
            'subject_degree' => ['required'],
            'subject' => ['required'],
            'grade' => ['required'],
            'student_id' => ['nullable'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreTestimonialRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'image' => ['nullable'],
            'degree' => ['required', 'numeric'],
            'subjectDegree' => ['required', 'numeric'],
            'content' => ['required', 'string'],
            'subject' => ['nullable', 'exists:subjects,id'],
            'grade' => ['required', 'exists:grades,id'],
            'student' => ['nullable'],
        ];
    }
}

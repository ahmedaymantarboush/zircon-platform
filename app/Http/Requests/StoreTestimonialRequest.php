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
        dd(request());
        return [
            'name' => ['required','string'],
            'image' => ['nullable','image'],
            'degree' => ['required','numeric'],
            'content' => ['required','string'],
            'subjectDegree' => ['required','numeric'],
            'subject' => ['required','exists:subjects,id'],
            'grade' => ['required','exists:grades,id'],
            'student' => ['nullable'],
        ];
    }
}

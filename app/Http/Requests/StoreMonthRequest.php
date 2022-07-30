<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMonthRequest extends FormRequest
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
            'title'                     =>   ['required','string','max:50'],
            'short_description'         =>   ['required','string','max:100'],
            'description'               =>   ['required','string'],
            'promotinal_video_url'      =>   ['required','string','url'],
            'semester'                  =>   ['required','string','in:الفصل الدراسي الأول,الفصل الدراسي الثاني'],
            'published'                 =>   ['nullable'],
            'show_in_main'              =>   ['nullable'],
            'poster'                    =>   [/*$new?'required':*/'nullable','image','max:1512'],
            'meta_keywords'             =>   ['nullable','string'],
            'meta_description'          =>   ['nullable','string'],
            'slug'                      =>   ['required','string','unique:months,slug'],
            'free'                      =>   ['nullable'],
            'price'                     =>   [array_key_exists('free',$data)?'nullable':'required'],
            'discount_expiry_date'      =>   ['nullable','date'/*,'lt:'.now()*/],
            'final_price'               =>   [array_key_exists('free',$data) ? 'nullable' : ($data['discount_expiry_date']>now()?'nullable':'required')],

        ];
    }
}

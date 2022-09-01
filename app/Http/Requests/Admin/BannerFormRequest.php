<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => [
                'required',
                'string',
                'max:1000',
                'min:5'
            ],
            'description' => [
                'required'
            ],
            'link' => [
            ],
            'bannerimage' => [
                'required',
                'mimes:jpeg,jpg,png,webp,gif'
            ],
            
        ];
        return $rules;
    }
}

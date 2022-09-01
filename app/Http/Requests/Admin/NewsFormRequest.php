<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsFormRequest extends FormRequest
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
                'max:1000'
            ],
            'slug' => [
                'required',
            ],
            'description' => [
                'required'
            ],
            'status' => [
                'required'
            ],
            'coverimage' => [
                'mimes:jpeg,jpg,png'
            ],
        ];
        return $rules;
    }
}
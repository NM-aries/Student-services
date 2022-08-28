<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
            'category_id' => [
                'required',
                'integer'
            ],
            'name' => [
                'required',
                'string',
                'max:100'
            ],
            'slug' => [
                'required',
                'string',
                'max:100'
            ],
            'description' => [
                'required'
            ],
            'meta_title' => [
                'required',
                'string',
                'max:200'
            ],
            'meta_description' => [
                'required',
                'string',
                'max:200'
            ],
            'meta_keyword' => [
                'required',
                'string',
                'max:200'
            ],
        ];

        return $rules;
    }
}

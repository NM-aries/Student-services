<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementFormRequest extends FormRequest
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
                'mimes:jpeg,jpg,png,webp'
            ],
            // 'meta_title' => [
            //     'required',
            //     'string',
            //     'max:200'
            // ],
            // 'meta_description' => [
            //     'required',
            //     'string',
            //     'max:200'
            // ],
            // 'meta_keyword' => [
            //     'required',
            //     'string',
            //     'max:200'
            // ],
        ];
        return $rules;
    }
}

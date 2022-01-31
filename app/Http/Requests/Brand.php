<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Brand extends FormRequest
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
        return [
            'title' => 'required|string',
            'image' => 'required|mimes:png,svg,gif',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'please fill in the required fields ( Brand name )',
            'image.required' => 'please fill in the required fields ( Brand icon )',
            'image.mimes' => 'please fill in the format icon ( png , svg )',
        ];
    }
}

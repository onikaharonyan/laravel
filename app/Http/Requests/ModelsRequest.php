<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModelsRequest extends FormRequest
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
            'brand_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'please fill in the required fields ( Model name )',
            'brand_id.required' => 'please fill in the required fields ( Brand )',
        ];
    }
}

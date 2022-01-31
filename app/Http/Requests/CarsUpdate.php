<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarsUpdate extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'year' => 'required',
            'mileage' => 'required|string|max:255',
            'engine' => 'required|numeric|max:10',
            'towing' => 'required|string|max:255',
            'wheel' => 'required|string|max:255',
            'gearbox' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'model' => 'required',
            'image.*' => 'mimes:png,svg,jpeg,jpg',
        ];
    }

    public function messages () {
        return [
            'title.required' => 'please fill in the required fields ( Car name )',
            'description.required' => 'rplease fill in the required fields ( Car description )',
            'year.required' => 'please fill in the required fields ( Car year )',
            'mileage.required' => 'please fill in the required fields ( Car mileage )',
            'engine.required' => 'please fill in the required fields ( Car engine )',
            'towing.required' => 'please fill in the required fields ( Car towing )',
            'wheel.required' => 'please fill in the required fields ( Car wheel )',
            'gearbox.required' => 'please fill in the required fields ( Car gearbox )',
            'color.required' => 'please fill in the required fields ( Car color )',
            'model_cars.required' => 'please fill in the required fields ( Car model )',
            'image.required' => 'please fill in the required fields ( Car images )',
        ];
    }
}

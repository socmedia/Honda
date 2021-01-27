<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'banners' => 'required|max:512|mimes:png,jpg,jpeg,webp',
            'features.*.name' => 'required|max:512|mimes:png,jpg,jpeg,webp',
            'banners.*.feature_description' => 'required|max:512|mimes:png,jpg,jpeg,webp',
            'banners.*' => 'required|max:512|mimes:png,jpg,jpeg,webp',
            'banners.*' => 'required|max:512|mimes:png,jpg,jpeg,webp',
            'banners.*' => 'required|max:512|mimes:png,jpg,jpeg,webp',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
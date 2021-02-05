<?php

namespace Modules\HGP\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenuinePartRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() === 'PUT') {
            return [
                'name' => 'required|max:191',
                'thumbnail' => 'required|mimes:png,jpg,jpeg,webp|max:512',
                'description' => 'required',
                'description_image' => 'nullable|mimes:png,jpg,jpeg,webp|max:512',
                'function' => 'required',
                'function_image' => 'nullable|mimes:png,jpg,jpeg,webp|max:512',
            ];
        }

        return [
            'name' => 'required|max:191',
            'thumbnail' => 'required|mimes:png,jpg,jpeg,webp|max:512',
            'description' => 'required',
            'description_image' => 'nullable|mimes:png,jpg,jpeg,webp|max:512',
            'function' => 'required',
            'function_image' => 'nullable|mimes:png,jpg,jpeg,webp|max:512',
            'advantages.*.advantage_name' => 'required|max:191',
            'advantages.*.advantage_description' => 'required|max:500',
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

    public function messages()
    {
        return [
            'advantages.*.advantage_name.required' => 'The advantage name field is required',
            'advantages.*.advantage_description.required' => 'The advantage description field is required',
            'advantages.*.advantage_name.max' => 'The advantage name max. 191 characters',
            'advantages.*.advantage_description.max' => 'The advantage description max. 500 characters',
        ];
    }
}

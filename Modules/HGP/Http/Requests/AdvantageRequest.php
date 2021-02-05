<?php

namespace Modules\HGP\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvantageRequest extends FormRequest
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
                'advantage_name' => 'required|max:191',
                'advantage_description' => 'required|max:500',
            ];
        }
        return [
            'c_advantage_name' => 'required|max:191',
            'c_advantage_description' => 'required|max:500',
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
            'c_advantage_name.required' => 'The advantage name field is required.',
            'c_advantage_description.required' => 'The advantage description field is required.',
            'c_advantage_name.max' => 'The advantage name may not be greater than 191 characters.',
            'c_advantage_description.max' => 'The advantage description may not be greater than 191 characters.',
        ];
    }
}
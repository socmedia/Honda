<?php

namespace Modules\Accessories\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccessoriesRequest extends FormRequest
{
    public $imageRule;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->method() === 'PUT' ? $this->imageRule = 'nullable' : $this->imageRule = 'required';

        return [
            'name' => 'required|max:191|min:3|' . Rule::unique('accessories', 'name')->ignore($this->id),
            'parts_number' => 'required|min:3|max:191',
            'image' => $this->imageRule . '|mimes:png,jpg,jpeg,webp|max:512',
            'price' => 'required|max:191',
            'product' => 'required',
            'colors.*' => 'required|size:7',
            'function' => 'required',
            'material' => 'required',
            'show_in_catalogue' => 'nullable',
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
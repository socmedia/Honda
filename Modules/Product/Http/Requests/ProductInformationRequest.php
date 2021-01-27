<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductInformationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'thumbnail' => 'required|mimes:png,jpg,jpeg,webp|max:512',
            'name' => 'required',
            'category' => 'required|in:matic,cub,sport,big-bike',
            'price' => 'required|numeric',
            'promo_price' => 'nullable|numeric',
            'is_new' => 'nullable|boolean',
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
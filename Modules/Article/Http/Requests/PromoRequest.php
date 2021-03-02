<?php

namespace Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PromoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                $thumbnailRule = 'required';
                break;

            case 'PUT':
                $thumbnailRule = 'nullable';
                break;
        }

        return [
            'title' => 'required|min:3|max:191|' . Rule::unique('articles', 'title')->ignore($this->id),
            'thumbnail' => $thumbnailRule . '|mimes:png,jpg,jpeg,webp|max:256',
            'type' => 'required|in:promo,event',
            'subject' => 'required|min:10',
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
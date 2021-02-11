<?php

namespace Modules\Apparel\Http\Requests;

use App\Constants\ApparelCategories;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ApparelRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $categories = new ApparelCategories();
        $arr = $categories->getAll()->toArray();
        $map = array_map(function ($arr) {
            return $arr['slug_name'];
        }, $arr);

        if ($this->method() === 'PUT') {
            $image = 'nullable';
        } else {
            $image = 'required';
        }

        return [
            'name' => 'required|min:3|max:191|' . Rule::unique('apparels', 'name')->ignore($this->id),
            'category' => 'required|string|in:' . implode(',', $map),
            'thumbnail' => $image . '|mimes:png,jpg,jpeg,webp|max:512',
            'materials' => 'required',
            'sizes' => 'required',
            'price' => 'required',
            'images.*.image' => 'nullable|mimes:png,jpg,jpeg,webp|max:512',
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
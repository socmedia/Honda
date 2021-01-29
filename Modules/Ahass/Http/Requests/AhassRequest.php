<?php

namespace Modules\Ahass\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AhassRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $city = "3301,3302,3303,3304,3305,3306,3307,3308,3309,3310,3311,3312,3313,3314,3315,3316,3317,3318,3319,3320,3321,3322,3323,3324,3325,3326,3327,3328,3329,3371,3372,3373,3374,3375,3376";

        return [
            'name' => 'required|max:191',
            'city' => 'required|in:' . $city,
            'address' => 'required|max:191',
            'phone_1' => 'required',
            'phone_2' => 'nullable',
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
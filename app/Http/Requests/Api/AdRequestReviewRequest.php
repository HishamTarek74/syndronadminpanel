<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AdRequestReviewRequest extends FormRequest
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
            'review'   => 'required|numeric|between:0.00,5.00',
            'comment'  => 'required|string',
            'ad_id'   => 'required|integer|exists:ads,id'
        ];
    }
}

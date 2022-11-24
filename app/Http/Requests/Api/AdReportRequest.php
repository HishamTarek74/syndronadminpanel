<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AdReportRequest extends FormRequest
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
            'ad_id' => 'required|integer|exists:ads,id',
            //'reporter_id' => 'required|integer|exists:users,id',
            'type'   => 'required|string|in:ad_sold,immoral_ad,an_ad_at_wrong_section,otherwise',
            'note'   => 'nullable|string'
        ];
    }
}

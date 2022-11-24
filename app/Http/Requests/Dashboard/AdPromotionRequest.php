<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class AdPromotionRequest extends FormRequest
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
        return RuleFactory::make([
            'start' => ['required', 'date', 'before:end'],
            'end' => ['required', 'date', 'after:start'],
            'ad_id' => ['required', 'exists:ads,id'],
            'type' => ['required', 'in:special,vip']
        ]);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return RuleFactory::make(trans('ad_promotions.attributes'));
    }
}

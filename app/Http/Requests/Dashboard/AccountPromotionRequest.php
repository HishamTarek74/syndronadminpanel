<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class AccountPromotionRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id']
        ]);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return RuleFactory::make(trans('account_promotions.attributes'));
    }
}

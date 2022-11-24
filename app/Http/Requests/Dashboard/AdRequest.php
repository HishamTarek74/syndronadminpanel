<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class AdRequest extends FormRequest
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
            '%name%' => ['required', 'string', 'max:255'],
            '%description%' => ['required'],
            'price' => ['required'],
        ]);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return RuleFactory::make(trans('ads.attributes'));
    }
}

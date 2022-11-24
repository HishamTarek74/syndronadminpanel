<?php

namespace App\Http\Requests\Api;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddAdsRequest extends FormRequest
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
            '%name%'            => 'required|string',
            '%description%'            => 'required|string',
            'price'            => 'required|numeric',
            'category_id'      => 'required|numeric|exists:categories,id',
            'country_id'         => 'required|numeric|exists:countries,id',
            'city_id'          => 'required|numeric|exists:cities,id',
            'area_id'          => 'nullable|numeric|exists:areas,id',
            'hide_contacts'   =>'required|boolean',
            'disable_comments'   =>'required|boolean',
            'options'     => ['array','required']
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
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}

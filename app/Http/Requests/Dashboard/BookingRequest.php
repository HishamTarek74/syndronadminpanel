<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class BookingRequest extends FormRequest
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
        return RuleFactory::make(
            [
                'customer_id' => ['required_without:customer_name', 'exists:users,id'],
                'customer_name' => ['required_without:customer_id'],
                'customer_phone' => ['required_without:customer_id'],
                'package_id' => ['required', 'exists:packages,id'],
                'type' => ['sometimes', Rule::in(array_keys(trans('bookings.types')))],
                'time' => ['required'],
                'notes' => ['nullable'],
                'price' => ['required'],
                'tax' => ['required'],
            ]
        );
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return RuleFactory::make(trans('bookings.attributes'));
    }
}

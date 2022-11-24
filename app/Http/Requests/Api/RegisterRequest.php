<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{

    /**
     * Determine if the supervisor is authorized to make this request.
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
            'country_id'=>'required|numeric|exists:countries,id',
            'age_group_id'=>'nullable|numeric|exists:age_groups,id',
            'gender'=>['nullable','string',Rule::in(['male','female'])],
            'access_token' => 'required|string',
            'firebase_id'=>'required|string',
            'name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'email'=>'nullable|email|unique:users,email',
            'phone'=>'required|string|max:255|unique:users,phone',
            'password'=>['required','string',Password::min(8)->letters()->symbols()->numbers()],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('auth.attributes');
    }
}

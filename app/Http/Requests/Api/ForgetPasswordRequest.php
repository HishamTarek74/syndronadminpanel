<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ForgetPasswordRequest extends FormRequest
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
            'access_token' => 'required|string',
            'phone'=>'required|string|max:255|exists:users,phone',
            'password' => ['required','confirmed',Password::min(8)->letters()->symbols()->numbers()],
            'firebase_id'=>'required|string',
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

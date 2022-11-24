<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class OpenningScreenRequest extends FormRequest
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
        if ($this->isMethod('POST')) {
            return $this->createRules();
        } else {
            return $this->updateRules();
        }
    }

    /**
     * Get the create validation rules that apply to the request.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'url' => ['required', 'string', 'max:255'],
            'country_id' => ['required', 'exists:countries,id'],
            'city_id' => ['required', 'exists:cities,id'],
        ];
    }

    /**
     * Get the update validation rules that apply to the request.
     *
     * @return array
     */
    public function updateRules()
    {
        return [
            'url' => ['required', 'string', 'max:255'],
            'country_id' => ['required', 'exists:countries,id'],
            'city_id' => ['sometimes'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('openning_screens.attributes');
    }
}

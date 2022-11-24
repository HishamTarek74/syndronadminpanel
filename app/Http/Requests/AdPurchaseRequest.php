<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdPurchaseRequest extends FormRequest
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
           'ad_id'   =>'required|numeric|exists:ads,id',
           'status'  => 'required|string|in:bending,accepted,refused',


        ];
    }
}

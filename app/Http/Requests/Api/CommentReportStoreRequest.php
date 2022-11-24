<?php

namespace App\Http\Requests\Api;

use App\Models\Ad;
use App\Models\Comment;
use App\Models\CommentReport;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CommentReportStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('sanctum')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ad_id'=>['required',Rule::exists(Ad::class,'id')],
            'reporter_id'=>['required',Rule::exists(User::class,'id')],
            'comment_id'=>['required',Rule::exists(Comment::class,'id')],
            'type'=>['required',Rule::in(CommentReport::TYPES)],
            'description'=>['nullable','string',Rule::requiredIf(fn ()  => request('type') == CommentReport::OTHER_TYPE)]
        ];
    }
}

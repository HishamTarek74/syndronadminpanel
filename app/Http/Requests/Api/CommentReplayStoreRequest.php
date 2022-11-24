<?php

namespace App\Http\Requests\Api;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CommentReplayStoreRequest extends FormRequest
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
            'user_id'=>['required',Rule::exists(User::class,'id')],
            'comment_id'=>['required',Rule::exists(Comment::class,'id')],
            'replay'=>['required','string']
        ];
    }
}

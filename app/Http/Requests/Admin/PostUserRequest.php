<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class PostUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'name' => 'required',
            'birthday' => 'required',
            'gender' => 'nullable|in:'.User::MALE.','.User::FEMALE.'',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role_id' => 'required|exists:roles,id'
        ];
    }
}

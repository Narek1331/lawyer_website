<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class SigninRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|string|email|exists:users,email|max:255',
            'password' => 'required|string|min:8',
        ];
    }
}

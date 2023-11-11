<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => 'required|max:255|min:3',
        'lastName' => 'required|max:255|min:3',
        'username' => 'required|max:255|min:3|unique:users',
        'email' => 'required|max:255|min:3|unique:users|email',
        'password' => 'required|max:255|min:8',
        ];
    }
}
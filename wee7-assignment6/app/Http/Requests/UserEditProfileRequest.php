<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => 'max:255|min:3',
        'lastName' => 'max:255|min:3',
        'email' => 'max:255|email|unique:users,email,'.auth()->user()->id,
        // 'password' => ['max:255','min_if_not_null:3,23'], here 3, 23 are the parameter of the min_if_not_null
        'password' => ['max:255','min_if_not_null:8'],
        'bio' => [ 'max:255', 'min_if_not_null:3'],
        ];
    }
}
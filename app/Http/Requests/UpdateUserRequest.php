<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => ['required','string'],
            'email' => ['required','email','string'],
            'password' => ['sometimes']
        ];
    }

    public function message() {
        return [
            'name.string' => 'El nombre debe de ser una cadena de texto',
            'name.required' => 'El campo de nombre no puede estar vacio',

            'email.required' => 'El correo no puede estar vacio',
            'email.email' => 'El correo debe de ser en formato email "example@email.com"',
            'email.string' => 'El correo debe de ser una cadena de texto',
        ];
    }
}

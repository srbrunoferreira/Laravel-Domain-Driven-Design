<?php

namespace Domain\User\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

final class CreateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O campo de senha é obrigatório.',
            'password.required' => 'O campo de senha é obrigatório.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response([
            $validator->errors(),
        ]), 422);
    }
}

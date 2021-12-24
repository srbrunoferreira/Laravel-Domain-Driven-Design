<?php

namespace Domain\User\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

final class UserStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'O campo de senha é obrigatório.',
            'password.required' => 'O campo de senha é obrigatório.',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response([
            $validator->errors(),
        ]), 422);
    }
}

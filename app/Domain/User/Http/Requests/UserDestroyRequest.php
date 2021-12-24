<?php

namespace Domain\User\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

final class UserDestroyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'O ID do usuário é obrigatório.',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response([
            $validator->errors(),
        ]), 422);
    }
}

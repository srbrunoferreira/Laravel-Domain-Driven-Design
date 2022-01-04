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
            'id' => ['bail', 'required', 'integer', 'min:1', 'max:4294967295', 'exists:Domain\User\Entities\User,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'O ID do usuário é obrigatório.',
            'id.exists' => 'User not found.',
        ];
    }

    protected function prepareForValidation()
    {
        /*
        userId is a route parameter and now is the id of the
        array returned from this.rules() method. So, it is attributed to validation
        */
        $this->merge(['id' => $this->route('userId')]);
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response([
            $validator->errors(),
        ]), 422);
    }
}

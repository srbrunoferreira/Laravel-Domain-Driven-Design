<?php

namespace Domain\User\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

final class UserSelectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'ids' => 'min:2|max:3', // array of ids, whereIn('status', $request->statuses), whereInPivot('user_id', $request->userIds)
            'ids.*' => 'distinct:strict',
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

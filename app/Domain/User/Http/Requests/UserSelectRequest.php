<?php

namespace Domain\User\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

final class UserSelectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'ids' => [
                'array',
                'min:2',
                'max:' . config('constants.pagination.default_items_per_page'),
            ],
            'ids.*' => 'distinct:strict',
            'orderBy' => ['bail', 'nullable', 'string', 'max:10', Rule::in(['id', 'name', 'email', 'created_at', 'updated_at'])],
            'orderByDirection' => ['bail', 'nullable', 'string', 'min: 3', 'max:4', Rule::in('asc', 'desc')],
            'name' => ['bail', 'nullable', 'string', 'min:2', 'max:255'],
            'email' => ['bail', 'nullable', 'string', 'min:2', 'max:255'],
            'createdAt' => ['bail', 'nullable', 'string', 'min:2', 'max:255'],
            'updatedAt' => ['bail', 'nullable', 'string', 'min:2', 'max:255'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'orderBy' => $this->input('orderBy'),
            'orderByDirection' => $this->input('orderByDirection'),
            'id' => $this->input('id'),
            'name' => $this->input('name'),
            'email' => $this->input('email'),
            'createdAt' => $this->input('createdAt'),
            'updatedAt' => $this->input('updatedAt'),
        ]);
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response([
            $validator->errors(),
        ]), 422);
    }
}

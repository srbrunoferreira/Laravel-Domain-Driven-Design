<?php

namespace Domain\User\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

final class UserUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['bail', 'required', 'integer', 'min:1', 'max:30'],
            'name' => ['bail', 'required_without_all:email,password', 'string', 'min:5', 'alpha', 'max:255'],
            'email' => ['bail', 'required_without_all:name,password', 'string', 'min:10', 'max:255'],
            'password' => ['bail', 'required_without_all:name,email', 'string', 'min:8', 'max:255'],
        ];
    }

    /**
     * @see https://stackoverflow.com/a/63999403/14839095
     * @see https://laravel.com/docs/master/validation#preparing-input-for-validation
     */
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

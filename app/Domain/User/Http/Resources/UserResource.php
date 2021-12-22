<?php

namespace Domain\User\Http\Resources;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

final class UserResource extends FormRequest
{
    public function rules(Request $request): array
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
        ];
    }
}

<?php

namespace Domain\User\DataTransferObjects\Factories;

use Infrastructure\Contracts\DataTransferObjectInterface;
use Illuminate\Foundation\Http\FormRequest;
use Domain\User\DataTransferObjects\UserData;

class UserDataFactory implements DataTransferObjectInterface
{
    public static function fromRequest(FormRequest $request): UserData
    {
        return new UserData([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
        ]);
    }

    public static function fromStoreRequest(FormRequest $request): UserData
    {
        return new UserData([
            'name' => $request->name,
            'email' => $request->email,
        ]);
    }

    public static function fromUpdateRequest(FormRequest $request): UserData
    {
        return new UserData([
            'id' => $request->id,
            'name' => $request->name ?? '', // $request->"newName"
            'email' => $request->email ?? '', // $request->"newEmail"
            'password' => $request->password ?? '',
        ]);
    }

    public static function fromDeleteRequest(FormRequest $request): UserData
    {
        return new UserData([
            'id' => $request->id,
            'anotherPossibleField' => $request->anotherPossibleField,
        ]);
    }

    public static function fromIndexRequest(FormRequest $request): UserData
    {
        return new UserData([
            'id' => $request->id,
        ]);
    }

    public static function fromShowRequest(FormRequest $request): UserData
    {
        return new UserData([
            'id' => $request->id,
            'name' => $request->name ?? '',
            'email' => $request->email ?? '',
            'password' => $request->password ?? '',
        ]);
    }
}

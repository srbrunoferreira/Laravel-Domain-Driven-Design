<?php

namespace Domain\User\DataTransferObjects\Factories;

use Infrastructure\Contracts\DataTransferObjectFactoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use Domain\User\DataTransferObjects\UserData;

class UserDataFactory implements DataTransferObjectFactoryInterface
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
            'password' => $request->password,
        ]);
    }

    public static function fromUpdateRequest(FormRequest $request): UserData
    {
        return new UserData([
            'id' => $request->id,
            'name' => $request->name ?? 's',
            'email' => $request->email ?? 'a',
            'password' => $request->password ?? 'd',
        ]);
    }

    public static function fromDeleteRequest(FormRequest $request): UserData
    {
        return new UserData(['id' => $request->id]);
    }

    public static function fromIndexRequest(FormRequest $request): UserData
    {
        return new UserData(['ids' => $request->ids ?? null]);
    }

    public static function fromShowRequest(FormRequest $request): UserData
    {
        return new UserData(['id' => $request->id]);
    }
}
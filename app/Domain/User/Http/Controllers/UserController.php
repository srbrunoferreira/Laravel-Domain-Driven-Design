<?php

namespace Domain\User\Http\Controllers;

use Domain\User\Http\Requests\UserUpdateRequest;
use Domain\User\Http\Requests\UserStoreRequest;
use Domain\User\Http\Requests\UserShowRequest;
use Domain\User\Http\Requests\UserSelectRequest;
use Domain\User\Http\Requests\UserDestroyRequest;
use Application\Core\Http\Controllers\Controller;

final class UserController extends Controller
{
    public function index(UserSelectRequest $request)
    {
        return response([
            'method' => __METHOD__,
            'requestAll()' => $request->all(),
        ], 200);
    }

    public function store(UserStoreRequest $request)
    {
        return response([
            'method' => __METHOD__,
            'requestAll()' => $request->all(),
        ], 200);
    }

    public function show(UserShowRequest $request)
    {
        return response([
            'method' => __METHOD__,
            'requestAll()' => $request->all(),
        ], 200);
    }

    public function update(UserUpdateRequest $request)
    {
        return response([
            'method' => __METHOD__,
            'requestAll()' => $request->all(),
        ], 200);
    }

    public function destroy(UserDestroyRequest $request)
    {
        return response([
            'method' => __METHOD__,
            'requestAll()' => $request->all(),
        ], 200);
    }
}

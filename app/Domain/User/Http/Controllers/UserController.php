<?php

namespace Domain\User\Http\Controllers;

use Domain\User\Http\Requests\UserUpdateRequest;
use Domain\User\Http\Requests\UserStoreRequest;
use Domain\User\Http\Requests\UserShowRequest;
use Domain\User\Http\Requests\UserSelectRequest;
use Domain\User\Http\Requests\UserDestroyRequest;
use Domain\User\DataTransferObjects\Factories\UserDataFactory;
use Domain\User\Contracts\UserRepositoryInterface;
use Application\Core\Http\Controllers\Controller;

final class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(UserSelectRequest $request)
    {
        return response([
            'method' => __METHOD__,
            'requestAll()' => $request->all(),
        ], 200);
    }

    public function store(UserStoreRequest $request)
    {
        $requestData = UserDataFactory::fromStoreRequest($request);

        return response([
            'method' => __METHOD__,
            'requestData' => $requestData,
            'userRepository' => $this->userRepository->store($requestData),
        ], 200);
    }

    public function show(UserShowRequest $request)
    {
        $requestData = UserDataFactory::fromShowRequest($request);

        return response([
            'method' => __METHOD__,
            'requestData' => $requestData,
            'userRepository' => $this->userRepository->findOneById($requestData->id),
        ], 200);
    }

    public function update(UserUpdateRequest $request)
    {
        $requestData = UserDataFactory::fromUpdateRequest($request);

        return response([
            'method' => __METHOD__,
            'requestData' => $requestData,
            'properties' => $requestData->getFilledData(),
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

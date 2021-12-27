<?php

namespace Domain\User\Http\Controllers;

use Domain\User\Http\Resources\UserResource;
use Domain\User\Http\Resources\UserCollection;
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
        $data = $request->ids
        ? $this->userRepository->findByIdWhereIn($request->ids)
        : $this->userRepository->getAll();

        return response(['data' => new UserCollection($data)], 200);
    }

    public function store(UserStoreRequest $request)
    {
        $requestData = UserDataFactory::fromStoreRequest($request)->toArray();

        return response(['user' => $this->userRepository->store($requestData)], 201);
    }

    public function show(UserShowRequest $request)
    {
        $requestData = UserDataFactory::fromShowRequest($request);
        $user = $this->userRepository->findOneById($requestData->getId());

        return response(['user' => new UserResource($user)], 200);
    }

    public function update(UserUpdateRequest $request)
    {
        $userUpdateData = UserDataFactory::fromUpdateRequest($request);

        $userId = $userUpdateData->getId();
        $updateData = $userUpdateData->toArray();

        unset($updateData['id']);

        $this->userRepository->update($userId, $updateData);

        return response([
            'method' => __METHOD__,
            'user' => $this->userRepository->findOneById($userId),
        ], 200);
    }

    public function destroy(UserDestroyRequest $request)
    {
        $response = $this->userRepository->delete($request->userId);

        /**
         * TODO: Create a delete user action, check if
         * the user exists or not and return the appropriate response.
         * or continue using https://laravel.com/docs/8.x/validation#specifying-a-custom-column-name
         */

        return response([$response], 200);
    }
}

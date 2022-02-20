<?php

namespace Domain\User\Http\Controllers;

use Infrastructure\Http\BaseController;
use Domain\User\Http\Resources\UserResource;
use Domain\User\Http\Requests\UserUpdateRequest;
use Domain\User\Http\Requests\UserStoreRequest;
use Domain\User\Http\Requests\UserShowRequest;
use Domain\User\Http\Requests\UserSelectRequest;
use Domain\User\Http\Requests\UserDestroyRequest;
use Domain\User\DataTransferObjects\Factories\UserDataFactory;
use Domain\User\Contracts\UserRepositoryInterface;
use Domain\User\Contracts\UserDataFactoryInterface;

final class UserController extends BaseController
{
    private UserRepositoryInterface $userRepository;
    private UserDataFactoryInterface $userDataFactory;

    public function __construct(
        UserRepositoryInterface $userRepository,
        UserDataFactoryInterface $userDataFactory
    ) {
        $this->userRepository = $userRepository;
        $this->userDataFactory = $userDataFactory;
    }

    public function index(UserSelectRequest $request)
    {
        if ($request->ids) {
            $users = $this->userRepository->findByIdWhereIn($request->ids);
        } else {
            $requestData = $this->userDataFactory->fromIndexRequest($request);

            $users=  $this->userRepository->getAll($requestData->getFilters());
        }

        return parent::response($users)->success();
    }

    public function store(UserStoreRequest $request)
    {
        $requestData = UserDataFactory::fromStoreRequest($request)->toArray();
        $user = $this->userRepository->store($requestData);

        return response(['user' => new UserResource($user)], 201);
    }

    public function show(UserShowRequest $request)
    {
        $requestData = $this->userDataFactory->fromShowRequest($request);
        $userData = $this->userRepository->findOneById($requestData->getId());

        $user = new UserResource($userData);

        return parent::response(['user' => $user])->success();
    }

    public function update(UserUpdateRequest $request)
    {
        $userUpdateData = $this->userDataFactory->fromUpdateRequest($request);

        $userId = $userUpdateData->getId();
        $updateData = $userUpdateData->toArray();

        unset($updateData['id']);

        $this->userRepository->update($userId, $updateData);
        $user = $this->userRepository->findOneById($userId);

        return response(['user' => new UserResource($user)]);
    }

    public function destroy(UserDestroyRequest $request)
    {
        /**
         * TODO: Create a delete user action, check if
         * the user exists or not and return the appropriate response.
         * or continue using https://laravel.com/docs/8.x/validation#specifying-a-custom-column-name
         */

        $this->userRepository->delete($request->userId);

        return response()->noContent();
    }
}

<?php

namespace Domain\User\Http\Controllers;

use Application\Core\Http\Controllers\Controller;
use Domain\User\Http\Requests\CreateUserRequest;

final class UserController extends Controller {
    public function index() {
        //
    }

    public function store(CreateUserRequest $request) {
        return response(['endpoint successfully reached']);
    }
}

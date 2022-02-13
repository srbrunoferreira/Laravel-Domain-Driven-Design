<?php

use Illuminate\Support\Facades\Route;
use Domain\User\Http\Controllers\UserController;

Route::apiResource('users', UserController::class)->parameter('users', 'userId');

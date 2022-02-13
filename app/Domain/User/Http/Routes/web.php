<?php

use Infrastructure\Http\BaseController;
use Illuminate\Support\Facades\Route;

Route::resource('web/resource', BaseController::class);

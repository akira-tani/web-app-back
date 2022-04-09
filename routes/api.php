<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::apiResource('/user', UserController::class)->only([
    'index', 'store', 'show'
]);

Route::apiResource('/post', UserController::class)->only([
    'index', 'store', 'show', 'destroy'
]);
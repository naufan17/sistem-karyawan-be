<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Auth\AuthController;

Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'v1'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::group(['prefix' => 'v1'], function () {
    Route::post('/auth/register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('/auth/login', [AuthController::class, 'login'])
        ->name('login');

    Route::apiResource('/employes', EmployeeController::class);
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\EmployeeController;

Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'v1'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('/employes', EmployeeController::class);
});

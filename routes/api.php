<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Auth\AuthController;

// Authentication Routes
Route::group(['prefix' => 'v1/auth'], function () {
    Route::post('/register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login');

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::delete('/logout', [AuthController::class, 'logout'])
            ->name('logout');        
    });
});

// Employee Routes
Route::group(['prefix' => 'v1/employes'], function () {
    Route::get('/', [EmployeeController::class, 'index'])
        ->name('employes.index');

    Route::get('/{id}', [EmployeeController::class, 'show'])
        ->name('employes.show');

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
        
        Route::post('/', [EmployeeController::class, 'store'])
            ->name('employes.store');
    
        Route::put('/{id}', [EmployeeController::class, 'update'])
            ->name('employes.update');
    
        Route::delete('/{id}', [EmployeeController::class, 'destroy'])
            ->name('employes.destroy');            
    });

    // Route::apiResource('/', EmployeeController::class);
});

// User Routes
Route::group(['prefix' => 'v1', 'middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });        
});

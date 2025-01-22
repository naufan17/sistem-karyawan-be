<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiOkResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Responses\ApiBadRequestResponse;
use App\Http\Responses\ApiCreatedResponse;
use App\Http\Responses\ApiInternalServerErrorResponse;
use App\Http\Responses\ApiUnauthorizedResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validateData = Validator::make($request->all(), [
                'name' => 'required|string|max:100',
                'email' => 'required|string|email|max:100',
                'password' => 'required|string|min:8',
            ]);

            if ($validateData->fails()) {
                return new ApiBadRequestResponse($validateData->errors());
            }

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->string('password')),
            ]);

            return new ApiCreatedResponse('New user registered successfully');
        } catch (\Throwable $th) {
            error_log($th->getMessage());
            return new ApiInternalServerErrorResponse();
        }
    }

    public function login(Request $request)
    {
        try {
            $validateData = Validator::make($request->all(), [
                'email' => 'required|string|email|max:100',
                'password' => 'required|string|min:8',
            ]);

            if ($validateData->fails()) {
                return new ApiBadRequestResponse($validateData->errors());
            }

            if (!Auth::attempt($request->only('email', 'password'))) {
                return new ApiUnauthorizedResponse('Email or password is incorrect');
            }

            $user = User::where('email', $request->email)->firstOrFail();

            $token = $user->createToken('auth_token')->plainTextToken;

            return new ApiOkResponse('User logged in successfully', [
                'access_token' => $token,
                'token_type' => 'Bearer',                
            ]);
        } catch (\Throwable $th) {
            error_log($th->getMessage());
            return new ApiInternalServerErrorResponse();
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return new ApiOkResponse('User logged out successfully');
        } catch (\Throwable $th) {
            error_log($th->getMessage());
            return new ApiInternalServerErrorResponse();
        }
    }
}

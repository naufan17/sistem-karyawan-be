<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;

class ApiInternalServerErrorResponse implements Responsable
{
  public function __construct() {}

  public function toResponse($request)
  {
    return response()->json([
      'success' => false,
      'message' => 'Internal Server Error',
    ], Response::HTTP_INTERNAL_SERVER_ERROR);
  }
}
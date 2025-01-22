<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;

class ApiUnauthorizedResponse implements Responsable
{
  public function __construct(
    private string $message,
  ) {}

  public function toResponse($request)  
  {
    return response()->json([
      'success' => false,
      'message' => $this->message,
    ], Response::HTTP_UNAUTHORIZED);
  }
}
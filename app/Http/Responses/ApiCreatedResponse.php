<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;

class ApiCreatedResponse implements Responsable
{
  public function __construct(
    private string $message,
  ) {}

  public function toResponse($request)  
  {
    return response()->json([
      'success' => false,
      'message' => $this->message,
    ], Response::HTTP_CREATED);
  }
}
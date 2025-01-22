<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;

class ApiInternalServerErrorResponse implements Responsable
{
  public function __construct(
    private bool $success,
  ) {}

  public function toResponse($request)
  {
    return response()->json([
      'success' => $this->success,
      'message' => 'Internal Server Error',
    ]);
  }
}
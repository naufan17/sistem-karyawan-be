<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;

class ApiNotFoundResponse implements Responsable
{
  public function __construct(
    private bool $success,
    private string $message,
  ) {}

  public function toResponse($request)
  {
    return response()->json([
      'success' => $this->success,
      'message' => $this->message,
    ]);
  }
}
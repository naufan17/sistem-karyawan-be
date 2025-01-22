<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;

class ApiOkResponse implements Responsable
{
  public function __construct(
    private bool $success,
    private string $message,
    private mixed $data
  ) {}

  public function toResponse($request)  
  {
    return response()->json([
      'success' => $this->success,
      'message' => $this->message,
      'data' => $this->data
    ]);
  }
}
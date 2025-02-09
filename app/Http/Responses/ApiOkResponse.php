<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;

class ApiOkResponse implements Responsable
{
  public function __construct(
    private string $message,
    private mixed $data = null
  ) {}

  public function toResponse($request)  
  {
    return response()->json([
      'success' => true,
      'message' => $this->message,
      'data' => $this->data
    ],  Response::HTTP_OK);
  }
}
<?php

namespace App\Traits;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

trait ResponseAPI
{
    /**
     * Core of response
     *
     * @param   string          $message
     * @param   array|object    $data
     * @param   integer         $statusCode
     * @param   boolean         $isSuccess
     */
    public function coreResponse($message, $data = null, $statusCode,$resource, $isSuccess = true)
    {
        // Check the params
        if(!$message) return response()->json(['message' => 'Message is required'], 500);

        // Send the response
        if($isSuccess) {
            return $resource->additional([
                'message' => $message,
                'error' => false,
                'code' => $statusCode,
            ]);
        } else {
            return response()->json([
                'message' => $message,
                'error' => true,
                'code' => $statusCode,
            ], $statusCode);
        }
    }

    /**
     * Send any success response
     *
     * @param   string          $message
     * @param   array|object    $data
     * @param   JsonResource    $resource
     * @param   integer         $statusCode
     */
    public function success($message, $data,$resource, $statusCode = 200)
    {
        return $this->coreResponse($message, $data, $statusCode,$resource);
    }

    /**
     * Send any error response
     *
     * @param   string          $message
     * @param   integer         $statusCode
     */
    public function error($message, $statusCode = 500)
    {
        return $this->coreResponse($message, null, $statusCode, false);
    }
}

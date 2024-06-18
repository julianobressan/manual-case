<?php

namespace App\Modules\Common\Traits;

use App\Modules\Common\Exceptions\AppException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

trait HttpResponse
{
    /**
     * Returns a JSON response for succeeded actions.
     * @param string $message
     * @param string|int $status
     * @param array|Model|JsonResource $data
     * @return JsonResponse
     */
    public function success(string $message, string|int $status = 200, array|Model|JsonResource $data = []): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'status' => $status,
            'data' => $data
        ], $status);
    }

    /**
     * Returns a JSON response for not succeeded actions.
     * @param AppException $exception
     * @return JsonResponse
     */
    public function error(AppException $exception): JsonResponse
    {
        return response()->json([
            'message' => $exception->getMessage(),
            'status' => $exception->getHttpCode(),
            'errors' => $exception->getErrors(),
            'data' => $exception->getData()
        ], $exception->getHttpCode());
    }
}

<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Collection;

class Controller extends BaseController
{
    use ValidatesRequests;

    /**
     * @param bool $success
     * @param array|ResourceCollection|JsonResource|Collection|Subscription $data
     * @param int $code
     * @param null|Exception $exception
     * @param array $headers
     * @return Response
     */
    public function respond(bool $success, $data = [], $code = 200, $exception = null, $headers = []): Response
    {
        $content = [
            'success' => $success,
            'data' => $data,
        ];

        if ($data instanceof AnonymousResourceCollection) {
            $content = array_merge($content, [
                'meta' => [
                    'per_page' => $data->perPage(),
                    'total' => $data->total(),
                    'current_page' => $data->currentPage(),
                    'last_page' => $data->lastPage(),
                    'base' => $data->url(1),
                    'next' => $data->nextPageUrl(),
                    'prev' => $data->previousPageUrl()
                ]
            ]);
        }

        if ($exception instanceof Exception) {
            $content = array_merge($content, [
                'error' => [
                    'message' => $exception->getMessage(),
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine(),
                    'trace' => $exception->getTrace(),
                ]
            ]);
        }

        return response($content, $code, $headers);
    }
}

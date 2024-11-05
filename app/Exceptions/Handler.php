<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{

    /**
     *
     * 使异常作为HTTP响应
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Throwable $e
     * @return Response
     *
     * @throws Throwable
     */
    public function render($request, Throwable $e): Response
    {
        return $this->customRender($e);
    }

    public function customRender(Throwable $e): Response
    {
        $status_code = 400;
        $exception_message = $e->getMessage();
        if ($e instanceof GlobalException) {
            $status_code = $e->getStatusCode();
        }
        if ($e instanceof NotFoundHttpException) {
            $exception_message = "route not found";
        }
        if ($e instanceof ValidationException) {
            $status_code = $e->status;
            if (!empty($e->errors())) {
                $first_name = array_key_first($e->errors());
                $exception_message = $e->errors()[$first_name];
            }
        }

        $response = [
            'message' => $exception_message,
            'status_code' => $status_code,
            'code' => $e->getCode(),
        ];

        // 注意配置文件只在服务启动时加载，不会热更新
        if (app()->environment() != 'production' && env('APP_DEBUG', false)) {
            $response['trace'] = $e->getTrace();
        }

        return new Response(json_encode($response), $status_code);
    }
}

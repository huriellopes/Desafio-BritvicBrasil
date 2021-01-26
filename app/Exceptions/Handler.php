<?php

namespace App\Exceptions;

use App\Enum\StatusEnum;
use App\Traits\Requests;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use Requests;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function render($request, Throwable $exception)
    {
        if ($request->wantsJson() || strpos($request->url(), 'api') !== false) {
            return $this->handleApiException($exception);
        } else {
            return parent::render($request, $exception);
        }
    }

    /**
     * Trata as exceções para api
     *
     * @param Throwable $exception
     * @return JsonResponse
     */
    private function handleApiException(Throwable $exception)
    {
        if ($exception instanceof SystemException) {
            $response['message'] = $exception->getMessage();
            $response['status'] = StatusEnum::BAD_REQUEST;
        } else if ($exception instanceof NotFoundHttpException) {
            $response['message'] = StatusEnum::MESSAGE_NOT_FOUND;
            $response['status'] = StatusEnum::NOT_FOUND;
        } else if ($exception instanceof AuthorizationException) {
            $response['message'] = StatusEnum::MESSAGE_UNAUTHORIZED;
            $response['status'] = StatusEnum::UNAUTHORIZED;
        } else if ($exception instanceof ValidationException) {
            $response['message'] = $exception->validator->getMessageBag();
            $response['status'] = StatusEnum::UNPROCESSABLE_ENTITY;
        } else if ($exception instanceof ErrorException) {
            $response['message'] = StatusEnum::MESSAGE_SERVER_ERROR;
            $response['status'] = StatusEnum::SERVER_ERROR;
        } else {
            $response['message'] = StatusEnum::MESSAGE_BAD_REQUEST;
            $response['status'] = StatusEnum::BAD_REQUEST;
        }

        return $this->returnResponse($response['message'], $response['status'], $exception);
    }
}

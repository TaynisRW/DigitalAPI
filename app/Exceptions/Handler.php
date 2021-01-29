<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
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

    public function render($request, Throwable $exception)
    {
        if($exception instanceof ModelNotFoundException){
            return response()->json(["response" => false, "error" => "Error the record doesn't exist in the Model"], 400);
        }
        if($exception instanceof QueryException){
            return response()->json(["response" => false, "error" => "Error of query on Database", $exception->getMessage()], 500);
        }
        if($exception instanceof HttpException){
            return response()->json(["response" => false, "error" => "Error in the Route"], 404);
        }
        if($exception instanceof AuthenticationException){
            return response()->json(["response" => false, "error" => "Error of authentication"], 401);
        }
        if($exception instanceof AuthorizationException){
            return response()->json(["response" => false, "error" => "Error of authentication,
            insufficient permissions"], 403);
        }
        return parent::render($request, $exception);
    }
}

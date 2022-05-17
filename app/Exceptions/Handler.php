<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
<<<<<<< HEAD
=======
use Throwable;
>>>>>>> upto7

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
     * Report or log an exception.
     *
<<<<<<< HEAD
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
=======
     * @param  \Throwable  $exception
     * @return void
     */
    public function report(Throwable $exception)
>>>>>>> upto7
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function render($request, Exception $exception)
=======
    public function render($request, Throwable $exception)
>>>>>>> upto7
    {
        return parent::render($request, $exception);
    }
}

<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
    public function register(): void
    {
        $this->renderable(function (NotFoundHttpException $e, $request) {
            $routes = [
                'positions.edit' => 'positions',
                'employees.edit' => 'employees',
            ];

            if ($e->getStatusCode() === 404 && $request->route()->getName() && array_key_exists($request->route()->getName(), $routes)) {
                return redirect()
                    ->to($routes[$request->route()->getName()])
                    ->with('status', trans('responses.fail.not_found'));
            }
        });
    }
}

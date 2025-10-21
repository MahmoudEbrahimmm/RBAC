<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__ . '/../routes/web.php',
            __DIR__ . '/../routes/auth.php',
            __DIR__ . '/../routes/dashboard.php',
        ],
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        apiPrefix:'api/v1'
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'roles' => \App\Http\Middleware\CheckUserType::class,
            'hasPermissions' => \App\Http\Middleware\HasPermissionsMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

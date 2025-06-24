<?php

use App\Http\Middleware\isAuthenticate;
use App\Http\Middleware\isUnauthticate;
use App\Http\Middleware\BranchSession;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            // Redirect URL
            'IsAuthenticate' => isAuthenticate::class,
            'IsUnauthticate' => isUnauthticate::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

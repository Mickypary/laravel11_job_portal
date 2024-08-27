<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Company;
use App\Http\Middleware\Candidate;
use App\Http\Middleware\PreventBackHistory;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => Admin::class,
            'company' => Company::class,
            'candidate' => Candidate::class,
            'prevent-back-history' => PreventBackHistory::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

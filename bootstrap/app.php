<?php

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
        // midleware adalah pembatas antara user yang sudah otentikasi dan yg belum
        $middleware->web([
            RealRashid\SweetAlert\ToSweetAlert::class,
            ]);
        // web extention luar arahnya ke vendor
        $middleware->alias([
        'Alert' => RealRashid\SweetAlert\Facades\Alert::class,
        'role' => App\Http\Middleware\Role::class,
        ]);
        // dipanggil ke view/controller
    })
    ->withExceptions(function (Exceptions $exceptions) {
    })->create();

<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request; // 1. Wajib ditambahkan agar sistem mengenali 'Request'

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        
        // 2. Mencegah layar putih 419 dan mengubahnya menjadi redirect halus
        $exceptions->render(function (\Illuminate\Session\TokenMismatchException $e, Request $request) {
            return redirect()->route('login')->with('error', 'Sesi keamanan Anda telah berakhir karena terlalu lama diam. Silakan pilih bidang kembali.');
        });
        
    })->create();
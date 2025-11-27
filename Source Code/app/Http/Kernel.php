<?php


namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\BlockUserRole;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        // ...existing code...
        'is_admin'   => IsAdmin::class,
        'role'       => CheckRole::class,
        'block_user' => BlockUserRole::class,
        // ...existing code...
    ];
}
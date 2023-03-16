<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
        'http://localhost:5173/form',
        'http://localhost:5173/to-dos',
        'http://localhost:5173/login',
        'http://localhost:5173/*',
        'http://localhost:8000/form-api',
        'http://localhost:8000/list-api/*',
        'http://localhost:8000/form-user',
        'http://localhost:8000/list-user/*',
        'http://localhost:8000/login',
        'http://localhost:8000/logout',
    ];
}

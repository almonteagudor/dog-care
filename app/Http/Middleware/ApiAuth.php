<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate;
use Symfony\Component\HttpFoundation\Response;

class ApiAuth extends Authenticate
{
    protected function unauthenticated($request, array $guards): void
    {
        abort(response()->json(['message' => __('auth.authentication_required')], Response::HTTP_UNAUTHORIZED));
    }
}

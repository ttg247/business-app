<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Auth;

class AuthenticateToken
{
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    { 
        $token = $request->header('Authorization');

        if (!$token || !$this->validateToken($token)) {
            throw new AuthenticationException('Unauthenticated.');
        }

        return $next($request);
    }

    private function validateToken($token)
    {
        $user = \App\Models\User::where('api_token', hash('sha256', $token))->first();

        return $user !== null;
    }
}

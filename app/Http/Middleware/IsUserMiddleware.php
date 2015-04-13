<?php

namespace Depotwarehouse\SC2CTL\Web\Http\Middleware;

use Closure;
use Depotwarehouse\SC2CTL\Web\Permissions\IsUser;
use Illuminate\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class IsUserMiddleware implements Middleware
{

    use IsUser;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->has('user_id')) {
            if (!$this->isUser($request->get('user_id'))) {
                throw new AccessDeniedHttpException;
            }
        }
    }
}

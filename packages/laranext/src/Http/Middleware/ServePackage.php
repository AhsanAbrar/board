<?php

namespace Laranext\Http\Middleware;

use Laranext\Laranext;

class ServePackage
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        if ($provider = $this->isLaranextRequest($request)) {
            app()->register($provider);
        }

        return $next($request);
    }

    /**
     * Determine if the given request is intended for Laranext.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function isLaranextRequest($request)
    {
        if (in_array($request->segment(1), config('laranext.excluded_routes'))) {
            return false;
        }

        $key = $request->segment(2) ?? $request->segment(1);
        $providers = $request->segment(1) == config('laranext.prefix')
            ? config('laranext.prefix_providers')
            : config('laranext.providers');

        if (array_key_exists($key, $providers)) {
            Laranext::key($key);

            return $providers[$key];
        } elseif (array_key_exists('', $providers)) {
            return $providers[''];
        }
    }
}

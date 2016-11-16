<?php
namespace App\Http\Middleware;
use Closure;
class Cors
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set(
            'Access-Control-Allow-Headers',
            'Authorization, Content-Type, If-Match, If-Modified-Since, If-None-Match, If-Unmodified-Since'
        );
        $response->headers->set('Access-Control-Allow-Credentials', 'true');
        $response->headers->set('Access-Control-Allow-Methods', '*');
        return $response;
    }
}
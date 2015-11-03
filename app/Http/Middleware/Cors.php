<?php

namespace App\Http\Middleware;

use Closure;

class Cors {
    public function handle($request, Closure $next)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Credentials: true ");
        header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
        header("Access-Control-Allow-Headers: Content-Type, Depth, User-Agent, X-File-Size,
            X-Requested-With, If-Modified-Since, X-File-Name, Cache-Control");
        if($request->isMethod('OPTIONS')) {
            return response('OK', 200);
        }
        $response = $next($request);
        return $response;
    }
}

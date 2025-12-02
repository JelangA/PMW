<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetWorkshopApiBasePath
{
    public function handle(Request $request, Closure $next): Response
    {
        // Set the base path for URL generation
        $request->server->set('SCRIPT_NAME', '/workshop-api/index.php');
        
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Prismic\Api;
use App;
include(app_path() . '/LinkResolver.php');

class ConnectToPrismic
{
    /**
     * Connect to the prismic.io API.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Define the link resolver
        $request['linkResolver'] = new App\PrismicLinkResolver();
        
        // Connect to the prismic.io repository
        $request['api'] = Api::get(config('prismic.url'), config('prismic.token'));
        
        // Return the request
        return $next($request);
    }
}

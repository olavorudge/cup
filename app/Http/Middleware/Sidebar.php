<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

class Sidebar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->attributes->add([ 'subLinhas' => []]);
        $request->attributes->add([ 'linha' => 0 ]);        

        if ( !$request->routeIs( 'home' ) )
        {
            $id = $request->cookie( 'linha' );
            if ( $id )
            {
                $request->attributes->add([ 'linha' => $id ]);
                $request->attributes->add([ 'subLinhas' => [
                    [ 'nome' => 'ABR.EF - Ensino Fundamental', 'id' => 1 ],
                    [ 'nome' => 'ABR.EM - Ensino Médio', 'id' => 2 ],
                ]]);
            }
        }

        return $next($request);
    }
}

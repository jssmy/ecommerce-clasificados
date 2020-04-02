<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\UserSearching;
class SearchingMiddleware
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
        return $next($request);
    }

    public function terminate($request, $response){
        if(auth()->check() && $request->buscar && session()->get('results')){
            UserSearching::create([
                'user_id'=> auth()->id(),
                'text'=>substr($request->buscar,0,255),
                'results'=>session()->get('results')
            ]);
        }
    }
}

<?php

namespace App\Http\Middleware;

use Auth;
use App\Store;
use App\User;
use Closure;
use Illuminate\Support\Collection;

class CheckStore
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
      $user = Auth::user();
      $store = Store::where('user_id', $user->id)->get();

      if($store->isNotEmpty())
        return $next($request);
      else{
        return response()->json('Acesso negado.');
      }
    }
}

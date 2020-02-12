<?php

namespace App\Http\Middleware;

use Closure;

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
      $store = Store::where('user_id', $user->id);
      $is_store = User::has('stores')->where('store_id', $store->id);

      if($request->id = $is_store->id)
        return $next($request);
      else{
        return response()->json('Acesso negado.');
      }
    }
}

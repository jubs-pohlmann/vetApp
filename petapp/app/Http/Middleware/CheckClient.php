<?php

namespace App\Http\Middleware;

use Closure;

class CheckClient
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
      $client = Client::where('user_id', $user->id);
      $is_client = User::has('clients')->where('client_id', $client->id);

      if($request->id = $is_client->id)
        return $next($request);
      else{
        return response()->json('Acesso negado.');
      }
    }
}

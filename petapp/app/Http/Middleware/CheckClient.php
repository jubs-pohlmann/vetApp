<?php

namespace App\Http\Middleware;

use Auth;
use App\Client;
use App\User;
use Closure;
use Illuminate\Support\Collection;

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
      $client = Client::where('user_id', $user->id)->get();

      if($client->isNotEmpyt())
        return $next($request);
      else{
        return response()->json('Acesso negado.');
      }
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Super;
use App\User;
use App\Store;
use Auth;
use DB;

class PassportController extends Controller
{
  public $successStatus=200;


  //Responsável por cadastrar um novo usuário
  public function registerUser(Request $request){
    //$super->createSuper();
    $user->createUser();

    $success['token'] = $super->createToken('MyApp')->accessToken;
    $success['name'] = $super->name;

    $user->save();
    return response()->json(['sucess'=> $success]);
  }

  //Responsável por cadastrar uma nova loja
  public function registerStore(Request $request){
    //$super->createSuper();
    $store->createStore();
    $success['token'] = $super->createToken('MyApp')->accessToken;
    $success['name'] = $super->name;

    $super->save();
    return response()->json(['sucess'=> $success]);
  }

  public function login(){
    if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
      $super = Auth::super();
      $success['token'] = $super -> createToken('MyApp')->accessToken;
      return response()->json(['success' => $success], $this->successStatus);
    }
    else{
      return response()->json(['error' => 'Unauthorizeds'], 401);
    }
  }

  public function getDetails(){
    $super = Auth::super();
    return response() -> json(['success' => $super], $this->successStatus);
  }

  public function logout(){
    $accessToken = Auth::super()->token();
    DB::table('oauth_refresh_tokens')->where('access_token_id', $accessToken->id)->update(['revoked'=>true]);
    $accessToken->revoke();
    return response()->json(null,204);
  }
}

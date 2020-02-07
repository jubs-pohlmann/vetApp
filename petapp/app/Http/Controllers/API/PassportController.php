<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\User;
use App\Store;
use Auth;
use DB;

class PassportController extends Controller
{
  public $successStatus=200;


  //Responsável por cadastrar um novo usuário
  public function registerClient(Request $request){
    $validator = Validator::make($request->all(), [
      'name' => 'required|alpha',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|numeric|digits:5',
      'phone' => 'required|telefone_com_ddd',
      'photo' => 'required|string',
      'address' => 'required|string',
      'birthdate' => 'required|data',
      'cpf' => 'required|cpf'
    ]);

    if($validator->fails()){
      return response()->json($validator->errors());
    }


    $user = new User();
    $user->createUser($request);

    $client = new Client();
    $client->user_id = $user->id;
    $client->createClient($request);

    $success['token'] = $user->createToken('MyApp')->accessToken;
    $user->save();
    return response()->json(['sucess'=> $success]);
  }

  //Responsável por cadastrar uma nova loja
  public function registerStore(Request $request){
    $validator = Validator::make($request->all(), [
      'name' => 'required|alpha',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|numeric|digits:5',
      'phone' => 'required|telefone_com_ddd',
      'photo' => 'required|string',
      'address' => 'required|string',
      'cnpj' => 'required|cnpj'
    ]);

    if($validator->fails()){
      return response()->json($validator->errors());
    }
    $user = new User();
    $user->createUser($request);

    $store = new Store();
    $store->user_id = $user->id;
    $store->createStore($request);


    $success['token'] = $user->createToken('MyApp')->accessToken;
    $user->save();
    return response()->json(['sucess'=> $success]);
  }


  public function login(){
    if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
      $user = Auth::user();
      $success['token'] = $user->createToken('MyApp')->accessToken;
      return response()->json(['success' => $success], $this->successStatus);
    }
    else{
      return response()->json(['error' => 'Unauthorized'], 401);
    }
  }

  public function getDetails(){
    $user = Auth::user();
    return response() -> json(['success' => $user], $this->successStatus);
  }

  public function logout(){
    $accessToken = Auth::user()->token();
    DB::table('oauth_refresh_tokens')->where('access_token_id', $accessToken->id)->update(['revoked'=>true]);
    $accessToken->revoke();
    return response()->json("Logout");
  }

  //Método para edição de dados do user
  public function updateClient(Request $request){
    $user = Auth::user();
    $client = Client::where('user_id', '$user->id');

    if($request->bithdate || $request->cpf)
      $client->updateClient($request);
    else
      $user->updateUser($request);

    return response()->json([$user]);
  }

  //Método para edição de dados da loja
  public function updateStore(StoreRequest $request){
    $user = Auth::user();
    $store = Store::where('user_id', '$user->id');

    if($request->delivey || $request->cnpj)
      $store->updateStore($request);
    else
      $user->updateUser($request);

    return response()->json([$user]);
  }


}

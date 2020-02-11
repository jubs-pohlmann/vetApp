<?php

namespace App\Http\Controllers\API;

use App\Notifications\confirmacaoCompra;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Client;
use App\User;
use App\Store;
use App\Product;
use Auth;
use DB;

class PassportController extends Controller
{
  public $successStatus=200;


  //Responsável por cadastrar um novo cliente
  public function registerClient(Request $request){
    $validator = Validator::make($request->all(), [
      'name' => 'required|alpha',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|numeric|digits:5',
      'phone' => 'required|telefone_com_ddd',
      'photo' =>'file|image|mimes:jpeg,png,gif,webp|max:2048',
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

    if($request->photo){
      if(!Storage::exists('localUserPhotos/'))
  			Storage::makeDirectory('localUserPhotos/',0775,true);
      $file = $request->file('photo');
      $filename = $user->id.'.'.$file->getClientOriginalExtension();
      $path = $file->storeAs('localUserPhotos', $filename);
      $user->photo = $path;
    }

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
      'photo' =>'file|image|mimes:jpeg,png,gif,webp|max:2048',
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
    if($request->photo){
      if(!Storage::exists('localUserPhotos/'))
  			Storage::makeDirectory('localUserPhotos/',0775,true);
      $file = $request->file('photo');
      $filename = $user->id.'.'.$file->getClientOriginalExtension();
      $path = $file->storeAs('localUserPhotos', $filename);
      $user->photo = $path;
    }
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


    if($request->birthdate || $request->cpf)
      $client->updateClient($request);

    if($request->name || $request->email || $request->password || $request->phone || $request->address){
      $user->updateUser($request);
    }
    else{
      Storage::delete($user->photo);
      $file = $request->file('photo');
      $filename = $user->id.'.'.$file->getClientOriginalExtension();
      $path = $file->storeAs('localUserPhotos', $filename);
      $user->photo = $path;
      $user->save();
    }
    return response()->json([$user]);
  }

  //Método para edição de dados da loja
  public function updateStore(Request $request){
    $user = Auth::user();
    $store = Store::where('user_id', '$user->id');

    if($request->delivery || $request->cnpj)
      $store->updateStore($request);

    if($request->name || $request->email || $request->password || $request->phone || $request->address){
      $user->updateUser($request);
    }
    else{
        Storage::delete($user->photo);
        $file = $request->file('photo');
        $filename = $user->id.'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('localUserPhotos', $filename);
        $user->photo = $path;
        $user->save();
      }
    return response()->json([$user]);
  }

  //Método responsável por representar a compra de um produto por cliente
  public function sale($product_id){
    $current = Carbon::now();
    $user = Auth::user();
    $client = Client::where('user_id', $user->id)->first();

    $product = Product::find($product_id);

    $delivery_day = $current->addWeek();
    $client->sale($product_id, $delivery_day);

    $product->stock--;
    if(($product->stock) == 0 )
      Product::destroy($product->id);
    $client->save();
    $product->save();
    $client->notify(new confirmacaoCompra($client));
    return response()->json(['Compra realizada', 'Data de entrega', $delivery_day->format('d-m-Y')]);
  }

  //Método responsável por listar os produtos comprados pelo client
  public function listProduct(){
    $user = Auth::user();
    $client = Client::where('user_id', $user->id)->first();
    return response()->json($client->products);
  }

  //Método responsavel por estabelecer uma relação entre produto e loja
  public function createProduct(Request $request){
    $user = Auth::user();
    $store = Store::where('user_id', $user->id)->first();
    $product = new Product();
    $product->createProduct($request, $store->id);
    return response()->json(['Produto adicionado']);
  }

  //Método responsável por represnetar a avaliação do cliente a uma loja
  public function rate($store_id, $grade){
    $user = Auth::user();
    $client = Client::where('user_id', $user->id)->first();
    $store = Store::find($store_id);
    $client->rate($store, $grade);
    $store->avgRate();
    $client->save();
    $store->save();
    return response()->json(['Avaliação concluida', $grade]);
  }

  //Método responsável por listar as lojas avaliadas pelo client
  public function listRate(){
    $user = Auth::user();
    $client = Client::where('user_id', $user->id)->first();
    return response()->json($client->stores);
  }

  //Método responsável por listar os clientes que avaliaram a loja
  public function listRateStore(){
    $user = Auth::user();
    $store = Store::where('user_id', $user->id)->first();
    return response()->json($store->clients);
  }

}

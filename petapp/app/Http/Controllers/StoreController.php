<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Client;
use App\Product;
use App\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Notifications\buyConfirmation;
use Illuminate\Notifications\Notifiable;

class StoreController extends Controller
{
  public function construct () {
    $this->middleware('checkStore')->except('registerStore');
  }

  //Método que retorna lista com todos as lojas
  public function listStore(){
    $stores = Store::all();
    $array=[];
    $cont=0;
    foreach ($stores as $store) {
      $user = User::where('id', $store->user_id)->get();
      $store->user = $user;
      $array[$cont] = $store;
      $cont++;
    }
    return response()->json([$array]);
  }

  //Método responsavel por exibir a loja com o id informado
  public function showStore($id){
    $store = Store::findOrFail($id);
    $user = User::where('id', $store->user_id)->get();
    $store->user = $user;
    return response()->json([$store]);
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

  //Método responsavel por estabelecer uma relação entre produto e loja
  public function createProduct(Request $request){
    $user = Auth::user();
    $store = Store::where('user_id', $user->id)->first();
    $product = new Product();
    $product->createProduct($request, $store->id);
    return response()->json(['Produto adicionado']);
  }


  //Método responsável por listar os clientes que avaliaram a loja logada
  public function listRate(){
    $user = Auth::user();
    $store = Store::where('user_id', $user->id)->first();
    return response()->json($store->clients);
  }

  //Método responsável por listar os clientes que avaliaram a loja
  public function listRateAdmin($id){
    $store = Store::findOrFail($id);
    return response()->json($store->clients);
  }

  //Método responsável por listar os produtos da loja logada
  public function listProduct(){
    $user = Auth::user();
    $store = Store::where('user_id', $user->id)->first();
    return response()->json($store->products);
  }

  //Método responsável por listar os produtos da loja
  public function listProductAdmin($id){
    $store = Store::findOrFail($id);
    return response()->json($store->products);
  }
}

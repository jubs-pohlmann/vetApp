<?php

namespace App\Http\Controllers;


use App\Client;
use App\User;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{

  //Método que retorna lista com todos os clients
  public function listClient(){
    $clients = Client::all();
    $array=[];
    $cont=0;
    foreach ($clients as $client) {
      $user = User::where('id', $client->user_id)->get();
      $client->user = $user;
      $array[$cont] = $client;
      $cont++;
    }
    return response()->json([$array]);
  }

  //Método responsavel por exibir o client com o id informado
  public function showClient($id){
    $client = Client::findOrFail($id);
    $user = User::where('id', $client->user_id)->get();
    $client->user = $user;
    return response()->json([$client]);
  }
  //
  // //Método responsável por listar os produtos comprados pelo client
  // public function listProducts(){
  //   $client = Auth::client();
  //   return response()->json($client->products);
  // }
  //
  // //Método responsável por represnetar a avaliação do cliente a uma loja
  // public function rate($id, $store_id, $grade){
  //   $client = Client::find($id);
  //   $store = Store::find($store_id);
  //   //$client->stores()->where('id',$store_id);
  //   $client->stores()->attach($store->id,['grade' => $grade]);
  //   return response()->json(['Avaliacao realizada']);
  // }
  //
  // //Método responsável por listar as lojas avaliadas pelo client
  // public function listRate($id){
  //   $client = Client::find($id);
  //   return response()->json($client->stores);
  // }
  //
  //
  //
  // // Compra
  //
  // //Método responsável por representar a compra de um produto por cliente
  // public function sale($product_id){
  //   $client = Client::find($id);
  //   $client->sale();
  //   return response()->json(['Venda realizada']);
  // }
}

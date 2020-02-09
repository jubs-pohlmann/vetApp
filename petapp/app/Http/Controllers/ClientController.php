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
  //Método responsável por listar os produtos comprados pelo client
  public function listProduct($id){
    $client = Client::findOrFail($id);
    return response()->json($client->products);
  }

  //Método responsável por listar as lojas avaliadas pelo cliente
  public function listRate($id){
    $client = Client::findOrFail($id);
    return response()->json($client->stores);
  }
}

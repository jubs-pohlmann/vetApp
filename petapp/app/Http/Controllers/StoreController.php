<?php

namespace App\Http\Controllers;

use App\User;
use App\Client;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{

  //Método que retorna lista com todos as lojas
  public function listStore(){
    $store = Store::all();
    return response()->json($store);
  }

  //Método responsavel por exibir a loja com o id informado
  public function showStore($id){
    $store = Store::findOrFail($id);
    return response()->json([$store]);
  }
  //
  // //Método responsável por listar os clientes que avaliaram uma loja
  // public function listUsers($id){
  //   $store = Store::find($id);
  //   return response()->json($store->users);
  // }

}

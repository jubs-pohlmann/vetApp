<?php

namespace App\Http\Controllers;

use App\Store;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
  //Método responsável por criar nova loja
  public function createStore(StoreRequest $request){
    $store = new Store;
    $store->createStore($request);
    return response()->json([$store]);
  }

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

  //Método usado para deletar uma loja
  public function deleteStore($id){
    Store::destroy($id);
    return response()->json(['Loja deletada']);
  }

  //Método para edição de dados da loja
  public function updateStore(StoreRequest $request){
    $store = Auth::store();
    $store->updateStore($request);
    return response()->json([$store]);
  }

  //Método responsável por listar os clientes que avaliaram uma loja
  public function listUsers($id){
    $store = Store::find($id);
    return response()->json($store->users);
  }

}

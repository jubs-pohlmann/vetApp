<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;

class StoreController extends Controller
{
  //Método responsável por criar nova loja
  public function createStore(Request $request){

    $store = new Store;

    $store->name = $request->name;
    $store->email = $request->email;
    $store->rating = $request->rating;
    $store->photo = $request->photo;
    $store->phone = $request->phone;
    $store->address = $request->address;
    $store->password = $request->password;
    $store->cnpj = $request->cnpj;
    $store->delivery = $request->delivery;
    $store->save();

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
  public function updateStore(Request $request, $id){
    $store = Store::find($id);
    if($store){
      if($request->name){
        $store->name = $request->name;
      }
      if($request->email){
        $store->email = $request->email;
      }
      if($request->password){
        $store->password = $request->password;
      }
      if($request->rating){
        $store->rating = $request->rating;
      }
      if($request->photo){
        $store->photo = $request->photo;
      }
      if($request->phone){
        $store->phone = $request->phone;
      }
      if($request->address){
        $store->address = $request->address;
      }
      if($request->delivery){
        $store->delivery = $request->delivery;
      }
      if($request->cnpj){
        $store->cnpj = $request->cnpj;
      }
      $store->save();
      return response()->json([$store]);
    }
    else{
      return response()->json(['Esta loja nao existe']);
    }
  }

  //Método responsavel por estabelecer uma relação entre loja e conta
  public function addAccount(Request $request, $id){
    $store = Store::find($id);
    if($request->account_id){
      $store->account_id = $request->account_id;
    }
    $store->save();
    return response()->json(['Sucesso']);
  }

  //Método responsavel por remover uma relação entre loja e conta
  public function removeAccount($id){
    $store = Store::find($id);
    $store->account_id = null;
    $store->save();
    return response()->json(['Sucesso']);
  }

  //Método responsável por listar os clientes que avaliaram uma loja
  public function listClients($id){
    $store = Store::find($id);
    return response()->json($store->users);
  }

}

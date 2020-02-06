<?php

namespace App\Http\Controllers;


use App\User;
use App\Store;
use App\Http\Requests\UserRequest;



class UserController extends Controller
{
  //Método responsável por criar um novo user
  public function createUser(UserRequest $request){
    $user = new User;
    $user->createUser($request);
    return response()->json([$user]);
  }

  //Método que retorna lista com todos os users
  public function listUser(){
    $user = User::all();
    return response()->json($user);
  }

  //Método responsavel por exibir o user com o id informado
  public function showUser($id){
    $user = User::findOrFail($id);
    return response()->json([$user]);
  }

  //Método usado para deletar um user
  public function deleteUser($id){
    User::destroy($id);
    return response()->json(['user deletado']);
  }

  //Método para edição de dados do user
  public function updateUser(UserRequest $request){
    $user = Auth::user();
    $user->updateUser($request);
    return response()->json([$user]);
  }

  //Método responsável por listar os produtos comprados pelo user
  public function listProducts(){
    $user = Auth::user();
    return response()->json($user->products);
  }

  //Método responsável por represnetar a avaliação do cliente a uma loja
  public function rate($id, $store_id, $grade){
    $user = User::find($id);
    $store = Store::find($store_id);
    //$user->stores()->where('id',$store_id);
    $user->stores()->attach($store->id,['grade' => $grade]);
    return response()->json(['Avaliacao realizada']);
  }

  //Método responsável por listar as lojas avaliadas pelo user
  public function listRate($id){
    $user = User::find($id);
    return response()->json($user->stores);
  }



  // Compra

  //Método responsável por representar a compra de um produto por cliente
  public function sale($product_id){
    $user = User::find($id);
    $user->sale();
    return response()->json(['Venda realizada']);
  }
}

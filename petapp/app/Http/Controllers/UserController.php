<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use App\User;
use App\Store;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
  //Método responsável por criar um novo user
  public function createUser(UserRequest $request){

    $user = new User;

    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->birthdate = $request->birthdate;
    $user->phone = $request->phone;
    $user->cpf = $request->cpf;
    $user->photo = $request->photo;
    $user->address = $request->address;
    $user->save();

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
  public function updateUser(UserRequest $request, $id){
    $user = User::find($id);
    if($user){
      if($request->name){
        $user->name = $request->name;
      }
      if($request->email){
        $user->email = $request->email;
      }
      if($request->password){
        $user->password = $request->password;
      }
      if($request->photo){
        $user->photo = $request->photo;
      }
      if($request->phone){
        $user->phone = $request->phone;
      }
      if($request->address){
        $user->address = $request->address;
      }
      if($request->birthdate){
        $user->birthdate = $request->birthdate;
      }
      if($request->cpf){
        $user->cpf = $request->cpf;
      }
      $user->save();
      return response()->json([$user]);
    }
    else{
      return response()->json(['Este user nao existe']);
    }
  }

  //Método responsavel por estabelecer uma relação entre user e cartao
  public function addCard($request, $id){
    $user = User::find($id);
    $user->card_id = $request;
    $user->save();
    return response()->json(['Sucesso']);
  }

  //Método responsavel por remover uma relação entre user e cartao
  public function removeCard($id){
    $user = User::find($id);
    $user->card_id = null;
    $user->save();
    return response()->json(['Sucesso']);
  }

  //Método responsável por listar os produtos comprados pelo user
  public function listProducts($id){
    $user = User::find($id);
    return response()->json($user->products);
  }

  //Método responsável por represnetar a avaliação do cliente a uma loja
  public function rate($id, $store_id, $grade){
    $user = User::find($id);
    $store = Store::find($store_id);

    $user->stores()->attach($store->id,['grade' => $grade]);
    return response()->json(['Avaliacao realizada']);
  }

  //Método responsável por listar as lojas avaliadas pelo user
  public function listRate($id){
    $user = User::find($id);
    return response()->json($user->stores);
  }

}

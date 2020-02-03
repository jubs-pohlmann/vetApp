<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
  //Método responsável por criar um novo usere
  public function createUser(Request $request){

    $user = new User;

    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->birthdate = $request->birthdate;
    $user->photo = $request->photo;
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->cpf = $request->cpf;
    $user->save();

    return response()->json([$user]);
  }

  //Método que retorna lista com todos os useres
  public function listUser(){
    $user = User::all();
    return response()->json($user);
  }

  //Método responsavel por exibir o usere com o id informado
  public function showUser($id){
    $user = User::findOrFail($id);
    return response()->json([$user]);
  }

  //Método usado para deletar um usere
  public function deleteUser($id){
    User::destroy($id);
    return response()->json(['usere deletado']);
  }

  //Método para edição de dados do usere
  public function updateUser(Request $request, $id){
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
      return response()->json(['Este usere nao existe']);
    }
  }

  //Método responsavel por estabelecer uma relação entre usere e cartao
  public function addCard(Request $request, $id){
    $usere = User::find($id);
    if($request->card_id){
      $usere->card_id = $request->card_id;
    }
    $usere->save();
    return response()->json(['Sucesso']);
  }

  //Método responsavel por remover uma relação entre usere e cartao
  public function removeCard($id){
    $usere = User::find($id);
    $usere->card_id = null;
    $usere->save();
    return response()->json(['Sucesso']);
  }

  //Método responsável por listar os produtos comprados pelo usere
  public function listProducts($id){
    $user = User::find($id);
    return response()->json($user->products);
  }



}

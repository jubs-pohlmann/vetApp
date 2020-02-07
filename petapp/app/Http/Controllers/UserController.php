<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
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
}

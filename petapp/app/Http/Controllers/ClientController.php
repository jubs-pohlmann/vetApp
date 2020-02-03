<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ClientController extends Controller
{
  //Método responsável por criar um novo cliente
  public function createClient(Request $request){

    $client = new User;

    $client->name = $request->name;
    $client->email = $request->email;
    $client->password = $request->password;
    $client->birthdate = $request->birthdate;
    $client->photo = $request->photo;
    $client->phone = $request->phone;
    $client->address = $request->address;
    $client->cpf = $request->cpf;
    $client->save();

    return response()->json([$client]);
  }

  //Método que retorna lista com todos os clientes
  public function listClient(){
    $client = User::all();
    return response()->json($client);
  }

  //Método responsavel por exibir o cliente com o id informado
  public function showClient($id){
    $client = User::findOrFail($id);
    return response()->json([$client]);
  }

  //Método usado para deletar um cliente
  public function deleteClient($id){
    User::destroy($id);
    return response()->json(['Cliente deletado']);
  }

  //Método para edição de dados do cliente
  public function updateClient(Request $request, $id){
    $client = User::find($id);
    if($client){
      if($request->name){
        $client->name = $request->name;
      }
      if($request->email){
        $client->email = $request->email;
      }
      if($request->password){
        $client->password = $request->password;
      }
      if($request->photo){
        $client->photo = $request->photo;
      }
      if($request->phone){
        $client->phone = $request->phone;
      }
      if($request->address){
        $client->address = $request->address;
      }
      if($request->birthdate){
        $client->birthdate = $request->birthdate;
      }
      if($request->cpf){
        $client->cpf = $request->cpf;
      }
      $client->save();
      return response()->json([$client]);
    }
    else{
      return response()->json(['Este cliente nao existe']);
    }
  }

  //Método responsavel por estabelecer uma relação entre cliente e cartao
  public function addCard(Request $request, $id){
    $cliente = User::find($id);
    if($request->card_id){
      $cliente->card_id = $request->card_id;
    }
    $cliente->save();
    return response()->json(['Sucesso']);
  }

  //Método responsavel por remover uma relação entre cliente e cartao
  public function removeCard($id){
    $cliente = User::find($id);
    $cliente->card_id = null;
    $cliente->save();
    return response()->json(['Sucesso']);
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;

class AccountController extends Controller
{
  //Método responsável por criar nova conta
  public function createAccount(Request $request){

    $account = new Account;

    $account->bank = $request->bank;
    $account->account = $request->account;
    $account->agency = $request->agency;
    $account->save();

    return response()->json([$account]);
  }

  //Método que retorna lista com todos as contas
  public function listAccount(){
    $account = Account::all();
    return response()->json($account);
  }

  //Método responsavel por exibir a conta com o id informado
  public function showAccount($id){
    $account = Account::findOrFail($id);
    return response()->json([$account]);
  }

  //Método usado para deletar uma conta
  public function deleteAccount($id){
    Account::destroy($id);
    return response()->json(['Conta deletada']);
  }

  //Método para edição de dados da conta
  public function updateAccount(Request $request, $id){
    $account = Account::find($id);
    if($account){
      if($request->bank){
        $account->bank = $request->bank;
      }
      if($request->agency){
        $account->agency = $request->agency;
      }
      if($request->account){
        $account->account = $request->account;
      }
      $account->save();
      return response()->json([$account]);
    }
    else{
      return response()->json(['Esta conta nao existe']);
    }
  }
}
